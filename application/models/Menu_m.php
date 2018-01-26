<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Menu_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select_contact()
    {
        $this->db->select('*');
        $this->db->from('alifa_contact');
        $this->db->where('contact_id', 1);

        return $this->db->get();
    }

    public function select_user($username)
    {
        $this->db->select('*');
        $this->db->from('alifa_users');
        $this->db->where('user_username', $username);

        return $this->db->get();
    }

    public function select_meta()
    {
        $this->db->select('*');
        $this->db->from('alifa_meta');
        $this->db->where('meta_id', 1);

        return $this->db->get();
    }

    public function select_social()
    {
        $this->db->select('*');
        $this->db->from('alifa_social');
        $this->db->order_by('social_id', 'asc');

        return $this->db->get();
    }

    public function select_paket()
    {
        $this->db->select('*');
        $this->db->from('alifa_paket');
        $this->db->order_by('paket_id', 'asc');

        return $this->db->get();
    }

    public function select_category()
    {
        $this->db->select('*');
        $this->db->from('alifa_category');
        $this->db->order_by('category_no', 'asc');

        return $this->db->get();
    }

    public function select_promo()
    {
        $this->db->select('*');
        $this->db->from('alifa_promo');
        $this->db->order_by('promo_id', 'desc');
        $this->db->limit(10);

        return $this->db->get();
    }

    public function select_article()
    {
        $this->db->select('*');
        $this->db->from('alifa_article');
        $this->db->order_by('article_id', 'desc');
        $this->db->limit(5);

        return $this->db->get();
    }
}
/* Location: ./application/model/Menu_m.php */
