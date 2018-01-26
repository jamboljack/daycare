<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template_front');
        $this->load->model('produk_m');
    }

    public function index()
    {
        $data['detail'] = $this->produk_m->select_detail()->row();
        $this->template_front->display('produk_view', $data);
    }
}
/* Location: ./application/controller/Produk.php */
