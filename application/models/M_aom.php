<?php
class M_aom extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("m_stringlib");
        $this->load->model('m_aom_item');
        $this->load->model('m_admin');
    }

    function generate_id_guarantee() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('guarantee', array('id' => $temp_id));
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
            $query = $this->db->get_where('appeal', array('id' => $temp_id));
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
            $query = $this->db->get_where('borrow', array('id' => $temp_id));
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
            $query = $this->db->get_where('withdraw', array('id' => $temp_id));
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
            $query = $this->db->get_where('sold', array('id' => $temp_id));
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
            $query = $this->db->get_where('withdraw_detail', array('id' => $temp_id));
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
            $query = $this->db->get_where('aom', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function add_aom($data) {
        $this->db->insert('aom', $data);
    }
    function add_guarantee($data) {
        $this->db->insert('guarantee', $data);
    }
    function add_appeal($data) {
        $this->db->insert('appeal', $data);
    }
    function add_borrow($data) {
        $this->db->insert('borrow', $data);
    }
    function add_withdraw($data) {
        $this->db->insert('withdraw', $data);
    }
    function add_withdraw_detail($data) {
        $this->db->insert('withdraw_detail', $data);
    }
    function add_sold($data) {
        $this->db->insert('sold', $data);
    }
    function add_consider($data) {
        $this->db->insert('aom_consider', $data);
    }
    function update_aom($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('aom', $data);
    }
    function update_guarantee($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('guarantee', $data);
    }
    function update_appeal($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('appeal', $data);
    }
    function update_borrow($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('borrow', $data);
    }
    function update_withdraw($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('withdraw', $data);
    }
    function update_withdraw_detail($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('withdraw_detail', $data);
    }
    function update_sold($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('sold', $data);
    }




    function delete_aom($id) { 
        $pic=$this->m_aom_item->get_all_aom_item($id);
        foreach ($pic as $key => $value) {
            $this->m_aom_item->delete_aom($value->id);
        }
        $this->delete_guarantee_by_aom_id($id);
        $this->delete_sold_by_aom_id($id);
        $this->delete_appeal_by_aom_id($id);
        $this->delete_withdraw_by_aom_id($id);
        $this->delete_borrow_by_aom_id($id);
        $this->delete_consider_by_aom_id($id);
        $this->db->where('id', $id);
        $this->db->delete('aom');
    }
    function delete_guarantee($id) { 
        $this->db->where('id', $id);
        $this->db->delete('guarantee');
    }
    function delete_guarantee_by_aom_id($id) { 
        $this->db->where('aom_id', $id);
        $this->db->delete('guarantee');
    }
    function delete_sold($id) { 
        $this->db->where('id', $id);
        $this->db->delete('sold');
    }
    function delete_sold_by_aom_id($id) { 
        $this->db->where('aom_id', $id);
        $this->db->delete('sold');
    }
    function delete_appeal($id) { 
        $this->db->where('id', $id);
        $this->db->delete('appeal');
    }
    function delete_appeal_by_aom_id($id) { 
        $this->db->where('aom_id', $id);
        $this->db->delete('appeal');
    }
    function delete_borrow($id) { 
        $this->db->where('id', $id);
        $this->db->delete('borrow');
    }
    function delete_borrow_by_aom_id($id) { 
        $this->db->where('aom_id', $id);
        $this->db->delete('borrow');
    }
    function delete_consider_by_aom_id($id) { 
        $this->db->where('aom_id', $id);
        $this->db->delete('aom_consider');
    }
    function delete_withdraw($id) { 
        $this->delete_withdraw_detail_by_withdraw_id($id);
        $this->db->where('id', $id);
        $this->db->delete('withdraw');
    }
    function delete_withdraw_by_aom_id($id) { 
        $this->delete_withdraw_detail_by_aom_id($id);
        $this->db->where('aom_id', $id);
        $this->db->delete('withdraw');
    }
    function delete_withdraw_detail($id) { 
        $this->db->where('id', $id);
        $this->db->delete('withdraw_detail');
    }
    function delete_withdraw_detail_by_aom_id($id) { 
        $this->db->where('aom_id', $id);
        $this->db->delete('withdraw_detail');
    }
    function delete_withdraw_detail_by_withdraw_id($id) { 
        $this->db->where('withdraw_id', $id);
        $this->db->delete('withdraw_detail');
    }



    function count_all() {
        $query = $this->db->query("SELECT COUNT(*) as r FROM aom;");
        return $query->result()[0]->r;
    }
    function get_all_aom($offset=0,$limit=10,$order_by="date",$type="desc",$search_array= array()) {
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
        $query = $this->db->get('aom');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_guarantee_by_aom_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('aom_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('guarantee');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_appeal_by_aom_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('aom_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('appeal');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_sold_by_aom_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('aom_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('sold');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_borrow_by_aom_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('aom_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('borrow');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_consider_by_aom_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('aom_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('aom_consider');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_withdraw_detail_by_withdraw_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('withdraw_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('withdraw_detail');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_withdraw_by_aom_id($id,$order_by="sort_order",$type="asc") {
        $g_list = array();
        $this->db->where('aom_id', $id);
        $this->db->order_by($order_by, $type);
        $query = $this->db->get('withdraw');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
            foreach ($g_list as $key => $value) {
                $g_list[$key]->withdraw_detail=$this->get_withdraw_detail_by_withdraw_id($value->id);
            }
        }
        return $g_list;
    }

    function get_aom_by_id($id) {
        $business = new stdClass();
        $query = $this->db->get_where('aom', array('id' => $id));
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
            $business->guarantee=$this->get_guarantee_by_aom_id($business->id);
            $business->appeal=$this->get_appeal_by_aom_id($business->id);
            $business->sold=$this->get_sold_by_aom_id($business->id);
            $business->withdraw=$this->get_withdraw_by_aom_id($business->id);
            $business->item=$this->m_aom_item->get_all_aom_item($business->id);
            $business->borrow_list=$this->get_borrow_by_aom_id($business->id);
            $business->consider_list=$this->get_consider_by_aom_id($business->id);
        }
        return $business;
    }

    // aom Save logs
    function get_all_log($aom_id="no",$offset=0,$limit=10,$order_by="time",$type="desc",$search_array= array()) {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        foreach ($search_array as $key => $value) {
            $this->db->or_like($key,$value);
        }
        $this->db->where('aom_id', $aom_id);
        $query = $this->db->get('aom_save_log');
        
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
    function add_aom_log($data) {
        $this->db->insert('aom_save_log', $data);
    }
}
