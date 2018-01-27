<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Promo_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select_promo()
    {
        $this->db->select('*');
        $this->db->from('alifa_promo');
        $this->db->order_by('promo_id', 'desc');

        return $this->db->get();
    }
}
/* Location: ./application/model/Promo_m.php */
