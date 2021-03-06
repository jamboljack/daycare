<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Year_m extends CI_Model
{
    public $table         = 'alifa_year';
    public $column_order  = array(null, null, 'year_name', 'year_status');
    public $column_search = array('year_name', 'year_status');
    public $order         = array('year_id' => 'desc');

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query()
    {
        $this->db->from($this->table);

        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }

            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function insert_data()
    {
        $data = array(
            'year_name'   => strtoupper($this->input->post('name', 'true')),
            'year_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('alifa_year', $data);
    }

    public function select_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('alifa_year');
        $this->db->where('year_id', $id);

        return $this->db->get();
    }

    public function update_data()
    {
        $year_id = $this->input->post('id', 'true');
        $data    = array(
            'year_name'   => strtoupper($this->input->post('name', 'true')),
            'year_update' => date('Y-m-d H:i:s'),
        );
        $this->db->where('year_id', $year_id);
        $this->db->update('alifa_year', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('year_id', $id);
        $this->db->delete('alifa_year');
    }

    public function activate_data($id)
    {
        $data = array(
            'year_status' => 1,
            'year_update' => date('Y-m-d H:i:s'),
        );
        $this->db->where('year_id', $id);
        $this->db->update('alifa_year', $data);

        $data = array(
            'year_status' => 0,
            'year_update' => date('Y-m-d H:i:s'),
        );
        $this->db->where('year_id <>', $id);
        $this->db->update('alifa_year', $data);

    }
}
/* Location: ./application/models/admin/Year_m.php */
