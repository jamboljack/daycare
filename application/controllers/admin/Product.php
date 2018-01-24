<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('level') == 'Admin' && !$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/product_m');
	}
	
	public function index() {
		if($this->session->userdata('level') == 'Admin' && $this->session->userdata('logged_in_pasarku')) {
			$data['listCategory'] = $this->product_m->select_category()->result();
			$this->template->display('admin/product/view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function data_list() {
        $List = $this->product_m->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();
            $product_id = $r->product_id;

            // $row[] = '<input type="checkbox" class="icheck" name="id[]" value="'.$product_id.'">';
            $link 	 = site_url('admin/product/detaildata/'.$r->product_id.'/'.$r->product_seo);
            $row[] = '  <a href="'.$link.'">
                            <button class="btn btn-primary btn-xs" title="Edit Data"><i class="fa fa-edit"></i></button>
                        </a>';

            $row[] = $no;
            $row[] = $r->product_name;
            $row[] = $r->category_name;
            $row[] = number_format($r->product_price, 0 ,'', ',');
            $row[] = number_format($r->product_sell, 0, '', ',');
            $row[] = date("d-m-Y", strtotime($r->product_created));
            if ($r->product_status == 'published') {
            	$row[] = '<span class="label label-sm label-success">'.$r->product_status.'</span>';
            } elseif ($r->product_status == 'notpublished') {
            	$row[] = '<span class="label label-sm label-warning">'.$r->product_status.'</span>';
            } elseif ($r->product_status == 'deleted') {
            	$row[] = '<span class="label label-sm label-danger">'.$r->product_status.'</span>';
            }
            
            $data[] = $row;
        }

        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->product_m->count_all(),
                        "recordsFiltered" 	=> $this->product_m->count_filtered(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }

	public function select_sub() {
        $data['listSubCategory'] = $this->product_m->select_subcategory($this->uri->segment(4));
        $this->load->view('admin/product/drop_down_subcategory', $data);
    }

	public function detaildata($product_id) {
    	$data['listCategory'] 	= $this->product_m->select_category()->result();
    	$data['listSub'] 		= $this->product_m->select_subcategory_by_id()->result();
    	$data['listThumb'] 		= $this->product_m->select_thumb($product_id)->result();
    	$data['listReview'] 	= $this->product_m->select_review($product_id)->result();
    	$data['detail'] 		= $this->product_m->select_detail($product_id)->row();
		$this->template->display('admin/product/detail', $data);
	}

    public function data_list_thumbnail() {
        $List = $this->product_m->get_datatables_thumbnail();
        $data = array();
        $no = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();
            $thumbnail_id = $r->thumbnail_id;

            $row[] = '	<button type="button" class="btn btn-primary btn-xs" title="Edit Data" href="javascript:void(0)" onclick="edit_data_thumbnail('."'".$thumbnail_id."'".')"><i class="fa fa-edit"></i></button>
            			<a onclick="hapusDataThumbnail('.$thumbnail_id.')"><button class="btn btn-danger btn-xs" type="button" title="Delete Data"><i class="fa fa-times-circle"></i></button>';

            $row[] = '<img src="'.base_url('img/product_folder/'.$r->thumbnail_image).'" width="30%">';
            
            $data[] = $row;
        }

        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->product_m->count_all_thumbnail(),
                        "recordsFiltered" 	=> $this->product_m->count_filtered_thumbnail(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }
}
/* Location: ./application/controller/admin/Product.php */