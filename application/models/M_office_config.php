<?php
class M_office_config extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("m_stringlib");
    }
    
    function add_office_config($data) {
        $this->db->insert('office_config', $data);
    }
    function delete_office_config() { 
        $this->db->where('id !=', "0");
        $this->db->delete('office_config');
    }
    function count_all() {
        $query = $this->db->query("SELECT COUNT(*) as r FROM office_config;");
        return $query->result()[0]->r;
    }
    function get_all_office_config($offset=0,$limit=0,$order_by="name",$type="asc") {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get('office_config');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }

    function get_office_config() {
        $business = new stdClass();
        $query = $this->db->get('office_config');
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
        }
        return $business;
    }
}
