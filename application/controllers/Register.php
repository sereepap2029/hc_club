<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
        parent::__construct();      
        $this->load->model('m_member');
        $this->load->model('m_member_item');  
    }
	public function index()
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
	      </script>
	      <?
	    }
		if (isset($_POST['name'])&&!isset($_POST['edit'])&&$_POST['username']!=""&&$check_captcha) {
			if ($_POST['password']==$_POST['con_password']&&$_POST['password']!="") {
				$member_id=$this->m_member->generate_id();
				$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$data_ins = array(
					'id' => $member_id,
					'prefix' => $_POST['prefix'],
					'firstname' => $_POST['name'],
					'lastname' => $_POST['surname'],
					'username' => $_POST['username'],
					'password' => $hashed_password,
					'email' => $_POST['email'],
					'phone' => $_POST['phone'],
					'sex' => $_POST['sex'],
					'bank_name' => $_POST['bank_name'],
					'bank_acc' => $_POST['bank_acc'],
					'sex' => $_POST['sex'],
					'bank_organization' => $_POST['bank_organization'],
					'referrer_id' => $_POST['referrer_id'],
					'ref_id' => $this->m_member->generate_ref_id()['id'],
				 );
				if ($this->m_member->check_dup_username($_POST['username'])) {
					$this->m_member->add_member($data_ins);

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
				            window.open("<?echo site_url('register');?>","_self");            
				        </script>
				    <?
				}else{
					?>
				        <script type="text/javascript">
				        	alert("Username ซ้ำในระบบ");
				            window.open("<?echo site_url('register');?>","_self");            
				        </script>
				    <?     
				}
			}else{
				?>
				        <script type="text/javascript">
				        	alert("Password ไม่ตรงกัน");
				            window.open("<?echo site_url('register');?>","_self");            
				        </script>
				    <?
			}
			

		}
		
		$id=$this->uri->segment(3,'');
		$user=$this->m_member->get_member_by_id($id);
		$data['page'] = 'user';
		$data['action_url'] = site_url("register");
		if (isset($user->firstname)) {
			$data['user']=$user;
			$data['edit']=true;
		}
		$this->load->view('anno_header',$data);
		$this->load->view('create_member',$data);
		$this->load->view('footer',$data);
	}
}
