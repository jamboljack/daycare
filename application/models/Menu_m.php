<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Menu_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select_contact()
    {
        $this->db->select('*');
        $this->db->from('alifa_contact');
        $this->db->where('contact_id', 1);

        return $this->db->get();
    }

    public function select_user($username)
    {
        $this->db->select('*');
        $this->db->from('alifa_users');
        $this->db->where('user_username', $username);

        return $this->db->get();
    }
}
/* Location: ./application/model/Menu_m.php */
