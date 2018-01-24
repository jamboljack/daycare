<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_m extends CI_Model {
	var $table 			= 'pasar_product';
    var $column_order 	= array(null, null,  'p.product_name', 'c.category_name', 'p.product_price', 'p.product_sell', 
        'p.product_created', 'p.product_status');
    var $column_search 	= array('p.product_name', 'c.category_name', 'p.product_price', 'p.product_sell', 
        'p.product_created', 'p.product_status');
    var $order 			= array('p.product_name' => 'asc');

    var $table1          = 'pasar_thumbnail';
    var $column_order1   = array(null, null);
    var $column_search1  = array();
    var $order1          = array('thumbnail_id' => 'asc');

	function __construct() {
		parent::__construct();	
	}

    function select_category() {
        $this->db->select('*');
        $this->db->from('pasar_category');
        $this->db->order_by('category_no', 'asc');

        return $this->db->get();
    }

    function select_subcategory($category_id){
        $this->db->where('category_id', $category_id);
        $this->db->order_by('subcategory_name', 'asc');
        $sql_subcategory = $this->db->get('pasar_subcategory');
        if($sql_subcategory->num_rows()>0) {
            foreach ($sql_subcategory->result_array() as $row) {
                $result['']= '- Pilih Sub Kategori -';
                $result[$row['subcategory_id']] = trim($row['subcategory_name']);
            }
        } else {
            $result['']= '- Belum Ada Sub Kategori -';
        }
        return $result;
    }

	private function _get_datatables_query() {
        if ($this->input->post('lstCategory', 'true')) {
            $this->db->where('p.category_id', $this->input->post('lstCategory', 'true'));
        }
        $tgl_input_dari = date("Y-m-d", strtotime($this->input->post('date_create_from', 'true')));
        if ($this->input->post('date_create_from', 'true')) {
            $this->db->where('p.product_created >=', $tgl_input_dari);
        }
        $tgl_input_sampai = date("Y-m-d", strtotime($this->input->post('date_create_to', 'true')));
        if ($this->input->post('date_create_to', 'true')) {
            $this->db->where('p.product_created <=', $tgl_input_sampai);
        }
        if ($this->input->post('price_from', 'true')) {
            $this->db->where('p.product_price >=', intval(str_replace(",", "", $this->input->post('price_from', 'true'))));
        }
        if ($this->input->post('price_to', 'true')) {
            $this->db->where('p.product_price <=', intval(str_replace(",", "", $this->input->post('price_to', 'true'))));
        }
        if ($this->input->post('sell_from', 'true')) {
            $this->db->where('p.product_sell >=', intval(str_replace(",", "", $this->input->post('sell_from', 'true'))));
        }
        if ($this->input->post('sell_to', 'true')) {
            $this->db->where('p.product_sell <=', intval(str_replace(",", "", $this->input->post('sell_to', 'true'))));
        }
        if ($this->input->post('lstStatus', 'true')) {
            $this->db->where('p.product_status', $this->input->post('lstStatus', 'true'));
        }

        $shop_id = $this->session->userdata('shop_id');
        $this->db->select('p.*, c.category_name');
        $this->db->from('pasar_product p');
        $this->db->join('pasar_category c', 'p.category_id = c.category_id');

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

    function select_subcategory_by_id() {
        $this->db->select('*');
        $this->db->from('pasar_subcategory');
        $this->db->order_by('subcategory_name', 'asc');

        return $this->db->get();
    }

    function select_detail($product_id) {
        $this->db->select('*');
        $this->db->from('pasar_product');
        $this->db->where('product_id', $product_id);

        return $this->db->get();
    }

    function select_thumb($product_id) {
        $this->db->select('*');
        $this->db->from('pasar_thumbnail');
        $this->db->where('product_id', $product_id);
        $this->db->order_by('thumbnail_id', 'asc');

        return $this->db->get();
    }

    function select_review($product_id) {
        $this->db->select('*');
        $this->db->from('pasar_review');
        $this->db->where('product_id', $product_id);
        $this->db->order_by('review_post', 'asc');

        return $this->db->get();
    }

    private function _get_datatables_query_thumbnail() {
        $product_id = $this->uri->segment(4); // Product ID
        $this->db->from($this->table1);
        $this->db->where('product_id', $product_id);

        $i = 0;
        foreach ($this->column_search1 as $item) {
            if($_POST['search']['value']) {
                if($i===0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search1) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
         
        if(isset($_POST['order'])) {
            $this->db->order_by($this->column_order1[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables_thumbnail() {
        $this->_get_datatables_query_thumbnail();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_thumbnail() {
        $this->_get_datatables_query_thumbnail();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_thumbnail() {
        $product_id = $this->uri->segment(4); // Product ID
        $this->db->from($this->table1);
        $this->db->where('product_id', $product_id);

        return $this->db->count_all_results();
    }
}
/* Location: ./application/models/admin/Product_m.php */