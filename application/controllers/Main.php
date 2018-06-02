<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
        parent::__construct();   
        $this->load->model('m_admin');
        $this->load->model('m_aom');
        $this->load->model('m_bang');   
        $this->load->model('m_time');     
    }
	public function index()
	{
		$data['page'] = 'home';
		$this->load->view('login',$data);
	}
	public function hash_pass()
	{
		$hashed_password = password_hash($_GET['password'], PASSWORD_DEFAULT);
		var_dump($hashed_password);
	}
	public function dashboard()
	{
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
		$data['page'] = 'home';
		$this->load->view('header',$data);
		$this->load->view('dashboard',$data);
		$this->load->view('footer',$data);

	}
	public function aom()
	{
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
		$data['page'] = 'dashboard';
		$search_array= array();
		if (isset($_POST['stu_keyword'])) {
			if ($_POST['stu_keyword']!="") {
				$search_array['borrower']=$_POST['stu_keyword'];
				$search_array['defendant_num']=$_POST['stu_keyword'];
				$search_array['borrower_id']=$_POST['stu_keyword'];
				$search_array['black_case']=$_POST['stu_keyword'];
				$search_array['red_case']=$_POST['stu_keyword'];
				$search_array['date']=$this->m_time->datepicker_to_unix($_POST['stu_keyword']);
				$search_array['Judge_date']=$this->m_time->datepicker_to_unix($_POST['stu_keyword']);
			}
		}
		if (isset($_POST['start_date'])) {
			if ($_POST['start_date']!="") {
				$search_array['start_date']=$this->m_time->datepicker_to_unix($_POST['start_date']);
			}
		}
		if (isset($_POST['end_date'])) {
			if ($_POST['end_date']!="") {
				$search_array['end_date']=$this->m_time->datepicker_to_unix($_POST['end_date']);
			}
		}
		$page=(int)$this->uri->segment(3,"1");
		$offset=($page-1)*12;
		$data['aom_list']=$this->m_aom->get_all_aom($offset,12,"date","desc",$search_array);
		$rowcount=$this->m_aom->count_all();
		$pagecount=($rowcount/12);
		if (($rowcount%12!=0)) {
			$pagecount+1;
		}
		$data['pagecount']=$pagecount;
		$data['pagenum']=$page;


		$this->load->view('header',$data);
		$this->load->view('aomsin',$data);
		$this->load->view('footer',$data);

	}
	public function bang()
	{
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
		$data['page'] = 'dashboard';
		$search_array= array();
		if (isset($_POST['stu_keyword'])) {
			if ($_POST['stu_keyword']!="") {
				$search_array['borrower']=$_POST['stu_keyword'];
				$search_array['defendant_num']=$_POST['stu_keyword'];
				$search_array['borrower_id']=$_POST['stu_keyword'];
				$search_array['black_case']=$_POST['stu_keyword'];
				$search_array['red_case']=$_POST['stu_keyword'];
				$search_array['date']=$this->m_time->datepicker_to_unix($_POST['stu_keyword']);
				$search_array['Judge_date']=$this->m_time->datepicker_to_unix($_POST['stu_keyword']);
			}
		}
		if (isset($_POST['start_date'])) {
			if ($_POST['start_date']!="") {
				$search_array['start_date']=$this->m_time->datepicker_to_unix($_POST['start_date']);
			}
		}
		if (isset($_POST['end_date'])) {
			if ($_POST['end_date']!="") {
				$search_array['end_date']=$this->m_time->datepicker_to_unix($_POST['end_date']);
			}
		}
		$page=(int)$this->uri->segment(3,"1");
		$offset=($page-1)*12;
		$data['bang_list']=$this->m_bang->get_all_bang($offset,12,"date","desc",$search_array);
		$rowcount=$this->m_bang->count_all();
		$pagecount=($rowcount/12);
		if (($rowcount%12!=0)) {
			$pagecount+1;
		}
		$data['pagecount']=$pagecount;
		$data['pagenum']=$page;


		$this->load->view('header',$data);
		$this->load->view('bangkub',$data);
		$this->load->view('footer',$data);

	}
	public function login()
	{	
	$data['error_msg2']='Please login with your username and password';

	if(isset($_POST['username']))
		{
			$user_data=$this->m_admin->get_by_username_password($_POST['username'],$_POST['password']);
			//echo $_POST['login_name']." asdasd ".$_POST['password'];
			if (isset($user_data->username)) {
				$this->session->set_userdata('username', $user_data->username);
				$this->session->set_userdata('id', $user_data->id);
				redirect('main/dashboard');

			}else{			
				$this->load->view('login',$data);
				$this->session->sess_destroy();
			}			
		}else{
			$this->load->view('login',$data);
			$this->session->sess_destroy();
		}	
		
	}
	public function logout()
	{		
		$this->session->set_userdata('username', '');
		$this->session->set_userdata('id', '');
		$this->session->sess_destroy();
		redirect('main');
	}
}
