<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template_front');
    }

    public function index()
    {
        $this->output->set_status_header('404');
        $this->load->view('404_view');
    }
}
/* Location: ./application/controller/Error.php */
