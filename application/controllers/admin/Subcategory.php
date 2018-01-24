<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('level') == 'Admin' && !$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/subcategory_m');
	}
	
	public function index() {
		if($this->session->userdata('level') == 'Admin' && $this->session->userdata('logged_in_pasarku')) {
			$data['listCategory'] = $this->subcategory_m->select_category()->result();
			$this->template->display('admin/master/subcategory_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function data_list() {
        $List = $this->subcategory_m->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();
            $subcategory_id = $r->subcategory_id;
            
            $row[] = '	<button type="button" class="btn btn-primary btn-xs" title="Edit Data" href="javascript:void(0)" onclick="edit_data('."'".$subcategory_id."'".')"><i class="fa fa-edit"></i></button>
            			<a onclick="hapusData('.$subcategory_id.')"><button class="btn btn-danger btn-xs" type="button" title="Delete Data"><i class="fa fa-times-circle"></i></button>';

            $row[] = $no;
            $row[] = $r->category_name;
            $row[] = $r->subcategory_name;
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->subcategory_m->count_all(),
                        "recordsFiltered" 	=> $this->subcategory_m->count_filtered(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }

	public function savedata() {
		// $jam        = time();
		// $name 		= seo_title(stripHTMLtags($this->input->post('name', 'true')));
		
		// $config['file_name']        = 'SubCategory_'.$name.'_'.$jam.'.jpg';
	 //    $config['upload_path']      = './img/subcategory_folder/';
	 //    $config['allowed_types']    = 'jpg|png|gif|jpeg';
	 //    $config['overwrite']        = TRUE;
	 //    $config['max_size']         = 0;
	 //    $this->load->library('upload');
	 //    $this->upload->initialize($config);
	 //    // Resize
	 //    $configThumb                    = array();
	 //    $configThumb['image_library']   = 'gd2';
	 //    $configThumb['source_image']    = '';
	 //    $configThumb['maintain_ratio']  = TRUE;
	 //    $configThumb['overwrite']       = TRUE;
	 //    $configThumb['width']           = 320;
	 //    $configThumb['height']          = 320;
	 //    $this->load->library('image_lib');

	 //    if (!$this->upload->do_upload('foto')) {
	 // 		$response['status'] = 'error';
	 // 	} else {
	 //    	$upload         = $this->upload->do_upload('foto');
	 //        $upload_data    = $this->upload->data();
	 //        $name_array[]   = $upload_data['file_name']; 
	 //        $configThumb['source_image'] = $upload_data['full_path'];
	 //        $this->image_lib->initialize($configThumb);
	 //        $this->image_lib->resize();

	 //        $this->subcategory_m->insert_data();
	 //        $response['status'] = 'success';
	 //    }

		// echo json_encode($response);
		$this->subcategory_m->insert_data();
	}

	public function get_data($id) {
        $data   = $this->subcategory_m->select_by_id($id)->row();
        echo json_encode($data);
    }

	public function updatedata() {
		// if (!empty($_FILES['foto']['name'])) {
		// 	$jam        = time();
		// 	$name 		= seo_title(stripHTMLtags($this->input->post('name', 'true')));

	 //        $config['file_name']        = 'SubCategory_'.$name.'_'.$jam.'.jpg';
	 //        $config['upload_path']      = './img/subcategory_folder/';
	 //        $config['allowed_types']    = 'jpg|png|gif|jpeg';
	 //        $config['overwrite']        = TRUE;
	 //        $config['max_size']         = 0;
	 //        $this->load->library('upload');
	 //        $this->upload->initialize($config);
	 //        // Resize
	 //        $configThumb                    = array();
	 //        $configThumb['image_library']   = 'gd2';
	 //        $configThumb['source_image']    = '';
	 //        $configThumb['maintain_ratio']  = TRUE;
	 //        $configThumb['overwrite']       = TRUE;
	 //        $configThumb['width']           = 320;
	 //        $configThumb['height']          = 320;
	 //        $this->load->library('image_lib');

	 //        if (!$this->upload->do_upload('foto')) {
	 // 			$response['status'] = 'error';
	 //        } else {
	 //            $upload         = $this->upload->do_upload('foto');
	 //            $upload_data    = $this->upload->data();
	 //            $name_array[]   = $upload_data['file_name']; 
	 //            $configThumb['source_image'] = $upload_data['full_path'];
	 //            $this->image_lib->initialize($configThumb);
	 //            $this->image_lib->resize();

	 //            $this->subcategory_m->update_data();
	 //            $response['status'] = 'success';
	 //        }
		// } else {
		// 	$this->subcategory_m->update_data();
		// 	$response['status'] = 'success';
		// }

		// echo json_encode($response);
		$this->subcategory_m->update_data();
	}

	public function deletedata($id) {
        $this->subcategory_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
}
/* Location: ./application/controller/admin/Subcategory.php */