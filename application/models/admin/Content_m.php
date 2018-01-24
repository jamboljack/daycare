<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_m extends CI_Model {
	var $table 			= 'pasar_content';
    var $column_order 	= array(null, null, 'content_name', 'content_desc', 'content_level');
    var $column_search 	= array('content_name', 'content_desc', 'content_level');
    var $order 			= array('content_level' => 'asc');

	function __construct() {
		parent::__construct();	
	}

	private function _get_datatables_query() {
        if ($this->input->post('lstLevel', 'true')) {
            $this->db->where('content_level', $this->input->post('lstLevel', 'true'));
        }

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
            'content_name'      => trim(stripHTMLtags($this->input->post('name', 'true'))),
            'content_seo'       => seo_title(stripHTMLtags($this->input->post('name', 'true'))),
            'content_level'     => $this->input->post('lstLevel', 'true'),
            'content_desc'      => $this->input->post('desc', 'true'),
			'content_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('pasar_content', $data);
	}

    function select_by_id($id) {
        $this->db->select('*');
        $this->db->from('pasar_content');
        $this->db->where('content_id', $id);

        return $this->db->get();
    }

	function update_data() {
		$content_id     	= $this->input->post('id', 'true');
        
        $data = array(
            'content_name'      => trim(stripHTMLtags($this->input->post('name', 'true'))),
            'content_seo'       => seo_title(stripHTMLtags($this->input->post('name', 'true'))),
            'content_level'     => $this->input->post('lstLevel', 'true'),
            'content_desc'      => $this->input->post('desc', 'true'),
            'content_update'    => date('Y-m-d H:i:s')
        );

		$this->db->where('content_id', $content_id);
		$this->db->update('pasar_content', $data);
	}

	function delete_data($id) {
		$this->db->where('content_id', $id);
		$this->db->delete('pasar_content');
	}
}
/* Location: ./application/models/admin/Content_m.php */