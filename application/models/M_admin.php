<?php
class M_admin extends CI_Model
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
            $query = $this->db->get_where('admin_user', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function check_dup_username($username) {
        $isuniq = FALSE;
        $query = $this->db->get_where('admin_user', array('username' => $username));
            if ($query->num_rows() == 0) {
                $isuniq = TRUE;
            }
        
        return $isuniq;
    }
    function add_admin($data) {
        $this->db->insert('admin_user', $data);
    }
    function update_admin($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('admin_user', $data);
    }
    function delete_admin($id) { 
        $this->delete_perm_by_admin_id($id);
        $this->db->where('id', $id);
        $this->db->delete('admin_user');
    }
    function delete_perm_by_admin_id($id) { 
        $this->db->where('admin_id', $id);
        $this->db->delete('perm');
    }
    function add_perm($data) {
        $this->db->insert('perm', $data);
    }
    function delete_perm_by_admin_id_and_perm($id,$perm) { 
        $this->db->where('admin_id', $id);
        $this->db->where('permission', $perm);
        $this->db->delete('perm');
    }
    function count_all() {
        $query = $this->db->query("SELECT COUNT(*) as r FROM admin_user;");
        return $query->result()[0]->r;
    }
    function get_all_admin($offset=0,$limit=10,$order_by="firstname",$type="asc") {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get('admin_user');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
            foreach ($g_list as $key => $value) {
                $g_list[$key]->perm=$this->get_perm_by_admin($value->id);
            }
        }
        return $g_list;
    }
    function get_perm_by_admin($id) {
        $g_list = array();
        $g_list2 = array();
        $this->db->where('admin_id', $id);
        $query = $this->db->get('perm');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
            foreach ($g_list as $key => $value) {
                $g_list2[$value->permission]=$value;
            }
        }
        return $g_list2;
    }

    function get_admin_by_id($id) {
        $business = new stdClass();
        $query = $this->db->get_where('admin_user', array('id' => $id));
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
            $business->perm=$this->get_perm_by_admin($business->id);
        }
        return $business;
    }
    function get_by_username_password($username,$password) {
        $producer = new stdClass();
        $query = $this->db->get_where('admin_user', array('username' => $username));
        
        if ($query->num_rows() > 0) {
            $producer = $query->result();
            $producer = $producer[0];
            if(!password_verify($password, $producer->password)) {
                $producer = new stdClass();
            } 
        }
        return $producer;
    }
}
