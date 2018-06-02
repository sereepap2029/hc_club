<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_config extends CI_Controller {

	public function __construct() {
        parent::__construct();      
        $this->load->model('m_admin');
        $this->load->model('m_stringlib');
        $this->load->model('m_office_config');  
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
		if (isset($_POST['name'])) {
			$this->m_office_config->delete_office_config();
				$data_up = array(
					'name' => $_POST['name'],
					'home_num' => $_POST['home_num'],
					'moo' => $_POST['moo'],
					'road' => $_POST['road'],
					'soi' => $_POST['soi'],
					'tum' => $_POST['tum'],
					'aum' => $_POST['aum'],
					'witness1' => $_POST['witness1'],
					'witness2' => $_POST['witness2'],
					'witness3' => $_POST['witness3'],
					'witness4' => $_POST['witness4'],
				 );
					$this->m_office_config->add_office_config($data_up);
					?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('office_config');?>","_self");            
				        </script>
				    <?
		}
		$office=$this->m_office_config->get_office_config();
		$data['page'] = 'office';
		if (isset($office->id)) {
			$data['office']=$office;
			$data['edit']=true;
		}
		$this->load->view('header',$data);
		$this->load->view('office_config',$data);
		$this->load->view('footer',$data);
	}
}
