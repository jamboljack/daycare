<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_m extends CI_Model {
	var $table 			= 'pasar_order';
    var $column_order 	= array(null, null, 'o.order_id', 'a.address_name', 'o.order_date', 'o.order_tempo', 'o.order_subtotal',
     'o.order_ongkir', 'o.order_total', 'o.order_status');
    var $column_search 	= array('o.order_id', 'a.address_name', 'o.order_date', 'o.order_tempo', 'o.order_subtotal',
     'o.order_ongkir', 'o.order_total', 'o.order_status');
    var $order 			= array('o.order_id' => 'desc');

	function __construct() {
		parent::__construct();	
	}

	private function _get_datatables_query() {
        if ($this->input->post('lstStatus', 'true')) {
            $this->db->where('o.order_status', $this->input->post('lstStatus', 'true'));
        }

        $tgl_order_dari = date("Y-m-d", strtotime($this->input->post('date_order_from', 'true')));
        if ($this->input->post('date_order_from', 'true')) {
            $this->db->where('o.order_date >=', $tgl_order_dari);
        }
        
        $tgl_order_sampai = date("Y-m-d", strtotime($this->input->post('date_order_to', 'true')));
        if ($this->input->post('date_order_to', 'true')) {
            $this->db->where('o.order_date <=', $tgl_order_sampai);
        }

        $this->db->select('o.*, a.*');
        $this->db->from('pasar_order o');
        $this->db->join('pasar_address a', 'o.address_id = a.address_id');

        $i = 0;
        foreach ($this->column_search as $item) {
            if($_POST['search']['value']) {
                if($i===0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
         
        if(isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables() {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function select_shop_detail($order_id) {
        $this->db->select('s.*, g.*');
        $this->db->from('pasar_order o');
        $this->db->join('pasar_order_group g', 'g.order_id = o.order_id');
        $this->db->join('pasar_shop s', 'g.shop_id = s.shop_id');
        $this->db->where('o.order_id', $order_id);
        $this->db->order_by('g.group_id');
        
        return $this->db->get();
    }

    function select_detail($order_id) {
        $this->db->select('o.*, a.*, p.province, c.city_name, s.subdistrict_name');
        $this->db->from('pasar_order o');
        $this->db->join('pasar_address a', 'o.address_id = a.address_id');
        $this->db->join('api_province p', 'a.province_id = p.province_id');
        $this->db->join('api_city c', 'a.city_id = c.city_id');
        $this->db->join('api_subdistrict s', 'a.subdistrict_id = s.subdistrict_id');
        $this->db->where('o.order_id', $order_id);
        
        return $this->db->get();
    }

    function select_detail_bank() {
        $this->db->select('*');
        $this->db->from('pasar_contact');
        $this->db->where('contact_id', 1);
        
        return $this->db->get();
    }

    function select_all_item($group_id) {
        $this->db->select('d.*,p.*');
        $this->db->from('pasar_order_group g');
        $this->db->join('pasar_order_detail d', 'd.group_id = g.group_id');
        $this->db->join('pasar_product p', 'd.product_id = p.product_id');
        $this->db->where('g.group_id', $group_id);
        $this->db->order_by('d.product_id', 'asc');
        
        return $this->db->get();
    }
}
/* Location: ./application/models/admin/Order_m.php */