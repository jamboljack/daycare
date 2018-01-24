<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('level') == 'Admin' && !$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/order_m');
	}
	
	public function index() {
		if($this->session->userdata('level') == 'Admin' && $this->session->userdata('logged_in_pasarku')) {
			$this->template->display('admin/order/view');
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function data_list() {
        $List = $this->order_m->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();
            $order_id = $r->order_id;

            $link 	 = site_url('admin/order/detaildata/'.$r->order_id);
            $row[] = '  <a href="'.$link.'"><button class="btn btn-primary btn-xs" title="Detail Data"><i class="fa fa-edit"></i></button></a>';

            $row[] = $no;
            $row[] = $r->order_id;
            $row[] = $r->address_name;
            $row[] = date("d-m-Y", strtotime($r->order_date));
            $row[] = date("d-m-Y", strtotime($r->order_tempo));
            $row[] = number_format($r->order_subtotal, 0 ,'', ',');
            $row[] = number_format($r->order_ongkir, 0 ,'', ',');
            $row[] = number_format($r->order_total, 0 ,'', ',');
            
            if ($r->order_status == 'BB') {
                $status = '<span class="label label-default">Belum Bayar</span>';
            } elseif ($r->order_status == 'BK') {
                $status = '<span class="label label-primary">Belum Kirim</span>';
            } elseif ($r->order_status == 'BT') {
                $status = '<span class="label label-warning">Belum Terima</span>';
            } elseif ($r->order_status == 'S') {
                $status = '<span class="label label-success">Selesai</span>';
            } elseif ($r->order_status == 'B') {
                $status = '<span class="label label-danger">Batal</span>';
            }
            $row[] = $status;
            
            $data[] = $row;
        }

        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->order_m->count_all(),
                        "recordsFiltered" 	=> $this->order_m->count_filtered(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }

    public function detaildata($order_id) {
        $data['listShop']   = $this->order_m->select_shop_detail($order_id)->result();
        $data['detail']     = $this->order_m->select_detail($order_id)->row();
        $data['detailBank'] = $this->order_m->select_detail_bank()->row();

        $this->template->display('admin/order/detail', $data);
    }
}
/* Location: ./application/controller/admin/Order.php */