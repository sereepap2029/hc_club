<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
        parent::__construct();   
        $this->load->model('m_admin');
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
