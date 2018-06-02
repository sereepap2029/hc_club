<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function __construct() {
        parent::__construct();      
        $this->load->model('m_admin');
        $this->load->model('m_section4');  
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
	public function section4()
	{
		$data['page'] = 'user';
		$page=(int)$this->uri->segment(3,"1");
		$offset=($page-1)*12;
		$data['user_list'] = $this->m_section4->get_all_template_section4($offset,12);
		$rowcount=$this->m_section4->count_all();
		$pagecount=($rowcount/12);
		if (($rowcount%12!=0)) {
			$pagecount+1;
		}
		$data['pagecount']=$pagecount;
		$data['pagenum']=$page;
		$this->load->view('header',$data);
		$this->load->view('section4',$data);
		$this->load->view('footer',$data);
	}
	public function delete_section4()
	{
		$id=$this->uri->segment(3,'');
		$this->m_section4->delete_template_section4($id);
		?>
				        <script type="text/javascript">
				        	alert("ลบข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('template/section4');?>","_self");            
				        </script>
				    <?
	}
	public function create_section4()
	{
		if (isset($_POST['name'])&&!isset($_POST['edit'])&&$_POST['name']!="") {
				$id=$this->m_section4->generate_id();
				$data_ins = array(
					'id' => $id,
					'name' => $_POST['name'],
					'description' => $_POST['description'],
				 );
				$this->m_section4->add_template_section4($data_ins);
				?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('template/section4');?>","_self");            
				        </script>
				    <?

		}
		if (isset($_POST['name'])&&isset($_POST['edit'])) {
				$id=$_POST['edit'];
				$data_up = array(
					'name' => $_POST['name'],
					'description' => $_POST['description'],
				 );
					$this->m_section4->update_template_section4($data_up,$id);
					?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('template/section4');?>","_self");            
				        </script>
				    <?
		}
		$id=$this->uri->segment(3,'');
		$section4=$this->m_section4->get_template_section4_by_id($id);
		$data['page'] = 'section4';
		if (isset($section4->id)) {
			$data['section4']=$section4;
			$data['edit']=true;
		}
		$this->load->view('header',$data);
		$this->load->view('create_section4',$data);
		$this->load->view('footer',$data);
	}
}
