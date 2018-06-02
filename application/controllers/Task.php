<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

	public function __construct() {
        parent::__construct();      
        $this->load->model('m_admin');
        $this->load->model('m_task');
        $this->load->model('m_time');  
        if ($this->session->userdata('id')) {
            $user_data = $this->m_admin->get_admin_by_id($this->session->userdata('id'));
            if (isset($user_data->username)) {
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

		$data['my_task'] = $this->m_task->get_all_mytask($this->user_data->id,$offset,12);
		$rowcount=$this->m_task->count_all_mytask($this->user_data->id);
		$pagecount=($rowcount/12);
		if (($rowcount%12!=0)) {
			$pagecount+1;
		}
		$data['pagecount_mytask']=$pagecount;
		$data['pagenum_mytask']=$page;

		$data['my_ordertask'] = $this->m_task->get_all_ordertask($this->user_data->id,$offset,12);
		$rowcount=$this->m_task->count_all_ordertask($this->user_data->id);
		$pagecount=($rowcount/12);
		if (($rowcount%12!=0)) {
			$pagecount+1;
		}
		$data['pagecount_ordertask']=$pagecount;
		$data['pagenum_ordertask']=$page;

		$data['donetask'] = $this->m_task->get_all_donetask($this->user_data->id,$offset,12);
		$rowcount=$this->m_task->count_all_donetask($this->user_data->id);
		$pagecount=($rowcount/12);
		if (($rowcount%12!=0)) {
			$pagecount+1;
		}
		$data['pagecount_donetask']=$pagecount;
		$data['pagenum_donetask']=$page;

		$data['user_list'] = $this->m_admin->get_all_admin();
		foreach ($data['user_list'] as $key => $value) {
			$data['user_list'][$value->id]=$value;
		}

		$this->load->view('header',$data);
		$this->load->view('task_list',$data);
		$this->load->view('footer',$data);
	}
	public function delete()
	{
		if ($this->session->userdata('id')) {
            $user_data = $this->m_admin->get_admin_by_id($this->session->userdata('id'));
            if (isset($user_data->username)&&isset($user_data->perm['delete'])) {
                $this->user_data = $user_data;
                $id=$this->uri->segment(3,'');
				$this->m_task->delete_task($id);
				?>
				        <script type="text/javascript">
				        	alert("ลบข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('task');?>","_self");            
				        </script>
				    <?
            }
            else {
                redirect('main/logout');
            }
        }
        else {
            redirect('main/logout');
        }
		
	}
	public function create()
	{
		if (isset($_POST['name'])&&!isset($_POST['edit'])&&$_POST['name']!="") {
				$id=$this->m_task->generate_id();
				$data_ins = array(
					'id' => $id,
					'name' => $_POST['name'],
					'work' => $_POST['work'],
					'responsible' => $_POST['responsible'],
					'create_by' => $this->user_data->id,
					'date_create' => time(),
				 );
				$this->m_task->add_task($data_ins);
				?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('task');?>","_self");            
				        </script>
				    <?

		}
		$data['user_list'] = $this->m_admin->get_all_admin();
		$id=$this->uri->segment(3,'');
		$task=$this->m_task->get_task_by_id($id);
		$data['page'] = 'task';
		if (isset($task->id)) {
			$data['task']=$task;
			$data['edit']=true;
		}
		$this->load->view('header',$data);
		$this->load->view('create_task',$data);
		$this->load->view('footer',$data);
	}
	public function view()
	{
		if (isset($_POST['status'])&&$_POST['status']=='complete') {
				$data_ins['status']=$_POST['status'];
				$data_ins['finish_date']=time();
				$this->m_task->update_task($data_ins,$_POST['edit']);
				?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('task');?>","_self");            
				        </script>
				    <?
		}elseif(isset($_POST['edit'])){
			$data_ins['status']="active";
				$this->m_task->update_task($data_ins,$_POST['edit']);
				?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('task');?>","_self");            
				        </script>
				    <?
		}
		$data['user_list'] = $this->m_admin->get_all_admin();
		$id=$this->uri->segment(3,'');
		$task=$this->m_task->get_task_by_id($id);
		$data['comment']=$this->m_task->get_comment_by_task_id($id);
		$data['user_list'] = $this->m_admin->get_all_admin();
		foreach ($data['user_list'] as $key => $value) {
			$data['user_list'][$value->id]=$value;
		}
		$data['page'] = 'task';
		if (isset($task->id)) {
			$data['task']=$task;
			$data['edit']=true;
		}
		$this->load->view('header',$data);
		$this->load->view('view_task',$data);
		$this->load->view('footer',$data);
	}
	public function comment()
	{
		if (isset($_POST['com_box'])&&$_POST['com_box']!='') {
				$data_ins = array(
					'task_id' => $_POST['edit'],
					'des' => $_POST['com_box'],
					'user_id' => $this->user_data->id,
					'date_create' => time(),
				 );
				$this->m_task->add_comment($data_ins);
				?>
				        <script type="text/javascript">
				            window.open("<?echo site_url('task/view/'.$_POST['edit']);?>","_self");            
				        </script>
				    <?
		}
	}
}
