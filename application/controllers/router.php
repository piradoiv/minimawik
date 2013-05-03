<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Router extends CI_Controller {

    private $method = 'GET';

    public function __construct()
    {
        parent::__construct();
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function index()
    {
        $data['page_title'] = "Title";
        $data['content']    = uri_string();

        // Show the page
        if($this->method === 'GET') {
            $this->load->view('header', $data);
            $this->load->view('content', $data);
            $this->load->view('footer', $data);
        
        // Create a page
        } elseif ($this->method === 'PUT') {

        // Update a page
        } elseif ($this->method === 'POST') {
            
        }


    }

}

/* End of file router.php */
/* Location: ./application/controllers/router.php */