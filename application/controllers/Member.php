<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class member extends CI_Controller {

	public function __construct() {
        parent::__construct();      
        $this->load->model('m_member');
        $this->load->model('m_admin');
        $this->load->model('m_member_item');  
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
		$data['user_list'] = $this->m_member->get_all_member($offset,12);
		$rowcount=$this->m_member->count_all();
		$pagecount=($rowcount/12);
		if (($rowcount%12!=0)) {
			$pagecount+1;
		}
		$data['pagecount']=$pagecount;
		$data['pagenum']=$page;
		$this->load->view('header',$data);
		$this->load->view('member_list',$data);
		$this->load->view('footer',$data);
	}
	public function read_item()
	{
		$member_id=$this->uri->segment(3,"");
		$data['pic_list']=$this->m_member_item->get_all_member_item($member_id);
		$this->load->view('fancy_box/header',$data);
		$this->load->view('fancy_box/read_member_item',$data);
		$this->load->view('footer',$data);

	}
	public function delete()
	{
		if ($this->session->userdata('id')) {
            $user_data = $this->m_admin->get_admin_by_id($this->session->userdata('id'));
            if (isset($user_data->username)&&isset($user_data->perm['account'])&&isset($user_data->perm['delete'])) {
                $this->user_data = $user_data;
            }
            else {
                redirect('main/logout');
            }
        }
        else {
            redirect('main/logout');
        }
		$id=$this->uri->segment(3,'');
		$this->m_member->delete_member($id);
		?>
				        <script type="text/javascript">
				        	alert("ลบข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('member');?>","_self");            
				        </script>
				    <?
	}
	public function create()
	{
		$check_captcha=false;
	    if (isset($_POST['g-recaptcha-response'])&&$_POST['g-recaptcha-response']!="") {
	      $url = 'https://www.google.com/recaptcha/api/siteverify';
	      $myvars = 'response=' . $_POST['g-recaptcha-response'].'&secret=6LctyzgUAAAAALOH9mJdLj0OELnfRteXZX2s28JW';

	      $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LctyzgUAAAAALOH9mJdLj0OELnfRteXZX2s28JW&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	      $obj = json_decode($response);
	      if($obj->success == true)
	      {
	          $check_captcha=true;
	      }
	      else
	      {
	          ?>
	          <script type="text/javascript">
	            alert("กรุณา ไส่ Captcha");
	          </script>
	          <?
	      }
	    }else if (isset($_POST['name'])) {
	      ?>
	      <script type="text/javascript">
	        alert("กรุณา ไส่ Captcha");
	        window.open("<?echo site_url('member/create/'.$_POST['edit']);?>","_self");
	      </script>
	      <?
	    }
		
		if (isset($_POST['name'])&&isset($_POST['edit'])&&$check_captcha) {
			$id=$_POST['edit'];
			$member_id=$_POST['edit'];
				
				$data_up = array(
					'prefix' => $_POST['prefix'],
					'firstname' => $_POST['name'],
					'lastname' => $_POST['surname'],
					'email' => $_POST['email'],
					'phone' => $_POST['phone'],
					'sex' => $_POST['sex'],
					'bank_name' => $_POST['bank_name'],
					'bank_acc' => $_POST['bank_acc'],
					'sex' => $_POST['sex'],
					'bank_organization' => $_POST['bank_organization'],
					'referrer_id' => $_POST['referrer_id'],
				 );
					
					
			if ($_POST['password']==$_POST['con_password']&&$_POST['password']!="") {
				$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$data_up['password']=$hashed_password;
			}else{
				?>
				        <script type="text/javascript">
				        	alert("Password ไม่ตรงกันไม่สามารถเปลี่ยน password ได้");           
				        </script>
				    <?
			}
			$this->m_member->update_member($data_up,$id);

			if (isset($_POST['del_pic'])) {
				foreach ($_POST['del_pic'] as $key => $value) {
					$this->m_member_item->delete($value);
				}
			}
			if (isset($_POST['pic_detail'])) {
	            $sort_order=0;
	            foreach ($_POST['pic_detail'] as $key => $value) {
	                $sort_order+=1;
	                    $pos = strpos($value, "old_file_picture__");
	                    if ($pos === false) {
	                        //echo "in here 1 ";
	                        $item_id=$this->m_member_item->generate_id();
	                        $ext=explode(".", $value);
	                        $new_ext=$ext[count($ext)-1];
	                        $new_filename=$member_id."_".$item_id."_".$ext[0].".".$new_ext;
	                        $file = './media/temp/'.$value;
	                        $newfile = './media/member_item/'.$new_filename;
	                        if (!is_dir('./media/member_item/')) {
	                                mkdir('./media/member_item/');
	                            }
	                        $item_data = array(
	                        'id' => $item_id, 
	                        'sort_order' => $sort_order, 
	                        'filepath' => $new_filename, 
	                        'member_id' => $member_id, 
	                        );
	                        if (!copy($file, $newfile)) {
	                            echo "failed to copy $file...\n".$file." to ".$newfile;
	                            @unlink("./media/temp/".$value);
	                            @unlink("./media/temp/thumbnail/".$value);
	                        }else{
	                            $this->m_member_item->add_member_item($item_data);
	                            @unlink("./media/temp/".$value);
	                            @unlink("./media/temp/thumbnail/".$value);                            
	                        }
	                      }else{
	                        $id=explode("__", $value);
	                        //echo "in here";
	                        $item_id=$id[1];
	                        $item_data = array(
	                            'sort_order' => $sort_order, 
	                        );
	                        $this->m_member_item->update_member_item($item_data,$item_id);
	                      }                
	                
	            }
	        }
	        $files_del = glob('./media/temp/*'); // get all file names
	                            foreach($files_del as $file){ // iterate files
	                              if(is_file($file)){
	                                @unlink($file); // delete file
	                                }
	                            }
	        $files_del = glob('./media/temp/thumbnail/*'); // get all file names
	                            foreach($files_del as $file){ // iterate files
	                              if(is_file($file)){
	                                @unlink($file); // delete file
	                                }
	                            }
                    ?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('member');?>","_self");            
				        </script>
				    <?
		}
		$id=$this->uri->segment(3,'');
		$user=$this->m_member->get_member_by_id($id);
		$data['page'] = 'user';
		$data['action_url'] = site_url("member/create");
		if (isset($user->firstname)) {
			$data['user']=$user;
			$data['edit']=true;
		}else{
			?>
				        <script type="text/javascript">
				        	alert("ไม่พบข้อมูล");
				            window.open("<?echo site_url('member');?>","_self");            
				        </script>
				    <?
		}
		$this->load->view('header',$data);
		$this->load->view('create_member',$data);
		$this->load->view('footer',$data);
	}
}
