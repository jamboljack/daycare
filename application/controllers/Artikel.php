<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template_front');
        $this->load->model('artikel_m');
    }

    public function index($offset = 0)
    {
        $data['listSlider'] = $this->artikel_m->select_slider()->result();
        // Content
        $config['uri_segment'] = 3;
        $config['base_url']    = site_url() . 'artikel/index';
        $config['total_rows']  = $this->artikel_m->count_all();
        $config['per_page']    = 5;
        // CSS Bootstrap
        $config['full_tag_open']  = '<ul class="page-navigation">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link']      = '<i class="fa fa-arrow-left"></i>';
        $config['prev_tag_open']  = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link']      = '<i class="fa fa-arrow-right"></i>';
        $config['next_tag_open']  = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open']   = '<li class="current-page"><a href="#">';
        $config['cur_tag_close']  = '</a></li>';
        $config['num_tag_open']   = '<li>';
        $config['num_tag_close']  = '</li>';
        // Akhir CSS

        $config["num_links"] = round($config["total_rows"] / $config["per_page"]);
        $this->pagination->initialize($config);
        $data['pages']       = $this->pagination->create_links();
        $data['listArticle'] = $this->artikel_m->select_article($config['per_page'], $offset)->result();

        $this->template_front->display('artikel_view', $data);
    }


}
/* Location: ./application/controller/Artikel.php */
