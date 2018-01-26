<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select_slider()
    {
        $this->db->select('*');
        $this->db->from('alifa_slider');
        $this->db->order_by('slider_id', 'asc');

        return $this->db->get();
    }
}
/* Location: ./application/model/Home_m.php */
