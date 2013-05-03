<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Router extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['page_title'] = "Title";
        $data['content']    = "Content here! :D";

        $this->load->view('header', $data);
        $this->load->view('content', $data);
        $this->load->view('footer', $data);
    }

}

/* End of file router.php */
/* Location: ./application/controllers/router.php */