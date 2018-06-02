<?php
class M_lawyer extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("m_stringlib");
    }
    
    function generate_id() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('lawyer', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function add_lawyer($data) {
        $this->db->insert('lawyer', $data);
    }
    function update_lawyer($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('lawyer', $data);
    }
    function delete_lawyer($id) { 
        $this->db->where('id', $id);
        $this->db->delete('lawyer');
    }
    function count_all() {
        $query = $this->db->query("SELECT COUNT(*) as r FROM lawyer;");
        return $query->result()[0]->r;
    }
    function get_all_lawyer($offset=0,$limit=0,$order_by="name",$type="asc") {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get('lawyer');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }

    function get_lawyer_by_id($id) {
        $business = new stdClass();
        $query = $this->db->get_where('lawyer', array('id' => $id));
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
        }
        return $business;
    }
}
