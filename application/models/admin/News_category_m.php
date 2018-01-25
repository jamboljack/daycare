<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_category_m extends CI_Model {
	var $table 			= 'pasar_news_category';
    var $column_order 	= array(null, null, 'category_name');
    var $column_search 	= array('category_name');
    var $order 			= array('category_name' => 'asc');

	function __construct() {
		parent::__construct();	
	}

	private function _get_datatables_query() {
        $this->db->from($this->table);
        
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

	function insert_data() {
		$data = array(
            'category_name'      => strtoupper(stripHTMLtags($this->input->post('name', 'true'))),
            'category_seo'       => seo_title(stripHTMLtags($this->input->post('name', 'true'))),
			'category_update' 	 => date('Y-m-d H:i:s')
		);

		$this->db->insert('pasar_news_category', $data);
	}

    function select_by_id($id) {
        $this->db->select('*');
        $this->db->from('pasar_news_category');
        $this->db->where('category_id', $id);

        return $this->db->get();
    }

	function update_data() {
		$category_id     	= $this->input->post('id', 'true');
        $data = array(
            'category_name'      => strtoupper(stripHTMLtags($this->input->post('name', 'true'))),
            'category_seo'       => seo_title(stripHTMLtags($this->input->post('name', 'true'))),
            'category_update'    => date('Y-m-d H:i:s')
        );

		$this->db->where('category_id', $category_id);
		$this->db->update('pasar_news_category', $data);
	}

	function delete_data($id) {
		$this->db->where('category_id', $id);
		$this->db->delete('pasar_news_category');
	}
}
/* Location: ./application/models/admin/News_category_m.php */