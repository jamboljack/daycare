<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop_m extends CI_Model {
    var $table          = 'pasar_shop';
    var $column_order 	= array(null, null, 's.shop_name', 's.shop_domain', 'c.category_name','s.shop_status', 's.shop_banned', 's.shop_created',
    null);
    var $column_search 	= array('s.shop_name', 's.shop_domain', 'c.category_name','s.shop_status', 's.shop_banned',  's.shop_created');
    var $order 			= array('s.shop_name' => 'asc');

	function __construct() {
		parent::__construct();	
	}

	private function _get_datatables_query() {
        if ($this->input->post('lstCategory', 'true')) {
            $this->db->where('s.category_id', $this->input->post('lstCategory', 'true'));
        }
        if ($this->input->post('lstStatus', 'true')) {
            $this->db->where('s.shop_status', $this->input->post('lstStatus', 'true'));
        }
        if ($this->input->post('lstBanned', 'true')) {
            $this->db->where('s.shop_banned', $this->input->post('lstBanned', 'true'));
        }

        $this->db->select('s.*, c.category_name');
        $this->db->from('pasar_shop s');
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

    function select_category() {
        $this->db->select('*');
        $this->db->from('pasar_category');
        $this->db->order_by('category_no', 'asc');

        return $this->db->get();
    }

    function select_kecamatan() {
        $this->db->select('*');
        $this->db->from('api_subdistrict');
        $this->db->where('city_id', '209');
        $this->db->order_by('subdistrict_name', 'asc');

        return $this->db->get();
    }
    
	function select_by_id($shop_id) {
		$this->db->select('s.*, u.user_name, u.user_mobile');
        $this->db->from('pasar_shop s');
        $this->db->join('pasar_users u', 's.user_username = u.user_username');
		$this->db->where('s.shop_id', $shop_id);
		
		return $this->db->get();
	}

	function update_data() {
		$shop_id  = $this->input->post('id', 'true');
		
        $data = array(
                    'category_id'       => trim($this->input->post('lstCategory', 'true')),
                    'shop_status'       => trim($this->input->post('lstStatus', 'true')),
                    'shop_banned'       => trim($this->input->post('lstBanned', 'true')),
	    			'shop_update'       => date('Y-m-d H:i:s')
        );

		$this->db->where('shop_id', $shop_id);
		$this->db->update('pasar_shop', $data);
	}

    function approve_data($id) {
        $data = array(
                    'shop_status'       => 'Active',
                    'shop_approved'     => date('Y-m-d H:i:s'),
                    'shop_update'       => date('Y-m-d H:i:s')
        );

        $this->db->where('shop_id', $id);
        $this->db->update('pasar_shop', $data);

        // Kirim Email Konfirmasi
        $this->db->select('*');
        $this->db->from('pasar_setting');
        $this->db->where('setting_id', 1);
        $footer = $this->db->get()->row();
        $dataFooter     = $footer->setting_desc;

        $this->db->select('s.*, u.user_name, u.user_email');
        $this->db->from('pasar_shop s');
        $this->db->join('pasar_users u', 's.user_username = u.user_username');
        $this->db->where('s.shop_id', $id);
        $datatoko = $this->db->get()->row();

        $namatoko       = trim($datatoko->shop_name);
        $namadomain     = trim($datatoko->shop_domain);
        $namaseo        = trim($datatoko->shop_seo);
        $name           = trim($datatoko->user_name);
        $email          = trim($datatoko->user_email);

        $sender_email   = 'pasarku.kudus@gmail.com';
        $sender_name    = 'PasarKu';
        $subject        = "Approval Toko";
        $message        = "Kepada : ".$name."
                            <br>
                            <p>
                            Detail Toko Anda : <br>
                            Nama Toko : ".$namatoko."<br>
                            Nama Domain : https://pasarku.kuduskab.go.id/front/umkm/detail/".$id."/".$namaseo."<br><br>
                            Toko Anda telah kami Terima, Silahkan kunjungi Dashboard Toko anda untuk mengelola Barang anda. Terima Kasih.
                            </p><br><br>".$dataFooter;

        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from($sender_email, $sender_name);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function reject_data() {
        $id     = $this->input->post('id', 'true');
        $desc   = $this->input->post('desc', 'true');

        $data = array(
                    'shop_status'       => 'Reject',
                    'shop_reject'       => $this->input->post('desc', 'true'),
                    'shop_update'       => date('Y-m-d H:i:s')
        );

        $this->db->where('shop_id', $id);
        $this->db->update('pasar_shop', $data);

        // Kirim Email Konfirmasi
        $this->db->select('*');
        $this->db->from('pasar_setting');
        $this->db->where('setting_id', 1);
        $footer = $this->db->get()->row();
        $dataFooter     = $footer->setting_desc;

        $this->db->select('s.*, u.user_name, u.user_email');
        $this->db->from('pasar_shop s');
        $this->db->join('pasar_users u', 's.user_username = u.user_username');
        $this->db->where('s.shop_id', $id);
        $datatoko = $this->db->get()->row();

        $namatoko       = trim($datatoko->shop_name);
        $namadomain     = trim($datatoko->shop_domain);
        $name           = trim($datatoko->user_name);
        $email          = trim($datatoko->user_email);

        $sender_email   = 'pasarku.kudus@gmail.com';
        $sender_name    = 'PasarKu';
        $subject        = "Reject Toko";
        $message        = "Kepada : ".$name."
                            <br>
                            <p>
                            Detail Toko Anda : <br>
                            Nama Toko : ".$namatoko."<br><br>
                            Registrasi Toko Anda telah kami Tolak dengan Alasan sebagai berikut : <br>".$desc."
                            </p><br><br>".$dataFooter;

        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from($sender_email, $sender_name);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
}
/* Location: ./application/model/admin/Shop_m.php */