<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lawyer extends CI_Controller {

	public function __construct() {
        parent::__construct();      
        $this->load->model('m_admin');
        $this->load->model('m_lawyer');  
        if ($this->session->userdata('id')) {
            $user_data = $this->m_admin->get_admin_by_id($this->session->userdata('id'));
            if (isset($user_data->username)&&isset($user_data->perm['template'])) {
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
		$data['user_list'] = $this->m_lawyer->get_all_lawyer($offset,12);
		$rowcount=$this->m_lawyer->count_all();
		$pagecount=($rowcount/12);
		if (($rowcount%12!=0)) {
			$pagecount+1;
		}
		$data['pagecount']=$pagecount;
		$data['pagenum']=$page;
		$this->load->view('header',$data);
		$this->load->view('lawyer_list',$data);
		$this->load->view('footer',$data);
	}
	public function delete()
	{
		$id=$this->uri->segment(3,'');
		$this->m_lawyer->delete_lawyer($id);
		?>
				        <script type="text/javascript">
				        	alert("ลบข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('lawyer');?>","_self");            
				        </script>
				    <?
	}
	public function create()
	{
		if (isset($_POST['name'])&&!isset($_POST['edit'])&&$_POST['name']!="") {
				$id=$this->m_lawyer->generate_id();
				$data_ins = array(
					'id' => $id,
					'name' => $_POST['name'],
					'prefix' => $_POST['prefix'],
					'lastname' => $_POST['lastname'],
					'email' => $_POST['email'],
					'phone' => $_POST['phone'],
					'rank' => $_POST['rank'],
					'licence' => $_POST['licence'],
				 );
				$this->m_lawyer->add_lawyer($data_ins);
				?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('lawyer');?>","_self");            
				        </script>
				    <?

		}
		if (isset($_POST['name'])&&isset($_POST['edit'])) {
				$id=$_POST['edit'];
				$data_up = array(
					'name' => $_POST['name'],
					'prefix' => $_POST['prefix'],
					'lastname' => $_POST['lastname'],
					'email' => $_POST['email'],
					'phone' => $_POST['phone'],
					'rank' => $_POST['rank'],
					'licence' => $_POST['licence'],
				 );
					$this->m_lawyer->update_lawyer($data_up,$id);
					?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('lawyer');?>","_self");            
				        </script>
				    <?
		}
		$id=$this->uri->segment(3,'');
		$lawyer=$this->m_lawyer->get_lawyer_by_id($id);
		$data['page'] = 'lawyer';
		if (isset($lawyer->id)) {
			$data['lawyer']=$lawyer;
			$data['edit']=true;
		}
		$this->load->view('header',$data);
		$this->load->view('create_lawyer',$data);
		$this->load->view('footer',$data);
	}
}
