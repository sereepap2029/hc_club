<?php
class M_admin_item extends CI_Model
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
            $query = $this->db->get_where('admin_item', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function add_admin_item($data) {
        $this->db->insert('admin_item', $data);
    }
    function update_admin_item($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('admin_item', $data);
    }

    function delete($id) { 
        $admin_item=$this->get_admin_item_by_id($id);
        if (isset($admin_item->id)) {
            @unlink("./media/admin_item/".$admin_item->filepath);
        }
        $this->db->where('id', $id);
        $this->db->delete('admin_item');
    }   


    function count_all() {
        $query = $this->db->query("SELECT COUNT(*) as r FROM aom;");
        return $query->result()[0]->r;
    }
    function get_all_admin_item($admin_id,$offset=0,$limit=0,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        $this->db->where('admin_id', $admin_id);
        $query = $this->db->get('admin_item');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_admin_item_by_id($id) {
        $business = new stdClass();
        $query = $this->db->get_where('admin_item', array('id' => $id));
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
        }
        return $business;
    }
}
