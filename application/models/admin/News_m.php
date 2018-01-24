<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_m extends CI_Model {
	var $table 			= 'pasar_news';
    var $column_order 	= array(null, null, 'n.user_username', 'n.news_date', 'c.category_name', 'n.news_title', null);
    var $column_search 	= array('c.category_name', 'n.news_title');
    var $order 			= array('n.news_id' => 'desc');

	function __construct() {
		parent::__construct();	
	}

    function select_category() {
        $this->db->select('*');
        $this->db->from('pasar_news_category');
        $this->db->order_by('category_name', 'asc');

        return $this->db->get();
    }

	private function _get_datatables_query() {
        $this->db->select('n.*, c.category_name');
        $this->db->from('pasar_news n');
        $this->db->join('pasar_news_category c', 'n.category_id=c.category_id');

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
            'user_username'  => $this->session->userdata('username'),
            'category_id'    => $this->input->post('lstCategory', 'true'),
            'news_title'     => strtoupper(trim(stripHTMLtags($this->input->post('name', 'true')))),
            'news_seo'       => seo_title(stripHTMLtags($this->input->post('name', 'true'))),
            'news_desc'      => trim($this->input->post('desc', 'true')),
            'news_image'     => $this->upload->file_name,
			'news_date' 	 => date('Y-m-d H:i:s'),
            'news_update'    => date('Y-m-d H:i:s')
		);

		$this->db->insert('pasar_news', $data);
	}

    function select_by_id($id) {
        $this->db->select('*');
        $this->db->from('pasar_news');
        $this->db->where('news_id', $id);

        return $this->db->get();
    }

	function update_data() {
		$news_id     	= $this->input->post('id', 'true');
        
        if (!empty($_FILES['foto']['name'])) {
            $data = array(
                'user_username'  => $this->session->userdata('username'),
                'category_id'    => $this->input->post('lstCategory', 'true'),
                'news_title'     => strtoupper(trim(stripHTMLtags($this->input->post('name', 'true')))),
                'news_seo'       => seo_title(stripHTMLtags($this->input->post('name', 'true'))),
                'news_desc'      => trim($this->input->post('desc', 'true')),
                'news_image'     => $this->upload->file_name,
                'news_date'      => date('Y-m-d H:i:s'),
                'news_update'    => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'user_username'  => $this->session->userdata('username'),
                'category_id'    => $this->input->post('lstCategory', 'true'),
                'news_title'     => strtoupper(trim(stripHTMLtags($this->input->post('name', 'true')))),
                'news_seo'       => seo_title(stripHTMLtags($this->input->post('name', 'true'))),
                'news_desc'      => trim($this->input->post('desc', 'true')),
                'news_date'      => date('Y-m-d H:i:s'),
                'news_update'    => date('Y-m-d H:i:s')
            );
        }

		$this->db->where('news_id', $news_id);
		$this->db->update('pasar_news', $data);
	}

	function delete_data($id) {
		$this->db->where('news_id', $id);
		$this->db->delete('pasar_news');
	}
}
/* Location: ./application/models/admin/News_m.php */