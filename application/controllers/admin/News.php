<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('level') == 'Admin' && !$this->session->userdata('logged_in_pasarku')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/news_m');
	}
	
	public function index() {
		if($this->session->userdata('level') == 'Admin' && $this->session->userdata('logged_in_pasarku')) {
			$this->template->display('admin/news/view');
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function data_list() {
        $List = $this->news_m->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();
            $news_id = $r->news_id;
            
            $link 	= site_url('admin/news/editdata/'.$r->news_id);
            $row[] = '<a href="'.$link.'"><button class="btn btn-primary btn-xs" title="Edit Data"><i class="fa fa-edit"></i></button></a>
            			<a onclick="hapusData('.$news_id.')"><button class="btn btn-danger btn-xs" type="button" title="Delete Data"><i class="fa fa-times-circle"></i></button>';

            $row[] = $no;
            $row[] = $r->user_username;
            $row[] = date('d-m-Y H:i', strtotime($r->news_date));
            $row[] = $r->category_name;
            $row[] = $r->news_title;
            $row[] = '<img src='.base_url('img/news_folder/'.$r->news_image).' width="50%">';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->news_m->count_all(),
                        "recordsFiltered" 	=> $this->news_m->count_filtered(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }

    public function adddata() {
        $data['listCategory'] = $this->news_m->select_category()->result();
		$this->template->display('admin/news/add', $data);
	}

	public function savedata() {
		$jam        = time();
        $name       = seo_title(stripHTMLtags($this->input->post('name', 'true')));

        $config['file_name']        = 'News_'.$name.'_'.$jam.'.jpg';
        $config['upload_path']      = './img/news_folder/';
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
        $configThumb['width']           = 800;
        $configThumb['height']          = 500;
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

            $this->news_m->insert_data();
            $response['status'] = 'success';
        }

        echo json_encode($response);
	}

	public function editdata($news_id) {
        $data['listCategory'] = $this->news_m->select_category()->result();
		$data['detail']	      = $this->news_m->select_by_id($news_id)->row();
		$this->template->display('admin/news/edit', $data);
	}

	public function updatedata() {
        if (!empty($_FILES['foto']['name'])) {
            $jam        = time();
            $name       = seo_title(stripHTMLtags($this->input->post('name', 'true')));

            $config['file_name']        = 'News_'.$name.'_'.$jam.'.jpg';
            $config['upload_path']      = './img/news_folder/';
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
            $configThumb['width']           = 800;
            $configThumb['height']          = 500;
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

                $this->news_m->update_data();
                $response['status'] = 'success';
            }
        } else {
            $this->news_m->update_data();
            $response['status'] = 'success';
        }

        echo json_encode($response);
	}

	public function deletedata($id) {
        $this->news_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
}
/* Location: ./application/controller/admin/News.php */