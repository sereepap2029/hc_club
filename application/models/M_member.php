<?php
class M_member extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("m_stringlib");
        $this->load->model('m_member_item');  
    }
    
    function generate_id() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('member', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function generate_ref_id()
    {
        $isuniq    = FALSE;
        $temp_id = $this->get_last_ref_id();
        $num=(int)$temp_id;

        $ref_id = array('num_loop' => 0,"id"=>"" );
        $ref_id['start_claim_id']=$temp_id;
        do
        {   
            $ref_id['num_loop']+=1;
            $num+=1;
            $temp_id2="".$num;
            $lenght=strlen($temp_id2);
            for ($i=0; $i <7-$lenght&&$lenght<7 ; $i++) { 
                $temp_id2="0".$temp_id2;
            }
            $ref_id['id']=$temp_id2;
            $query = $this->db->get_where('member', array('ref_id' => $temp_id2));
            if ($query->num_rows() == 0)
            {
                $isuniq    = TRUE;
            }
        }
        while(!$isuniq);
    
        return $ref_id;
    }
    function get_last_ref_id(){
        $inform = new stdClass();
        $this->db->limit(10);
        $this->db->order_by("ref_id", "desc"); 
        $query = $this->db->get_where('member');
        $id="00000";
        if ($query->num_rows() > 0)
            {
                $inform = $query->result();
                $inform = $inform[0];
                $id=$inform->ref_id;
            }
        return $id;
    }
    function check_dup_username($username) {
        $isuniq = FALSE;
        $query = $this->db->get_where('member', array('username' => $username));
            if ($query->num_rows() == 0) {
                $isuniq = TRUE;
            }
        
        return $isuniq;
    }
    function add_member($data) {
        $this->db->insert('member', $data);
    }
    function update_member($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('member', $data);
    }
    function delete_member($id) { 
        $this->delete_perm_by_member_id($id);
        $pic=$this->m_member_item->get_all_member_item($id);
        foreach ($pic as $key => $value) {
            $this->m_member_item->delete($value->id);
        }
        $this->db->where('id', $id);
        $this->db->delete('member');
    }
    function count_all() {
        $query = $this->db->query("SELECT COUNT(*) as r FROM member;");
        return $query->result()[0]->r;
    }
    function get_all_member($offset=0,$limit=10,$order_by="firstname",$type="asc") {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get('member');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
            foreach ($g_list as $key => $value) {
                $g_list[$key]->item=$this->m_member_item->get_all_member_item($value->id);
            }
        }
        return $g_list;
    }
    function get_member_by_id($id) {
        $business = new stdClass();
        $query = $this->db->get_where('member', array('id' => $id));
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
            $business->item=$this->m_member_item->get_all_member_item($business->id);
        }
        return $business;
    }
    function get_by_username_password($username,$password) {
        $producer = new stdClass();
        $query = $this->db->get_where('member', array('username' => $username));
        
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
