<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');		
		$this->load->model('admin/shop_m');
	}

	public function index() {
		if($this->session->userdata('logged_in_pasarku')) {
            $data['listCategory'] = $this->shop_m->select_category()->result();
			$this->template->display('admin/shop/view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function data_list() {
        $List = $this->shop_m->get_datatables(); 
        $data = array();
        $no = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();

            $link 	 = site_url('admin/shop/editdata/'.$r->shop_id);
            $denied  = site_url('admin/shop/denied/'.$r->shop_id);
            if ($r->shop_status == 'Active' || $r->shop_status == 'Reject' ) {
                $btnProses = '';
            } else {
                $btnProses = '<a onclick="approveData('.$r->shop_id.')">
                            <button class="btn btn-warning btn-xs" title="Terima Toko"><i class="fa fa-check-circle"></i></button>
                        </a>
                        <button class="btn btn-danger btn-xs" title="Tolak Toko" href="javascript:void(0)" onclick="reject_data('."'".$r->shop_id."'".')"><i class="fa fa-times-circle"></i></button>';
            }

            $row[] = '  <a href="'.$link.'">
                            <button class="btn btn-primary btn-xs" title="Detail Data"><i class="fa fa-edit"></i></button>
                        </a> '.$btnProses;
            
            $row[] = $no;
            $row[] = $r->shop_name;
            $row[] = $r->shop_domain;
            $row[] = $r->category_name;
            if ($r->shop_status == 'Active') {
                $row[] = '<span class="label label-success">Active</span>';
            } elseif ($r->shop_status == 'Non Active') {
                $row[] = '<span class="label label-danger">Non Active</span>';
            } else {
                $row[] = '<span class="label label-warning">Reject</span>';
            }

            if ($r->shop_banned == 'Yes') {
                $row[] = '<span class="label label-danger">Yes</span>';
            } else {
                $row[] = '<span class="label label-success">No</span>';
            }
            $row[] = date("d-m-Y", strtotime($r->shop_created));
            if (!empty($r->shop_image)) {
                $row[] = '<img src="'.base_url('img/shop_folder/'.$r->shop_image).'" width="40%">';
            } else {
                $row[] = '<img src="'.base_url('img/no-image.png').'" width="70%">';
            }
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->shop_m->count_all(),
                        "recordsFiltered" 	=> $this->shop_m->count_filtered(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }
	
	public function editdata($shop_id) {
		$data['detail']         = $this->shop_m->select_by_id($shop_id)->row();
        $data['listCategory']   = $this->shop_m->select_category()->result();
        $data['listKecamatan']  = $this->shop_m->select_kecamatan()->result();
		$this->template->display('admin/shop/edit', $data);
	}
	
	public function updatedata() {
		$this->shop_m->update_data();
	}

    public function get_data($id) {
        $data   = $this->shop_m->select_by_id($id)->row();
        echo json_encode($data);
    }

    public function approvedata($id) {
        $this->shop_m->approve_data($id);
    }

    public function rejectdata() {
        $this->shop_m->reject_data();
    }
}
/* Location: ./application/controller/admin/Shop.php */