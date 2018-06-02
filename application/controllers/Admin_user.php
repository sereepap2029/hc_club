<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user extends CI_Controller {

	public function __construct() {
        parent::__construct();      
        $this->load->model('m_admin');
        $this->load->model('m_admin_item');  
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
		$this->load->view('footer',$data);
	}
	public function read_item()
	{
		$admin_id=$this->uri->segment(3,"");
		$data['pic_list']=$this->m_admin_item->get_all_admin_item($admin_id);
		$this->load->view('fancy_box/header',$data);
		$this->load->view('fancy_box/read_admin_item',$data);
		$this->load->view('footer',$data);

	}
	public function delete()
	{
		$id=$this->uri->segment(3,'');
		$this->m_admin->delete_admin($id);
		?>
				        <script type="text/javascript">
				        	alert("ลบข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('admin_user');?>","_self");            
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
		if (isset($_POST['name'])&&!isset($_POST['edit'])&&$_POST['username']!="") {
			if ($_POST['password']==$_POST['con_password']) {
				$admin_id=$this->m_admin->generate_id();
				$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$data_ins = array(
					'id' => $admin_id,
					'prefix' => $_POST['prefix'],
					'firstname' => $_POST['name'],
					'lastname' => $_POST['surname'],
					'username' => $_POST['username'],
					'password' => $hashed_password,
					'email' => $_POST['email'],
				 );
				if ($this->m_admin->check_dup_username($_POST['username'])) {
					$this->m_admin->add_admin($data_ins);

						if (isset($_POST['pic_detail'])) {
				            $sort_order=0;
				            foreach ($_POST['pic_detail'] as $key => $value) {
				                $sort_order+=1;
				                    $pos = strpos($value, "old_file_picture__");
				                    if ($pos === false) {
				                        //echo "in here 1 ";
				                        $item_id=$this->m_admin_item->generate_id();
				                        $ext=explode(".", $value);
				                        $new_ext=$ext[count($ext)-1];
				                        $new_filename=$admin_id."_".$item_id."_".$ext[0].".".$new_ext;
				                        $file = './media/temp/'.$value;
				                        $newfile = './media/admin_item/'.$new_filename;
				                        if (!is_dir('./media/admin_item/')) {
				                                mkdir('./media/admin_item/');
				                            }
				                        $item_data = array(
				                        'id' => $item_id, 
				                        'sort_order' => $sort_order, 
				                        'filepath' => $new_filename, 
				                        'admin_id' => $admin_id, 
				                        );
				                        if (!copy($file, $newfile)) {
				                            echo "failed to copy $file...\n".$file." to ".$newfile;
				                            @unlink("./media/temp/".$value);
				                            @unlink("./media/temp/thumbnail/".$value);
				                        }else{
				                            $this->m_admin_item->add_admin_item($item_data);
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
				                        $this->m_admin_item->update_admin_item($item_data,$item_id);
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
				            window.open("<?echo site_url('admin_user');?>","_self");            
				        </script>
				    <?
				}else{
					?>
				        <script type="text/javascript">
				        	alert("Username ซ้ำในระบบ");
				            window.open("<?echo site_url('admin_user/create');?>","_self");            
				        </script>
				    <?     
				}
			}else{
				?>
				        <script type="text/javascript">
				        	alert("Password ไม่ตรงกัน");
				            window.open("<?echo site_url('admin_user/create');?>","_self");            
				        </script>
				    <?
			}
			

		}





		if (isset($_POST['name'])&&isset($_POST['edit'])) {
			$id=$_POST['edit'];
			$admin_id=$_POST['edit'];
				
				$data_up = array(
					'prefix' => $_POST['prefix'],
					'firstname' => $_POST['name'],
					'lastname' => $_POST['surname'],
					'email' => $_POST['email'],
				 );
					
					
			if ($_POST['password']==$_POST['con_password']) {
				$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$data_up['password']=$hashed_password;
			}else{
				?>
				        <script type="text/javascript">
				        	alert("Password ไม่ตรงกันไม่สามารถเปลี่ยน password ได้");           
				        </script>
				    <?
			}
			$this->m_admin->update_admin($data_up,$id);

			if (isset($_POST['del_pic'])) {
				foreach ($_POST['del_pic'] as $key => $value) {
					$this->m_admin_item->delete($value);
				}
			}
			if (isset($_POST['pic_detail'])) {
	            $sort_order=0;
	            foreach ($_POST['pic_detail'] as $key => $value) {
	                $sort_order+=1;
	                    $pos = strpos($value, "old_file_picture__");
	                    if ($pos === false) {
	                        //echo "in here 1 ";
	                        $item_id=$this->m_admin_item->generate_id();
	                        $ext=explode(".", $value);
	                        $new_ext=$ext[count($ext)-1];
	                        $new_filename=$admin_id."_".$item_id."_".$ext[0].".".$new_ext;
	                        $file = './media/temp/'.$value;
	                        $newfile = './media/admin_item/'.$new_filename;
	                        if (!is_dir('./media/admin_item/')) {
	                                mkdir('./media/admin_item/');
	                            }
	                        $item_data = array(
	                        'id' => $item_id, 
	                        'sort_order' => $sort_order, 
	                        'filepath' => $new_filename, 
	                        'admin_id' => $admin_id, 
	                        );
	                        if (!copy($file, $newfile)) {
	                            echo "failed to copy $file...\n".$file." to ".$newfile;
	                            @unlink("./media/temp/".$value);
	                            @unlink("./media/temp/thumbnail/".$value);
	                        }else{
	                            $this->m_admin_item->add_admin_item($item_data);
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
	                        $this->m_admin_item->update_admin_item($item_data,$item_id);
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
				            window.open("<?echo site_url('admin_user');?>","_self");            
				        </script>
				    <?
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
		$this->load->view('footer',$data);
	}
}
