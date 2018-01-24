<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory_m extends CI_Model {
	var $table 			= 'pasar_subcategory';
    var $column_order 	= array(null, null, 'c.category_name', 's.subcategory_name');
    var $column_search 	= array('c.category_name', 's.subcategory_name');
    var $order 			= array('c.category_name' => 'asc', 's.subcategory_name' => 'asc');

	function __construct() {
		parent::__construct();	
	}

    function select_category() {
        $this->db->select('*');
        $this->db->from('pasar_category');
        $this->db->order_by('category_no', 'asc');

        return $this->db->get();
    }

	private function _get_datatables_query() {
        if ($this->input->post('lstCategoryFilter', 'true')) {
            $this->db->where('s.category_id', $this->input->post('lstCategoryFilter', 'true'));
        }

        $this->db->select('s.*, c.category_name');
        $this->db->from('pasar_subcategory s');
        $this->db->join('pasar_category c', 's.category_id = c.category_id');

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
			'category_id'           => $this->input->post('lstCategory', 'true'),
            'subcategory_name'      => strtoupper(stripHTMLtags($this->input->post('name', 'true'))),
            'subcategory_seo'       => seo_title(stripHTMLtags($this->input->post('name', 'true'))),
            // 'subcategory_image'	    => $this->upload->file_name,
			'subcategory_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('pasar_subcategory', $data);
	}

    function select_by_id($id) {
        $this->db->select('*');
        $this->db->from('pasar_subcategory');
        $this->db->where('subcategory_id', $id);

        return $this->db->get();
    }

	function update_data() {
		$subcategory_id     	= $this->input->post('id', 'true');

      //   if (!empty($_FILES['foto']['name'])) {
    		// $data = array(
      //           'category_id'           => $this->input->post('lstCategory', 'true'),
      //           'subcategory_name'      => strtoupper(stripHTMLtags($this->input->post('name', 'true'))),
      //           'subcategory_seo'       => seo_title(stripHTMLtags($this->input->post('name', 'true'))),
      //           'subcategory_image'     => $this->upload->file_name,
      //           'subcategory_update'    => date('Y-m-d H:i:s')
      //       );
      //   } else {
            $data = array(
                'category_id'           => $this->input->post('lstCategory', 'true'),
                'subcategory_name'      => strtoupper(stripHTMLtags($this->input->post('name', 'true'))),
                'subcategory_seo'       => seo_title(stripHTMLtags($this->input->post('name', 'true'))),
                'subcategory_update'    => date('Y-m-d H:i:s')
            );
        // }

		$this->db->where('subcategory_id', $subcategory_id);
		$this->db->update('pasar_subcategory', $data);
	}

	function delete_data($id) {
		$this->db->where('subcategory_id', $id);
		$this->db->delete('pasar_subcategory');
	}
}
/* Location: ./application/models/admin/Subcategory_m.php */