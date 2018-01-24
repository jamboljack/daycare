<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // function select_member() {
    //        $this->db->select('COUNT(user_username) as total');
    //        $this->db->from('pasar_users');
    //        $this->db->where('user_level', 'Member');

    //        return $this->db->get();
    //    }

    //    function select_toko() {
    //        $this->db->select('COUNT(shop_id) as total');
    //        $this->db->from('pasar_shop');
    //        $this->db->where('shop_status', 'Active');

    //        return $this->db->get();
    //    }

    //    function select_product() {
    //        $this->db->select('COUNT(product_id) as total');
    //        $this->db->from('pasar_product');

    //        return $this->db->get();
    //    }

    //    function select_invoice() {
    //        $this->db->select('COUNT(order_id) as total');
    //        $this->db->from('pasar_order');

    //        return $this->db->get();
    //    }

    //    function select_revenue_belum() {
    //        $this->db->select('SUM(order_total) as total');
    //        $this->db->from('pasar_order');
    //        $this->db->where('order_status', 'BB');

    //        return $this->db->get();
    //    }

    //    function select_revenue_sudah() {
    //        $this->db->select('SUM(order_total) as total');
    //        $this->db->from('pasar_order');
    //        $this->db->where('order_status <>', 'BB');

    //        return $this->db->get();
    //    }

    //    function select_revenue() {
    //        $this->db->select('SUM(order_total) as total');
    //        $this->db->from('pasar_order');

    //        return $this->db->get();
    //    }
}
/* Location: ./application/model/admin/Home_m.php */
