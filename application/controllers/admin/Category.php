<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('level') == 'Admin' && !$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/category_m');
	}
	
	public function index() {
		if($this->session->userdata('level') == 'Admin' && $this->session->userdata('logged_in_pasarku')) {
			$this->template->display('admin/master/category_view');
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function data_list() {
        $List = $this->category_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();
            $category_id = $r->category_id;
            
            $row[] = '	<button type="button" class="btn btn-primary btn-xs" title="Edit Data" href="javascript:void(0)" onclick="edit_data('."'".$category_id."'".')"><i class="fa fa-edit"></i></button>
            			<a onclick="hapusData('.$category_id.')"><button class="btn btn-danger btn-xs" type="button" title="Delete Data"><i class="fa fa-times-circle"></i></button>';

            $row[] = $no;
            $row[] = $r->category_no;
            $row[] = $r->category_name;
            $btnUp 		= site_url('admin/category/atas/'.$r->category_id.'/'.$r->category_no);
            $btnBottom  = site_url('admin/category/bawah/'.$r->category_id.'/'.$r->category_no);

            if ($no==1) {
            	$row[] = '<a href="'.$btnBottom.'" title="Order ke Bawah"><i class="fa fa-arrow-down"></i></a>';
            } else {
            	$row[] = '<a href="'.$btnUp.'" title="Order ke Atas"><i class="fa fa-arrow-up"></i></a>
            			<a href="'.$btnBottom.'" title="Order ke Bawah"><i class="fa fa-arrow-down"></i></a>';
            }
            
            $row[] = ($r->category_show=='S'?'Show':'Not Show');
            $row[] = '<img src='.base_url('img/category_folder/'.$r->category_image).' width="20%">';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->category_m->count_all(),
                        "recordsFiltered" 	=> $this->category_m->count_filtered(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }

	public function savedata() {
		// if (!empty($_FILES['foto']['name'])) {
			$jam        = time();
			$name 		= seo_title(stripHTMLtags($this->input->post('name', 'true')));

	        $config['file_name']        = 'Category_'.$name.'_'.$jam.'.jpg';
	        $config['upload_path']      = './img/category_folder/';
	        $config['allowed_types']    = 'jpg|png|gif|jpeg';
	        $config['overwrite']        = TRUE;
	        $config['max_size']         = 0;
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        // Resize
	        $configThumb                    = array();
	        $configThumb['image_library']   = 'gd2';
	        $configThumb['source_image']    = '';
	        $configThumb['maintain_ratio']  = TRUE;
	        $configThumb['overwrite']       = TRUE;
	        $configThumb['width']           = 300;
	        $configThumb['height']          = 300;
	        $this->load->library('image_lib');

	        if (!$this->upload->do_upload('foto')) {
	 			$response['status'] = 'error';
	        } else {
	            $upload         = $this->upload->do_upload('foto');
	            $upload_data    = $this->upload->data();
	            $name_array[]   = $upload_data['file_name']; 
	            $configThumb['source_image'] = $upload_data['full_path'];
	            $this->image_lib->initialize($configThumb);
	            $this->image_lib->resize();

	            $this->category_m->insert_data();
	            $response['status'] = 'success';
	        }
		// } else {
		// 	$this->category_m->insert_data();
		// 	$response['status'] = 'success';
		// }

		echo json_encode($response);
	}

	public function get_data($id) {
        $data   = $this->category_m->select_by_id($id)->row();
        echo json_encode($data);
    }

	public function updatedata() {
		if (!empty($_FILES['foto']['name'])) {
			$jam        = time();
			$name 		= seo_title(stripHTMLtags($this->input->post('name', 'true')));

	        $config['file_name']        = 'Category_'.$name.'_'.$jam.'.jpg';
	        $config['upload_path']      = './img/category_folder/';
	        $config['allowed_types']    = 'jpg|png|gif|jpeg';
	        $config['overwrite']        = TRUE;
	        $config['max_size']         = 0;
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        // Resize
	        $configThumb                    = array();
	        $configThumb['image_library']   = 'gd2';
	        $configThumb['source_image']    = '';
	        $configThumb['maintain_ratio']  = TRUE;
	        $configThumb['overwrite']       = TRUE;
	        $configThumb['width']           = 300;
	        $configThumb['height']          = 300;
	        $this->load->library('image_lib');

	        if (!$this->upload->do_upload('foto')) {
	 			$response['status'] = 'error';
	        } else {
	            $upload         = $this->upload->do_upload('foto');
	            $upload_data    = $this->upload->data();
	            $name_array[]   = $upload_data['file_name']; 
	            $configThumb['source_image'] = $upload_data['full_path'];
	            $this->image_lib->initialize($configThumb);
	            $this->image_lib->resize();

	            $this->category_m->update_data();
	            $response['status'] = 'success';
	        }
		} else {
			$this->category_m->update_data();
			$response['status'] = 'success';
		}

		echo json_encode($response);
	}

	public function deletedata($id) {
        $this->category_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }

	public function atas() {
		$id 			= $this->uri->segment(4);
		$posisi 		= $this->uri->segment(5);
		$posisi_baru 	= ($posisi-1);
		$this->category_m->atas($id, $posisi, $posisi_baru);
		redirect(site_url('admin/category'));
	}

	public function bawah() {
		$id 			= $this->uri->segment(4);
		$posisi 		= $this->uri->segment(5);
		$posisi_baru 	= ($posisi+1);
		$this->category_m->bawah($id, $posisi, $posisi_baru);
		redirect(site_url('admin/category'));
	}
}
/* Location: ./application/controller/admin/Category.php */