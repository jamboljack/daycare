<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template_front');
        $this->load->model('galeri_m');
    }

    public function index()
    {
        $data['listCategory'] = $this->galeri_m->select_category()->result();
        $data['listGalery']   = $this->galeri_m->select_galery()->result();
        $this->template_front->display('galeri_view', $data);
    }

    public function id($gallery_id)
    {
        $gallery_id         = decrypt($gallery_id);
        $data['detail']     = $this->galeri_m->select_detail($gallery_id)->row();
        $data['listGalery'] = $this->galeri_m->select_galery_detail($gallery_id)->result();
        $this->template_front->display('galeri_detail_view', $data);
    }
}
/* Location: ./application/controller/Galeri.php */
