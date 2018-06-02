<?php
class M_task extends CI_Model
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
            $query = $this->db->get_where('task', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function add_task($data) {
        $this->db->insert('task', $data);
    }
    function add_comment($data) {
        $this->db->insert('task_comment', $data);
    }
    function update_task($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('task', $data);
    }
    function delete_task($id) { 
        $this->delete_comment_by_task_id($id);
        $this->db->where('id', $id);
        $this->db->delete('task');
    }
    function delete_comment_by_task_id($id) { 
        $this->db->where('task_id', $id);
        $this->db->delete('task_comment');
    }
    function count_all() {
        $query = $this->db->query("SELECT COUNT(*) as r FROM task;");
        return $query->result()[0]->r;
    }
    function get_all_task($offset=0,$limit=0,$order_by="date_create",$type="desc") {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get('task');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function count_all_mytask($user_id) {
        $query = $this->db->query("SELECT COUNT(*) as r FROM task WHERE responsible = '".$user_id."' AND status='active';");
        return $query->result()[0]->r;
    }
    function get_all_mytask($user_id,$offset=0,$limit=0,$order_by="date_create",$type="asc") {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        $this->db->where('responsible', $user_id);
        $this->db->where('status', "active");
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get('task');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function count_all_ordertask($user_id) {
        $query = $this->db->query("SELECT COUNT(*) as r FROM task WHERE create_by = '".$user_id."' AND status='active';");
        return $query->result()[0]->r;
    }
    function get_all_ordertask($user_id,$offset=0,$limit=0,$order_by="date_create",$type="asc") {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        $this->db->where('create_by', $user_id);
        $this->db->where('status', "active");
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get('task');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function count_all_donetask() {
        $query = $this->db->query("SELECT COUNT(*) as r FROM task WHERE status='active';");
        return $query->result()[0]->r;
    }
    function get_all_donetask($user_id,$offset=0,$limit=0,$order_by="date_create",$type="asc") {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        $this->db->where('status', "complete");
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get('task');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }

    function get_comment_by_task_id($task_id,$order_by="date_create",$type="desc") {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        $this->db->where('task_id', $task_id);
        $query = $this->db->get('task_comment');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }

    function get_task_by_id($id) {
        $business = new stdClass();
        $query = $this->db->get_where('task', array('id' => $id));
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
        }
        return $business;
    }
}
