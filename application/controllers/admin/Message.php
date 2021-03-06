<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in_alifa')) {
            redirect(base_url());
        }

        $this->load->library('template');
        $this->load->model('admin/message_m');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in_alifa')) {
            $this->template->display('admin/master/message_view');
        } else {
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }

    public function data_list()
    {
        $List = $this->message_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row     = array();
            $message_id = $r->message_id;

            $row[] = '  <button type="button" class="btn btn-primary btn-xs" title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $message_id . "'" . ')">
                        <i class="fa fa-edit"></i>
                        </button>
                        <a onclick="hapusData(' . $message_id . ')">
                        <button class="btn btn-danger btn-xs" type="button" title="Delete Data">
                        <i class="fa fa-times-circle"></i>
                        </button>
                        </a>';

            $row[] = $no;
            $row[] = date('d-m-Y', strtotime($r->message_post));
            $row[] = $r->message_name;
            $row[] = $r->message_email;
            $row[] = $r->message_subject;
            $row[] = $r->message_message;
            
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->message_m->count_all(),
            "recordsFiltered" => $this->message_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedata()
    {
        $this->message_m->insert_data();
    }

    public function get_data($id)
    {
        $data = $this->message_m->select_by_id($id)->row();
        echo json_encode($data);
    }

    public function updatedata()
    {

        $this->message_m->update_data();
    }

    public function deletedata($id)
    {
        $this->message_m->delete_data($id);
        echo json_encode(array("status" => true));
    }

    public function activate($id)
    {
        $this->message_m->activate_data($id);
        echo json_encode(array("status" => true));
    }
}
/* Location: ./application/controller/admin/Message.php */
