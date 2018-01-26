<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Produk_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select_detail()
    {
        $this->db->select('*');
        $this->db->from('alifa_menu');
        $this->db->where('menu_id', 3);

        return $this->db->get();
    }
}
/* Location: ./application/model/Produk_m.php */
