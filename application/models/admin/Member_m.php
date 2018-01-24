<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_m extends CI_Model {
    var $table          = 'pasar_users';
    var $column_order 	= array(null, null, 'user_username', 'user_name', 'user_gender', 'user_mobile', 'user_email',
        'user_level', 'user_status', null);
    var $column_search 	= array('user_username', 'user_name', 'user_gender', 'user_mobile', 'user_email',
        'user_level', 'user_status');
    var $order 			= array('user_name' => 'asc');

	function __construct() {
		parent::__construct();	
	}

	private function _get_datatables_query() {
        if ($this->input->post('lstJK', 'true')) {
            $this->db->where('user_gender', $this->input->post('lstJK', 'true'));
        }
        if ($this->input->post('lstStatus', 'true')) {
            $this->db->where('user_status', $this->input->post('lstStatus', 'true'));
        }
        if ($this->input->post('lstBanned', 'true')) {
            $this->db->where('user_banned', $this->input->post('lstBanned', 'true'));
        }

        $this->db->from($this->table);
        $this->db->where('user_level', 'Member');

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
        $this->db->where('user_level', 'Member');

        return $this->db->count_all_results();
    }

	function select_by_id($user_username) {
		$this->db->select('*');
		$this->db->from('pasar_users');
		$this->db->where('user_username', $user_username);
		
		return $this->db->get();
	}

	function update_data() {
		$user_username  = $this->input->post('id', 'true');
		
        $data = array(
                    'user_status'       => trim($this->input->post('lstStatus', 'true')),
                    'user_banned'       => trim($this->input->post('lstBanned', 'true')),
	    			'user_date_update'  => date('Y-m-d H:i:s')
        );

		$this->db->where('user_username', $user_username);
		$this->db->update('pasar_users', $data);
	}
}
/* Location: ./application/model/admin/Member_m.php */