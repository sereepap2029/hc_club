<?php
class M_bang extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("m_stringlib");
        $this->load->model('m_bang_item');
        $this->load->model('m_admin');
    }

    function generate_id_guarantee() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('bang_guarantee', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }

    function generate_id_appeal() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('bang_appeal', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function generate_id_payment() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('bang_payment', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function generate_id_investigate() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('bang_investigate', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function generate_id_borrow() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('bang_borrow', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function generate_id_withdraw() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('bang_withdraw', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function generate_id_sold() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('bang_sold', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function generate_id_withdraw_detail() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('bang_withdraw_detail', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }




    
    function generate_id() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('bang', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function add_bang($data) {
        $this->db->insert('bang', $data);
    }
    function add_guarantee($data) {
        $this->db->insert('bang_guarantee', $data);
    }
    function add_appeal($data) {
        $this->db->insert('bang_appeal', $data);
    }
    function add_payment($data) {
        $this->db->insert('bang_payment', $data);
    }
    function add_investigete($data) {
        $this->db->insert('bang_investigate', $data);
    }
    function add_borrow($data) {
        $this->db->insert('bang_borrow', $data);
    }
    function add_withdraw($data) {
        $this->db->insert('bang_withdraw', $data);
    }
    function add_withdraw_detail($data) {
        $this->db->insert('bang_withdraw_detail', $data);
    }
    function add_sold($data) {
        $this->db->insert('bang_sold', $data);
    }


    function update_bang($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('bang', $data);
    }
    function update_guarantee($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('bang_guarantee', $data);
    }
    function update_appeal($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('bang_appeal', $data);
    }
    function update_payment($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('bang_payment', $data);
    }
    function update_investigete($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('bang_investigate', $data);
    }
    function update_borrow($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('bang_borrow', $data);
    }
    function update_withdraw($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('bang_withdraw', $data);
    }
    function update_withdraw_detail($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('bang_withdraw_detail', $data);
    }
    function update_sold($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('bang_sold', $data);
    }




    function delete_bang($id) { 
        $pic=$this->m_bang_item->get_all_bang_item($id);
        foreach ($pic as $key => $value) {
            $this->m_bang_item->delete_bang($value->id);
        }
        $this->delete_guarantee_by_bang_id($id);
        $this->delete_sold_by_bang_id($id);
        $this->delete_appeal_by_bang_id($id);
        $this->delete_withdraw_by_bang_id($id);
        $this->delete_borrow_by_bang_id($id);
        $this->delete_investigete_by_bang_id($id);
        $this->delete_payment_by_bang_id($id);
        $this->db->where('id', $id);
        $this->db->delete('bang');
    }
    function delete_guarantee($id) { 
        $this->db->where('id', $id);
        $this->db->delete('bang_guarantee');
    }
    function delete_guarantee_by_bang_id($id) { 
        $this->db->where('bang_id', $id);
        $this->db->delete('bang_guarantee');
    }
    function delete_sold($id) { 
        $this->db->where('id', $id);
        $this->db->delete('bang_sold');
    }
    function delete_sold_by_bang_id($id) { 
        $this->db->where('bang_id', $id);
        $this->db->delete('bang_sold');
    }
    function delete_appeal($id) { 
        $this->db->where('id', $id);
        $this->db->delete('bang_appeal');
    }
    function delete_appeal_by_bang_id($id) { 
        $this->db->where('bang_id', $id);
        $this->db->delete('bang_appeal');
    }
    function delete_payment($id) { 
        $this->db->where('id', $id);
        $this->db->delete('bang_payment');
    }
    function delete_payment_by_bang_id($id) { 
        $this->db->where('bang_id', $id);
        $this->db->delete('bang_payment');
    }
    function delete_investigete($id) { 
        $this->db->where('id', $id);
        $this->db->delete('bang_investigate');
    }
    function delete_investigete_by_bang_id($id) { 
        $this->db->where('bang_id', $id);
        $this->db->delete('bang_investigate');
    }
    function delete_borrow($id) { 
        $this->db->where('id', $id);
        $this->db->delete('bang_borrow');
    }
    function delete_borrow_by_bang_id($id) { 
        $this->db->where('bang_id', $id);
        $this->db->delete('bang_borrow');
    }
    function delete_withdraw($id) { 
        $this->delete_withdraw_detail_by_withdraw_id($id);
        $this->db->where('id', $id);
        $this->db->delete('bang_withdraw');
    }
    function delete_withdraw_by_bang_id($id) { 
        $this->delete_withdraw_detail_by_bang_id($id);
        $this->db->where('bang_id', $id);
        $this->db->delete('bang_withdraw');
    }
    function delete_withdraw_detail($id) { 
        $this->db->where('id', $id);
        $this->db->delete('bang_withdraw_detail');
    }
    function delete_withdraw_detail_by_bang_id($id) { 
        $this->db->where('bang_id', $id);
        $this->db->delete('bang_withdraw_detail');
    }
    function delete_withdraw_detail_by_withdraw_id($id) { 
        $this->db->where('withdraw_id', $id);
        $this->db->delete('bang_withdraw_detail');
    }



    function count_all() {
        $query = $this->db->query("SELECT COUNT(*) as r FROM bang;");
        return $query->result()[0]->r;
    }
    function get_all_bang($offset=0,$limit=10,$order_by="date",$type="desc",$search_array= array()) {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        foreach ($search_array as $key => $value) {
            if ($key!="start_date"&&$key!="end_date") {
                $this->db->or_like($key,$value);
            }elseif($key=="start_date"&&$value!==""){
                $this->db->where('date >=', $value);
            }elseif($key=="end_date"&&$value!==""){
                $this->db->where('date <=', $value);
            }               
        }
        $query = $this->db->get('bang');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_guarantee_by_bang_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('bang_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('bang_guarantee');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_appeal_by_bang_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('bang_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('bang_appeal');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_payment_by_bang_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('bang_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('bang_payment');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_sold_by_bang_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('bang_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('bang_sold');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_borrow_by_bang_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('bang_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('bang_borrow');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_investigate_by_bang_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('bang_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('bang_investigate');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_withdraw_detail_by_withdraw_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('withdraw_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('bang_withdraw_detail');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_withdraw_by_bang_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('bang_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('bang_withdraw');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
            foreach ($g_list as $key => $value) {
                $g_list[$key]->withdraw_detail=$this->get_withdraw_detail_by_withdraw_id($value->id);
            }
        }
        return $g_list;
    }

    function get_bang_by_id($id) {
        $business = new stdClass();
        $query = $this->db->get_where('bang', array('id' => $id));
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
            $business->guarantee=$this->get_guarantee_by_bang_id($business->id);
            $business->appeal=$this->get_appeal_by_bang_id($business->id);
            $business->payment=$this->get_payment_by_bang_id($business->id);
            $business->sold=$this->get_sold_by_bang_id($business->id);
            $business->withdraw=$this->get_withdraw_by_bang_id($business->id);
            $business->item=$this->m_bang_item->get_all_bang_item($business->id);
            $business->borrow_list=$this->get_borrow_by_bang_id($business->id);
            $business->investigate = $this->get_investigate_by_bang_id($business->id);
        }
        return $business;
    }

    // bang Save logs
    function get_all_log($bang_id="no",$offset=0,$limit=10,$order_by="time",$type="desc",$search_array= array()) {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        foreach ($search_array as $key => $value) {
            $this->db->or_like($key,$value);
        }
        $this->db->where('bang_id', $bang_id);
        $query = $this->db->get('bang_save_log');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
            foreach ($g_list as $key => $value) {
                $g_list[$key]->user_data=$this->m_admin->get_admin_by_id($value->user);
                if (!isset($g_list[$key]->user_data->username)) {
                    $g_list[$key]->user_data->firstname="ไม่พบข้อมูล";
                    $g_list[$key]->user_data->lastname="ไม่พบข้อมูล";
                }
            }
        }
        return $g_list;
    }
    function add_bang_log($data) {
        $this->db->insert('bang_save_log', $data);
    }
}
