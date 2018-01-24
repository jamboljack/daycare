<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Profil_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select_detail($username)
    {
        $this->db->select('*');
        $this->db->from('pasar_users');
        $this->db->where('user_username', $username);

        return $this->db->get();
    }

    public function update_data_profil()
    {
        $username = $this->session->userdata('username');

        $data = array(
            'user_name'        => ucwords(strtolower(stripHTMLtags($this->input->post('name', 'true')))),
            'user_date'        => trim($this->input->post('lstDate', 'true')),
            'user_month'       => trim($this->input->post('lstMonth', 'true')),
            'user_year'        => trim($this->input->post('lstYear', 'true')),
            'user_gender'      => trim($this->input->post('lstGender', 'true')),
            'user_mobile'      => trim(stripHTMLtags($this->input->post('mobile', 'true'))),
            'user_date_update' => date('Y-m-d H:i:s')
        );

        $this->db->where('user_username', $username);
        $this->db->update('pasar_users', $data);
    }

    public function update_avatar()
    {
        $username = $this->session->userdata('username');
        $data     = array(
            'user_avatar'      => $this->upload->file_name,
            'user_date_update' => date('Y-m-d H:i:s')
        );

        $this->db->where('user_username', $username);
        $this->db->update('pasar_users', $data);
    }

    public function update_password()
    {
        $username = $this->session->userdata('username');
        $password = trim($this->input->post('newpassword', 'true'));

        $data = array(
            'user_password'    => sha1($password),
            'user_date_update' => date('Y-m-d H:i:s')
        );

        $this->db->where('user_username', $username);
        $this->db->update('pasar_users', $data);
    }
}
/* Location: ./application/model/admin/Profil_m.php */
