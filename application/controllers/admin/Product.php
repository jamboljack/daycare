<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in_alifa')) {
            redirect(base_url());
        }

        $this->load->library('template');
        $this->load->model('admin/product_m');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in_alifa')) {
            $data['detail'] = $this->product_m->select_detail()->row();
            $this->template->display('admin/master/product_view', $data);
        } else {
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }

    public function updatedata()
    {
        $this->product_m->update_data();
    }
}

/* Location: ./application/controller/admin/Product.php */
