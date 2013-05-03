<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Router extends CI_Controller {

    private $method = 'GET';

    public function __construct()
    {
        parent::__construct();
        $this->method = $_SERVER['REQUEST_METHOD'];

        #$this->output->enable_profiler(true);
    }

    public function index()
    {
        $data['page_title']  = "Title";
        $data['slug']        = uri_string();
        if ($data['slug'] === '') {
            $data['slug'] = '/';
        }

        $data['content']     = '';
        $data['markdown']    = '';
        $data['page_exists'] = false;

        $this->load->model('page_model');
        $page = new $this->page_model;
        
        $page->where('slug', $data['slug'])->limit(1);
        $page->get();

        // MarkDown parser
        $parser = new dflydev\markdown\MarkdownParser();

        if ($page->exists()) {
            $data['page_exists'] = true;
            $data['markdown'] = $page->markdown;
            $data['content'] = $parser->transform($page->markdown);
        }

        // Show the page
        if($this->method === 'GET') {
            $this->load->view('header', $data);
            $this->load->view('content', $data);
            $this->load->view('footer', $data);

            return true;
        
        // Update a page if exists
        } elseif ($this->method === 'POST') {
            if ($data['page_exists'] === false) {
                $page = new $this->page_model;
                $page->slug = $data['slug'];
            }

            $page->title = $this->input->post('title', TRUE);
            $page->markdown = $this->input->post('markdown', TRUE);
            $page->save();

        }


    }

}

/* End of file router.php */
/* Location: ./application/controllers/router.php */