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
        $data['page_title']  = "Untitled";
        $data['slug']        = uri_string();
        if ($data['slug'] === '') {
            $data['slug'] = '/';
        }

        $data['content']     = '';
        $data['markdown']    = '';
        $data['page_exists'] = false;
        $data['recent_pages'] = array();

        $this->load->model('page_model');
        $page = new $this->page_model;
        
        $page->where('slug', $data['slug'])->limit(1);
        $page->get();

        // MarkDown parser
        $parser = new dflydev\markdown\MarkdownParser();

        // Assign database contents if page exists
        if ($page->exists()) {
            $data['page_exists'] = true;
            $data['page_title'] = $page->title;
            $data['markdown'] = $page->markdown;
            $data['content'] = $parser->transform($page->markdown);
        
        // Prepare 404 message if page doesn't exists
        } else {
            $data['page_title'] = 'Page not found';
            $data['markdown'] = "
This is the title of your page
==============================

Edit this text :)";

            $data['content'] = '<h1>404</h1><h2>Whooops, page not found!</h2><p>But if you feel you can edit this page, just <a href="#" class="btnEditPage">edit it</a>! :)</p>';

        }

        // Recent updated pages
        $recent_pages = new $this->page_model;
        $recent_pages->order_by('id DESC')->limit(5)->select('title, slug');
        $recent_pages->get();
        $data['recent_pages'] = $recent_pages;

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

            $protected_pages = array('/', '/about');
            if (in_array($data['slug'], $protected_pages)) {
                header("HTTP/1.0 403 Forbidden");
                exit;
            }

            $page->title = $this->input->post('title', TRUE);
            $page->markdown = $this->input->post('markdown', TRUE);
            $page->save();

            return true;
        }
    }
}

/* End of file router.php */
/* Location: ./application/controllers/router.php */