<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();      
        $this->load->model('m_admin');  
        if ($this->session->userdata('id')) {
            $user_data = $this->m_admin->get_admin_by_id($this->session->userdata('id'));
            if (isset($user_data->username)&&isset($user_data->perm['account'])) {
                $this->user_data = $user_data;
            }
            else {
                redirect('main/logout');
            }
        }
        else {
            redirect('main/logout');
        }
    }
	public function index()
	{
		$data['page'] = 'user';
		$page=(int)$this->uri->segment(2,"1");
		$offset=($page-1)*12;
		$data['user_list'] = $this->m_admin->get_all_admin($offset,12);
		$rowcount=$this->m_admin->count_all();
		$pagecount=($rowcount/12);
		if (($rowcount%12!=0)) {
			$pagecount+1;
		}
		$data['pagecount']=$pagecount;
		$data['pagenum']=$page;
		$this->load->view('header',$data);
		$this->load->view('user_list',$data);
	}
	public function delete()
	{
		$id=$this->uri->segment(3,'');
		$this->m_admin->delete_admin($id);
		?>
				        <script type="text/javascript">
				        	alert("ลบข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('user');?>","_self");            
				        </script>
				    <?
	}
	public function ajax_set_perm()
	{
		header('Content-Type: application/json');
        $json = array();
        $json['flag']="OK";
		
		if ($_POST['state']=='ins') {
			$data = array('admin_id' => $_POST['id'],'permission' => $_POST['perm']);
			$this->m_admin->add_perm($data);
			$json['flag']="1";
		}else{
			$this->m_admin->delete_perm_by_admin_id_and_perm($_POST['id'],$_POST['perm']);
			$json['flag']="0";
		}
		echo json_encode($json);		    
	}
	public function create()
	{
		if (isset($_POST['name'])&&!isset($_POST['edit'])) {
			if ($_POST['password']==$_POST['con_password']) {
				$id=$this->m_admin->generate_id();
				$data_ins = array(
					'id' => $id,
					'prefix' => $_POST['prefix'],
					'firstname' => $_POST['name'],
					'lastname' => $_POST['surname'],
					'username' => $_POST['username'],
					'password' => $_POST['password'],
					'email' => $_POST['email'],
				 );
				if ($this->m_admin->check_dup_username($_POST['username'])) {
					$this->m_admin->add_admin($data_ins);
					?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('user');?>","_self");            
				        </script>
				    <?
				}else{
					?>
				        <script type="text/javascript">
				        	alert("Username ซ้ำในระบบ");
				            window.open("<?echo site_url('user/create');?>","_self");            
				        </script>
				    <?     
				}
			}else{
				?>
				        <script type="text/javascript">
				        	alert("Password ไม่ตรงกัน");
				            window.open("<?echo site_url('user/create');?>","_self");            
				        </script>
				    <?
			}

		}
		if (isset($_POST['name'])&&isset($_POST['edit'])) {
			if ($_POST['password']==$_POST['con_password']) {
				$id=$_POST['edit'];
				$data_up = array(
					'prefix' => $_POST['prefix'],
					'firstname' => $_POST['name'],
					'lastname' => $_POST['surname'],
					'password' => $_POST['password'],
					'email' => $_POST['email'],
				 );
					$this->m_admin->update_admin($data_up);
					?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('user');?>","_self");            
				        </script>
				    <?
			}else{
				?>
				        <script type="text/javascript">
				        	alert("Password ไม่ตรงกัน");
				            window.open("<?echo site_url('user/create');?>","_self");            
				        </script>
				    <?
			}
		}
		$id=$this->uri->segment(3,'');
		$user=$this->m_admin->get_admin_by_id($id);
		$data['page'] = 'user';
		if (isset($user->firstname)) {
			$data['user']=$user;
			$data['edit']=true;
		}
		$this->load->view('header',$data);
		$this->load->view('create_user',$data);
	}
}
