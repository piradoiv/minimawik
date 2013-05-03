<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wop extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $markdown = new dflydev\markdown\MarkdownParser();
        $data['content'] = $markdown->transformMarkdown("#ola k ase?");

        $this->load->view('header');
        $this->load->view('content', $data);
        $this->load->view('footer');
    }

}

/* End of file wop.php */
/* Location: ./application/controllers/wop.php */