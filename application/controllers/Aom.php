<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aom extends CI_Controller {

	public function __construct() {
        parent::__construct();   
        $this->load->model('m_admin');   
        $this->load->model('m_aom');
        $this->load->model('m_aom_item'); 
        $this->load->model('m_time');
        $this->load->model('m_stringlib');   
        $this->load->model('m_section4');
        $this->load->model('m_lawyer');
        if ($this->session->userdata('id')) {
            $user_data = $this->m_admin->get_admin_by_id($this->session->userdata('id'));
            if (isset($user_data->username)&&isset($user_data->perm['data'])) {
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
	}
	public function read_item()
	{
		$aom_id=$this->uri->segment(3,"");
		$data['pic_list']=$this->m_aom_item->get_all_aom_item($aom_id);
		$this->load->view('fancy_box/header',$data);
		$this->load->view('fancy_box/read_aom_item',$data);
		$this->load->view('footer',$data);

	}
	public function read_log()
	{
		$aom_id=$this->uri->segment(3,"");
		$data['log_list']=$this->m_aom->get_all_log($aom_id);
		$this->load->view('fancy_box/header',$data);
		$this->load->view('fancy_box/read_aom_log',$data);
		$this->load->view('footer',$data);

	}
	public function delete()
	{
		if ($this->session->userdata('id')) {
            $user_data = $this->m_admin->get_admin_by_id($this->session->userdata('id'));
            if (isset($user_data->username)&&isset($user_data->perm['delete'])) {
                $this->user_data = $user_data;
                $aom_id=$this->uri->segment(3,"");
				$this->m_aom->delete_aom($aom_id);
				redirect("main/aom");
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
		$aom_id=$this->uri->segment(3,"");
		$aom=$this->m_aom->get_aom_by_id($aom_id);
		$data['page'] = 'create';
		$data['section4'] = $this->m_section4->get_all_template_section4();
		$data['lawyer'] = $this->m_lawyer->get_all_lawyer();
		if (isset($aom->id)) {
			$data['dat']=$aom;
			$data['edit']=$aom->id;
		}
		
		if (isset($_POST['acc_no'])&&!isset($_POST['edit'])) {
			$aom_id=$this->m_aom->generate_id();

			$data_ins = array(
				'id' => $aom_id,
				'group_number' => $_POST['group_number'],
				'group_name' => $_POST['group_name'],
				'date' => $this->m_time->datepicker_to_unix($_POST['date']),
				'mail_date' => $this->m_time->datepicker_to_unix($_POST['mail_date']), 
				'acc_no' => $_POST['acc_no'],
				'cort' => $_POST['cort'],
				'principle' => $_POST['principle'],
				'interest' => $_POST['interest'],
				'interest_pk' => $_POST['interest_pk'],
				'fire_warrant' => $_POST['fire_warrant'],
				'borrower' => $_POST['borrower'],
				'borrower_id' => $_POST['borrower_id'],
				'black_case' => $_POST['black_case'],
				'red_case' => $_POST['red_case'],
				'branch' => $_POST['branch'],
				'insurance' => $_POST['insurance'],
				'defendant_num' => $_POST['defendant_num'],
				'sue_date' => $this->m_time->datepicker_to_unix($_POST['sue_date']),
				'sue_date_limit' => $this->m_time->datepicker_to_unix($_POST['sue_date_limit']),
				'consider_date' => $this->m_time->datepicker_to_unix($_POST['consider_date']),
				'Judge_date' => $this->m_time->datepicker_to_unix($_POST['Judge_date']),
				'appeal_date' => $this->m_time->datepicker_to_unix($_POST['appeal_date']),
				'unappeal_date' => $this->m_time->datepicker_to_unix($_POST['unappeal_date']),
				'appeal_type_date' => $this->m_time->datepicker_to_unix($_POST['appeal_type_date']),
				'statement_officer' => $_POST['statement_officer'],
				'court_order_date' => $this->m_time->datepicker_to_unix($_POST['court_order_date']),
				'court_order_note' => $_POST['court_order_note'],
				'warrant_mark_date' => $this->m_time->datepicker_to_unix($_POST['warrant_mark_date']),
				'court_cost' => $_POST['court_cost'],
				'court_cost_date' => $this->m_time->datepicker_to_unix($_POST['court_cost_date']),
				'property' => $_POST['property'],
				'sequester_date' => $this->m_time->datepicker_to_unix($_POST['sequester_date']),
				'seize_date' => $this->m_time->datepicker_to_unix($_POST['seize_date']),
				'sequester_property' => $_POST['sequester_property'],
				'sold_estimate' => $_POST['sold_estimate'],
				'monthly_pay' => $_POST['monthly_pay'],
				'pay_time' => $_POST['pay_time'],
				'start_pay_year' => $_POST['start_pay_year'],
				'start_pay_month' => $_POST['start_pay_month'],
				'end_pay_date' => $this->m_time->datepicker_to_unix($_POST['end_pay_date']),
				'borrow_date' => $this->m_time->datepicker_to_unix($_POST['borrow_date']),
				'types_of_credits' => $_POST['types_of_credits'],
				'loan' => $_POST['loan'],
				'interest_when_borrow' => $_POST['interest_when_borrow'],
				'interest_when_sue' => $_POST['interest_when_sue'],
				'section4_template' => $_POST['section4_template'],
				'section4_description' => $_POST['section4_description'],
				'heritage' => $_POST['heritage'],
				'heritage_relate' => $_POST['relate'],
				'responsible_lawyer' => $_POST['responsible_lawyer'],
				'sold_note' => $_POST['sold_note'],
				'consider_note' => $_POST['consider_note'],
			);
			if (isset($_POST['judge'])) {
				$data_ins['judge']=$_POST['judge'];
			}
			if (isset($_POST['appeal_type'])) {
				$data_ins['appeal_type']=$_POST['appeal_type'];
			}
			if (isset($_POST['bank_statement'])) {
				$data_ins['bank_statement']=$_POST['bank_statement'];
			}else{
				$data_ins['bank_statement']="n";
			}
			if (isset($_POST['we_statement'])) {
				$data_ins['we_statement']=$_POST['we_statement'];
			}else{
				$data_ins['we_statement']="n";
			}
			if (isset($_POST['court_order'])) {
				$data_ins['court_order']=$_POST['court_order'];
			}else{
				$data_ins['court_order']="n";
			}
			if (isset($_POST['warrant_mark'])) {
				$data_ins['warrant_mark']=$_POST['warrant_mark'];
			}else{
				$data_ins['warrant_mark']="n";
			}
			if (isset($_POST['finish'])) {
				$data_ins['finish']=$_POST['finish'];
			}else{
				$data_ins['finish']="n";
			}
			if (isset($_POST['borrower_dead'])) {
				$data_ins['borrower_dead']=$_POST['borrower_dead'];
			}else{
				$data_ins['borrower_dead']="n";
			}
			if (isset($_POST['borrower_mail_1'])) {
				$data_ins['borrower_mail_1']=$_POST['borrower_mail_1'];
			}else{
				$data_ins['borrower_mail_1']="z";
			}
			if (isset($_POST['borrower_mail_2'])) {
				$data_ins['borrower_mail_2']=$_POST['borrower_mail_2'];
			}else{
				$data_ins['borrower_mail_2']="z";
			}
			if (isset($_POST['borrower_mail_3'])) {
				$data_ins['borrower_mail_3']=$_POST['borrower_mail_3'];
			}else{
				$data_ins['borrower_mail_3']="z";
			}
			$this->m_aom->add_aom($data_ins);
			$data_logs = array(
				'aom_id' => $aom_id, 
				'description' => $_POST['aom_log'],  
				'time' => time(),
				'user' => $this->user_data->id,
				);
			$this->m_aom->add_aom_log($data_logs);

			if (isset($_POST['guarantee'])) {
				$sort_order=1;
				foreach ($_POST['guarantee'] as $key => $value) {
					$guarantee = array(
						'id' => $this->m_aom->generate_id_guarantee(),
						'aom_id' => $aom_id, 
						'guarantee' => $_POST['guarantee'][$key],
						'guarantee_id' => $_POST['guarantee_id'][$key],
						'guarantee_home_num' => $_POST['guarantee_home_num'][$key],
						'guarantee_moo' => $_POST['guarantee_moo'][$key],
						'guarantee_road' => $_POST['guarantee_road'][$key],
						'guarantee_soi' => $_POST['guarantee_soi'][$key],
						'guarantee_tum' => $_POST['guarantee_tum'][$key],
						'guarantee_aum' => $_POST['guarantee_aum'][$key],
						'guarantee_province' => $_POST['guarantee_province'][$key],
						'sort_order' => $sort_order,
					);
					if (isset($_POST['guarantee_mail_1'][$key])) {
						$guarantee['guarantee_mail_1']=$_POST['guarantee_mail_1'][$key];
					}else{
						$guarantee['guarantee_mail_1']="n";
					}
					if (isset($_POST['guarantee_mail_2'][$key])) {
						$guarantee['guarantee_mail_2']=$_POST['guarantee_mail_2'][$key];
					}else{
						$guarantee['guarantee_mail_2']="n";
					}
					if (isset($_POST['guarantee_mail_3'][$key])) {
						$guarantee['guarantee_mail_3']=$_POST['guarantee_mail_3'][$key];
					}else{
						$guarantee['guarantee_mail_3']="n";
					}
					if (isset($_POST['guarantee_mail'][$key])) {
						$guarantee['guarantee_mail']=$_POST['guarantee_mail'][$key];
					}else{
						$guarantee['guarantee_mail']="n";
					}
					$this->m_aom->add_guarantee($guarantee);
					$sort_order+=1;
				}
			}

			if (isset($_POST['extend_appeal_date'])) {
				$sort_order=1;
				foreach ($_POST['extend_appeal_date'] as $key => $value) {
					$appeal = array(
						'id' => $this->m_aom->generate_id_appeal(),
						'aom_id' => $aom_id, 
						'extend_appeal_note' => $_POST['extend_appeal_note'][$key],
						'extend_appeal_date' => $this->m_time->datepicker_to_unix($_POST['extend_appeal_date'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_aom->add_appeal($appeal);
					$sort_order+=1;
				}
			}
			if (isset($_POST['borrow_date_i'])) {
				$sort_order=1;
				foreach ($_POST['borrow_date_i'] as $key => $value) {
					$appeal = array(
						'id' => $this->m_aom->generate_id_borrow(),
						'aom_id' => $aom_id, 
						'types_of_credits' => $_POST['types_of_credits_i'][$key],
						'loan' => $_POST['loan_i'][$key],
						'interest_when_borrow' => $_POST['interest_when_borrow_i'][$key],
						'interest_when_sue' => $_POST['interest_when_sue_i'][$key],
						'borrow_date' => $this->m_time->datepicker_to_unix($_POST['borrow_date_i'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_aom->add_borrow($appeal);
					$sort_order+=1;
				}
			}

			if (isset($_POST['withdraw_number'])) {
				$sort_order=1;
				foreach ($_POST['withdraw_number'] as $key => $value) {
					$withdraw = array(
						'id' => $key,
						'aom_id' => $aom_id, 
						'sort_order' => $sort_order,
					);
					
					$this->m_aom->add_withdraw($withdraw);
					$sort_order+=1;
				}
			}
			if (isset($_POST['withdraw_detail'])) {
				$sort_order=1;
				foreach ($_POST['withdraw_detail'] as $key => $value) {
					$withdraw_detail = array(
						'id' => $key,
						'aom_id' => $aom_id, 
						'sort_order' => $sort_order,
						"withdraw_id" => $_POST['withdraw_id'][$key],
						"withdraw_detail" => $_POST['withdraw_detail'][$key],
						"price" => $_POST['price'][$key],
					);
					
					$this->m_aom->add_withdraw_detail($withdraw_detail);
					$sort_order+=1;
				}
			}

			if (isset($_POST['sold_date'])) {
				$sort_order=1;
				foreach ($_POST['sold_date'] as $key => $value) {
					$sold = array(
						'id' => $key,
						'aom_id' => $aom_id, 
						'sort_order' => $sort_order,
						"sold_date" => $this->m_time->datepicker_to_unix($_POST['sold_date'][$key]),
						"price_sold" => $_POST['price_sold'][$key],
					);
					if (isset($_POST['sold'][$key])) {
						$sold['sold']=$_POST['sold'][$key];
					}else{
						$sold['sold']="n";
					}
					$this->m_aom->add_sold($sold);
					$sort_order+=1;
				}
			}
			$this->m_aom->delete_consider_by_aom_id($aom_id);
			if (isset($_POST['consider_date_ex'])) {
				$sort_order=0;
				foreach ($_POST['consider_date_ex'] as $key => $value) {
					$appeal = array(
						'aom_id' => $aom_id, 
						'consider_note' => $_POST['consider_note_ex'][$key],
						'consider_date' => $this->m_time->datepicker_to_unix($_POST['consider_date_ex'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_aom->add_consider($appeal);
					$sort_order+=1;
				}
			}

			if (isset($_POST['pic_detail'])) {
            $sort_order=0;
            foreach ($_POST['pic_detail'] as $key => $value) {
                $sort_order+=1;
                    $pos = strpos($value, "old_file_picture__");
                    if ($pos === false) {
                        //echo "in here 1 ";
                        $item_id=$this->m_aom_item->generate_id();
                        $ext=explode(".", $value);
                        $new_ext=$ext[count($ext)-1];
                        $new_filename=$aom_id."_".$item_id."_".$ext[0].".".$new_ext;
                        $file = './media/temp/'.$value;
                        $newfile = './media/aom_item/'.$new_filename;
                        if (!is_dir('./media/aom_item/')) {
                                mkdir('./media/aom_item/');
                            }
                        $item_data = array(
                        'id' => $item_id, 
                        'sort_order' => $sort_order, 
                        'filepath' => $new_filename, 
                        'aom_id' => $aom_id, 
                        );
                        if (!copy($file, $newfile)) {
                            echo "failed to copy $file...\n".$file." to ".$newfile;
                            @unlink("./media/temp/".$value);
                            @unlink("./media/temp/thumbnail/".$value);
                        }else{
                            $this->m_aom_item->add_aom_item($item_data);
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
                        $this->m_aom_item->update_aom_item($item_data,$item_id);
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
			
			//print_r($_POST);
			redirect("main/aom/1");

		//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	

		}else if (isset($_POST['acc_no'])&&isset($_POST['edit'])) {
			$aom_id=$_POST['edit'];

			$data_ins = array(
				'group_number' => $_POST['group_number'],
				'group_name' => $_POST['group_name'],
				'date' => $this->m_time->datepicker_to_unix($_POST['date']),
				'mail_date' => $this->m_time->datepicker_to_unix($_POST['mail_date']), 
				'acc_no' => $_POST['acc_no'],
				'cort' => $_POST['cort'],
				'principle' => $_POST['principle'],
				'interest' => $_POST['interest'],
				'interest_pk' => $_POST['interest_pk'],
				'fire_warrant' => $_POST['fire_warrant'],
				'borrower' => $_POST['borrower'],
				'borrower_id' => $_POST['borrower_id'],
				'black_case' => $_POST['black_case'],
				'red_case' => $_POST['red_case'],
				'branch' => $_POST['branch'],
				'insurance' => $_POST['insurance'],
				'defendant_num' => $_POST['defendant_num'],
				'sue_date' => $this->m_time->datepicker_to_unix($_POST['sue_date']),
				'sue_date_limit' => $this->m_time->datepicker_to_unix($_POST['sue_date_limit']),
				'consider_date' => $this->m_time->datepicker_to_unix($_POST['consider_date']),
				'Judge_date' => $this->m_time->datepicker_to_unix($_POST['Judge_date']),
				'appeal_date' => $this->m_time->datepicker_to_unix($_POST['appeal_date']),
				'unappeal_date' => $this->m_time->datepicker_to_unix($_POST['unappeal_date']),
				'appeal_type_date' => $this->m_time->datepicker_to_unix($_POST['appeal_type_date']),
				'statement_officer' => $_POST['statement_officer'],
				'court_order_note' => $_POST['court_order_note'],
				'court_order_date' => $this->m_time->datepicker_to_unix($_POST['court_order_date']),
				'warrant_mark_date' => $this->m_time->datepicker_to_unix($_POST['warrant_mark_date']),
				'court_cost' => $_POST['court_cost'],
				'court_cost_date' => $this->m_time->datepicker_to_unix($_POST['court_cost_date']),
				'property' => $_POST['property'],
				'sequester_date' => $this->m_time->datepicker_to_unix($_POST['sequester_date']),
				'seize_date' => $this->m_time->datepicker_to_unix($_POST['seize_date']),
				'sequester_property' => $_POST['sequester_property'],
				'sold_estimate' => $_POST['sold_estimate'],
				'monthly_pay' => $_POST['monthly_pay'],
				'pay_time' => $_POST['pay_time'],
				'start_pay_year' => $_POST['start_pay_year'],
				'start_pay_month' => $_POST['start_pay_month'],
				'end_pay_date' => $this->m_time->datepicker_to_unix($_POST['end_pay_date']),
				'borrow_date' => $this->m_time->datepicker_to_unix($_POST['borrow_date']),
				'types_of_credits' => $_POST['types_of_credits'],
				'loan' => $_POST['loan'],
				'interest_when_borrow' => $_POST['interest_when_borrow'],
				'interest_when_sue' => $_POST['interest_when_sue'],
				'section4_template' => $_POST['section4_template'],
				'section4_description' => $_POST['section4_description'],
				'heritage' => $_POST['heritage'],
				'heritage_relate' => $_POST['relate'],
				'responsible_lawyer' => $_POST['responsible_lawyer'],
				'sold_note' => $_POST['sold_note'],
				'consider_note' => $_POST['consider_note'],
			);
			if (isset($_POST['judge'])) {
				$data_ins['judge']=$_POST['judge'];
			}
			if (isset($_POST['appeal_type'])) {
				$data_ins['appeal_type']=$_POST['appeal_type'];
			}
			if (isset($_POST['bank_statement'])) {
				$data_ins['bank_statement']=$_POST['bank_statement'];
			}else{
				$data_ins['bank_statement']="n";
			}
			if (isset($_POST['we_statement'])) {
				$data_ins['we_statement']=$_POST['we_statement'];
			}else{
				$data_ins['we_statement']="n";
			}
			if (isset($_POST['court_order'])) {
				$data_ins['court_order']=$_POST['court_order'];
			}else{
				$data_ins['court_order']="n";
			}
			if (isset($_POST['warrant_mark'])) {
				$data_ins['warrant_mark']=$_POST['warrant_mark'];
			}else{
				$data_ins['warrant_mark']="n";
			}
			if (isset($_POST['finish'])) {
				$data_ins['finish']=$_POST['finish'];
			}else{
				$data_ins['finish']="n";
			}
			if (isset($_POST['borrower_dead'])) {
				$data_ins['borrower_dead']=$_POST['borrower_dead'];
			}else{
				$data_ins['borrower_dead']="n";
			}

			if (isset($_POST['borrower_mail_1'])) {
				$data_ins['borrower_mail_1']=$_POST['borrower_mail_1'];
			}else{
				$data_ins['borrower_mail_1']="z";
			}
			if (isset($_POST['borrower_mail_2'])) {
				$data_ins['borrower_mail_2']=$_POST['borrower_mail_2'];
			}else{
				$data_ins['borrower_mail_2']="z";
			}
			if (isset($_POST['borrower_mail_3'])) {
				$data_ins['borrower_mail_3']=$_POST['borrower_mail_3'];
			}else{
				$data_ins['borrower_mail_3']="z";
			}
			$this->m_aom->update_aom($data_ins,$aom_id);
			$data_logs = array(
				'aom_id' => $aom_id, 
				'description' => $_POST['aom_log'],  
				'time' => time(),
				'user' => $this->user_data->id,
				);
			$this->m_aom->add_aom_log($data_logs);
			// del region
			if (isset($_POST['del_guarantee'])) {
				foreach ($_POST['del_guarantee'] as $key => $value) {
					$this->m_aom->delete_guarantee($value);
				}
			}
			if (isset($_POST['del_appeal'])) {
				foreach ($_POST['del_appeal'] as $key => $value) {
					$this->m_aom->delete_appeal($value);
				}
			}
			if (isset($_POST['del_borrow'])) {
				foreach ($_POST['del_borrow'] as $key => $value) {
					$this->m_aom->delete_borrow($value);
				}
			}
			if (isset($_POST['del_withdraw_detail'])) {
				foreach ($_POST['del_withdraw_detail'] as $key => $value) {
					$this->m_aom->delete_withdraw_detail($value);
				}
			}
			if (isset($_POST['del_withdraw'])) {
				foreach ($_POST['del_withdraw'] as $key => $value) {
					$this->m_aom->delete_withdraw($value);
				}
			}
			if (isset($_POST['del_sold'])) {
				foreach ($_POST['del_sold'] as $key => $value) {
					$this->m_aom->delete_sold($value);
				}
			}
			if (isset($_POST['del_pic'])) {
				foreach ($_POST['del_pic'] as $key => $value) {
					$this->m_aom_item->delete_aom($value);
				}
			}

			$sort_order=1;
			if (isset($_POST['guarantee_old'])) {
				$sort_order=1;
				foreach ($_POST['guarantee_old'] as $key => $value) {
					$guarantee = array(
						'aom_id' => $aom_id, 
						'guarantee' => $_POST['guarantee_old'][$key],
						'guarantee_id' => $_POST['guarantee_id_old'][$key],
						'guarantee_home_num' => $_POST['guarantee_home_num_old'][$key],
						'guarantee_moo' => $_POST['guarantee_moo_old'][$key],
						'guarantee_road' => $_POST['guarantee_road_old'][$key],
						'guarantee_soi' => $_POST['guarantee_soi_old'][$key],
						'guarantee_tum' => $_POST['guarantee_tum_old'][$key],
						'guarantee_aum' => $_POST['guarantee_aum_old'][$key],
						'guarantee_province' => $_POST['guarantee_province_old'][$key],
						'sort_order' => $sort_order,
					);
					if (isset($_POST['guarantee_mail_1_old'][$key])) {
						$guarantee['guarantee_mail_1']=$_POST['guarantee_mail_1_old'][$key];
					}else{
						$guarantee['guarantee_mail_1']="n";
					}
					if (isset($_POST['guarantee_mail_2_old'][$key])) {
						$guarantee['guarantee_mail_2']=$_POST['guarantee_mail_2_old'][$key];
					}else{
						$guarantee['guarantee_mail_2']="n";
					}
					if (isset($_POST['guarantee_mail_3_old'][$key])) {
						$guarantee['guarantee_mail_3']=$_POST['guarantee_mail_3_old'][$key];
					}else{
						$guarantee['guarantee_mail_3']="n";
					}
					if (isset($_POST['guarantee_mail_old'][$key])) {
						$guarantee['guarantee_mail']=$_POST['guarantee_mail_old'][$key];
					}else{
						$guarantee['guarantee_mail']="n";
					}
					$this->m_aom->update_guarantee($guarantee,$key);
					$sort_order+=1;
				}
			}


			if (isset($_POST['guarantee'])) {
				foreach ($_POST['guarantee'] as $key => $value) {
					$guarantee = array(
						'id' => $this->m_aom->generate_id_guarantee(),
						'aom_id' => $aom_id, 
						'guarantee' => $_POST['guarantee'][$key],
						'guarantee_id' => $_POST['guarantee_id'][$key],
						'guarantee_home_num' => $_POST['guarantee_home_num'][$key],
						'guarantee_moo' => $_POST['guarantee_moo'][$key],
						'guarantee_road' => $_POST['guarantee_road'][$key],
						'guarantee_soi' => $_POST['guarantee_soi'][$key],
						'guarantee_tum' => $_POST['guarantee_tum'][$key],
						'guarantee_aum' => $_POST['guarantee_aum'][$key],
						'guarantee_province' => $_POST['guarantee_province'][$key],
						'sort_order' => $sort_order,
					);
					if (isset($_POST['guarantee_mail_1'][$key])) {
						$guarantee['guarantee_mail_1']=$_POST['guarantee_mail_1'][$key];
					}else{
						$guarantee['guarantee_mail_1']="n";
					}
					if (isset($_POST['guarantee_mail_2'][$key])) {
						$guarantee['guarantee_mail_2']=$_POST['guarantee_mail_2'][$key];
					}else{
						$guarantee['guarantee_mail_2']="n";
					}
					if (isset($_POST['guarantee_mail_3'][$key])) {
						$guarantee['guarantee_mail_3']=$_POST['guarantee_mail_3'][$key];
					}else{
						$guarantee['guarantee_mail_3']="n";
					}
					if (isset($_POST['guarantee_mail'][$key])) {
						$guarantee['guarantee_mail']=$_POST['guarantee_mail'][$key];
					}else{
						$guarantee['guarantee_mail']="n";
					}
					$this->m_aom->add_guarantee($guarantee);
					$sort_order+=1;
				}
			}

			if (isset($_POST['extend_appeal_date_old'])) {
				$sort_order=1;
				foreach ($_POST['extend_appeal_date_old'] as $key => $value) {
					$appeal = array(
						'aom_id' => $aom_id, 
						'extend_appeal_note' => $_POST['extend_appeal_note_old'][$key],
						'extend_appeal_date' => $this->m_time->datepicker_to_unix($_POST['extend_appeal_date_old'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_aom->update_appeal($appeal,$key);
					$sort_order+=1;
				}
			}
			if (isset($_POST['extend_appeal_date'])) {
				foreach ($_POST['extend_appeal_date'] as $key => $value) {
					$appeal = array(
						'id' => $this->m_aom->generate_id_appeal(),
						'aom_id' => $aom_id, 
						'extend_appeal_note' => $_POST['extend_appeal_note'][$key],
						'extend_appeal_date' => $this->m_time->datepicker_to_unix($_POST['extend_appeal_date'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_aom->add_appeal($appeal);
					$sort_order+=1;
				}
			}

			if (isset($_POST['borrow_date_old'])) {
				$sort_order=1;
				foreach ($_POST['borrow_date_old'] as $key => $value) {
					$appeal = array(
						'aom_id' => $aom_id, 
						'types_of_credits' => $_POST['types_of_credits_old'][$key],
						'loan' => $_POST['loan_old'][$key],
						'interest_when_borrow' => $_POST['interest_when_borrow_old'][$key],
						'interest_when_sue' => $_POST['interest_when_sue_old'][$key],
						'borrow_date' => $this->m_time->datepicker_to_unix($_POST['borrow_date_old'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_aom->update_borrow($appeal,$key);
					$sort_order+=1;
				}
			}
			if (isset($_POST['borrow_date_i'])) {
				foreach ($_POST['borrow_date_i'] as $key => $value) {
					$appeal = array(
						'id' => $this->m_aom->generate_id_borrow(),
						'aom_id' => $aom_id, 
						'types_of_credits' => $_POST['types_of_credits_i'][$key],
						'loan' => $_POST['loan_i'][$key],
						'interest_when_borrow' => $_POST['interest_when_borrow_i'][$key],
						'interest_when_sue' => $_POST['interest_when_sue_i'][$key],
						'borrow_date' => $this->m_time->datepicker_to_unix($_POST['borrow_date_i'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_aom->add_borrow($appeal);
					$sort_order+=1;
				}
			}

			if (isset($_POST['withdraw_number_old'])) {
				$sort_order=0;
				foreach ($_POST['withdraw_number_old'] as $key => $value) {
					$sort_order+=1;
					$withdraw = array(
						'aom_id' => $aom_id, 
						'sort_order' => $sort_order,
					);
					
					$this->m_aom->update_withdraw($withdraw,$key);
					
				}
			}
				$aom=$this->m_aom->get_aom_by_id($aom_id);
				$sort_order=count($aom->withdraw);
			if (isset($_POST['withdraw_number'])) {
				foreach ($_POST['withdraw_number'] as $key => $value) {
					$sort_order+=1;
					$withdraw = array(
						'id' => $key,
						'aom_id' => $aom_id, 
						'sort_order' => $sort_order,
					);
					
					$this->m_aom->add_withdraw($withdraw);
				}
			}
			if (isset($_POST['withdraw_detail_old'])) {
				$sort_order_with=1;
				foreach ($_POST['withdraw_detail_old'] as $key => $value) {
					$withdraw_detail = array(
						'aom_id' => $aom_id, 
						'sort_order' => $sort_order_with,
						"withdraw_id" => $_POST['withdraw_id_old'][$key],
						"withdraw_detail" => $_POST['withdraw_detail_old'][$key],
						"price" => $_POST['price_old'][$key],
					);
					
					$this->m_aom->update_withdraw_detail($withdraw_detail,$key);
					$sort_order_with+=1;
				}
			}
			if (isset($_POST['withdraw_detail'])) {
				$sort_order_with=1;
				foreach ($_POST['withdraw_detail'] as $key => $value) {
					$withdraw_detail = array(
						'id' => $key,
						'aom_id' => $aom_id, 
						'sort_order' => $sort_order_with,
						"withdraw_id" => $_POST['withdraw_id'][$key],
						"withdraw_detail" => $_POST['withdraw_detail'][$key],
						"price" => $_POST['price'][$key],
					);
					
					$this->m_aom->add_withdraw_detail($withdraw_detail);
					$sort_order_with+=1;
				}
			}

			if (isset($_POST['sold_date_old'])) {
				$sort_order=1;
				foreach ($_POST['sold_date_old'] as $key => $value) {
					$sold = array(
						'aom_id' => $aom_id, 
						'sort_order' => $sort_order,
						"sold_date" => $this->m_time->datepicker_to_unix($_POST['sold_date_old'][$key]),
						"price_sold" => $_POST['price_sold_old'][$key],
					);
					if (isset($_POST['sold_old'][$key])) {
						$sold['sold']=$_POST['sold_old'][$key];
					}else{
						$sold['sold']="n";
					}
					$this->m_aom->update_sold($sold,$key);
					$sort_order+=1;
				}
			}
			if (isset($_POST['sold_date'])) {
				foreach ($_POST['sold_date'] as $key => $value) {
					$sold = array(
						'id' => $key,
						'aom_id' => $aom_id, 
						'sort_order' => $sort_order,
						"sold_date" => $this->m_time->datepicker_to_unix($_POST['sold_date'][$key]),
						"price_sold" => $_POST['price_sold'][$key],
					);
					if (isset($_POST['sold'][$key])) {
						$sold['sold']=$_POST['sold'][$key];
					}else{
						$sold['sold']="n";
					}
					$this->m_aom->add_sold($sold);
					$sort_order+=1;
				}
			}
			$this->m_aom->delete_consider_by_aom_id($aom_id);
			if (isset($_POST['consider_date_ex'])) {
				$sort_order=0;
				foreach ($_POST['consider_date_ex'] as $key => $value) {
					$appeal = array(
						'aom_id' => $aom_id, 
						'consider_note' => $_POST['consider_note_ex'][$key],
						'consider_date' => $this->m_time->datepicker_to_unix($_POST['consider_date_ex'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_aom->add_consider($appeal);
					$sort_order+=1;
				}
			}
			if (isset($_POST['pic_detail'])) {
            $sort_order=0;
            foreach ($_POST['pic_detail'] as $key => $value) {
                $sort_order+=1;
                    $pos = strpos($value, "old_file_picture__");
                    if ($pos === false) {
                        //echo "in here 1 ";
                        $item_id=$this->m_aom_item->generate_id();
                        $ext=explode(".", $value);
                        $new_ext=$ext[count($ext)-1];
                        $new_filename=$aom_id."_".$item_id."_".$ext[0].".".$new_ext;
                        $file = './media/temp/'.$value;
                        $newfile = './media/aom_item/'.$new_filename;
                        if (!is_dir('./media/aom_item/')) {
                                mkdir('./media/aom_item/');
                            }
                        $item_data = array(
                        'id' => $item_id, 
                        'sort_order' => $sort_order, 
                        'filepath' => $new_filename, 
                        'aom_id' => $aom_id, 
                        );
                        if (!copy($file, $newfile)) {
                            echo "failed to copy $file...\n".$file." to ".$newfile;
                            @unlink("./media/temp/".$value);
                            @unlink("./media/temp/thumbnail/".$value);
                        }else{
                            $this->m_aom_item->add_aom_item($item_data);
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
                        $this->m_aom_item->update_aom_item($item_data,$item_id);
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
			
			//print_r($_POST);
			redirect("main/aom/1");
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
			//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
			//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
			//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
		}else{
			
			$this->load->view('header',$data);
			$this->load->view('aom_create',$data);
			$this->load->view('footer',$data);
		}	
	}
	public function add_guarantee()
	{
		$number=(int)$_POST['num']+1;
		$id=$this->m_aom->generate_id_guarantee();
		?>
		<div class="col col-md-12 guarantee-child">
			<div class="row">
				<div class="col col-md-6 ">
	                <div class="form-group">
	                  <label for="name">ชื่อคนค้ำ (ล.<?=$number?>) </label>
	                  <input type="text" class="form-control" name="guarantee[<?=$id?>]" placeholder="">                  
	                </div>
	                <div class="form-group">
	                  <label for="name">เลขบัตรประชาชน</label>
	                  <input type="text" class="form-control" name="guarantee_id[<?=$id?>]" placeholder="">                  
	                </div>
	            </div>
	            <div class="col col-md-2 ">
	                <div class="form-group">
	                  <label for="name">จดหมายครั้งที่ 1 </label>
	                  <div class="form-check">
						  <input class="form-check-input" type="checkbox" name="guarantee_mail_1[<?=$id?>]" id="exampleRadios1" value="y">
						  <label class="form-check-label" >
						    รับ
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" name="guarantee_mail_1[<?=$id?>]" id="exampleRadios2" value="n">
						  <label class="form-check-label" >
						    ไม่รับ
						  </label>
						</div>                  
	                </div>
	                <div class="form-group">
	                  <div class="form-check">
						  <input class="form-check-input" type="checkbox" name="guarantee_mail[<?=$id?>]" id="exampleRadios1" value="y">
						  <label class="form-check-label" >
						    จดหมายคนค้ำ
						  </label>
						</div>              
	                </div>
	            </div>
	            <div class="col col-md-2 ">
	                <div class="form-group">
	                  <label for="name">จดหมายครั้งที่ 2 </label>
	                  <div class="form-check">
						  <input class="form-check-input" type="checkbox" name="guarantee_mail_2[<?=$id?>]" id="exampleRadios1" value="y">
						  <label class="form-check-label" >
						    รับ
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" name="guarantee_mail_2[<?=$id?>]" id="exampleRadios2" value="n">
						  <label class="form-check-label" >
						    ไม่รับ
						  </label>
						</div>                   
	                </div>
	            </div>
	            <div class="col col-md-2 ">
	                <div class="form-group">
	                  <label for="name">จดหมายครั้งที่ 3 </label>
	                  <div class="form-check">
						  <input class="form-check-input" type="checkbox" name="guarantee_mail_3[<?=$id?>]" id="exampleRadios1" value="y">
						  <label class="form-check-label" >
						    รับ
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" name="guarantee_mail_3[<?=$id?>]" id="exampleRadios2" value="n">
						  <label class="form-check-label" >
						    ไม่รับ
						  </label>
						</div>                   
	                </div>
	            </div>
	            <button type="button" class="btn btn-success del_guarantee">X</button>
            </div>
            <div class="row">
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">บ้านเลขที่</label>
                                <input type="text" class="form-control" name="guarantee_home_num[<?=$id?>]" placeholder="" value="">                  
                              </div>
                          </div>
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">หมู่ที่</label>
                                <input type="text" class="form-control" name="guarantee_moo[<?=$id?>]" placeholder="" value="">                  
                              </div>
                          </div>
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">ถนน</label>
                                <input type="text" class="form-control" name="guarantee_road[<?=$id?>]" placeholder="" value="">                  
                              </div>
                          </div>
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">ตรอก/ซอย</label>
                                <input type="text" class="form-control" name="guarantee_soi[<?=$id?>]" placeholder="" value="">                  
                              </div>
                          </div>
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">ตำบล/แขวง</label>
                                <input type="text" class="form-control" name="guarantee_tum[<?=$id?>]" placeholder="" value="">                  
                              </div>
                          </div>
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">อำเภอ/เขต</label>
                                <input type="text" class="form-control" name="guarantee_aum[<?=$id?>]" placeholder="" value="">                  
                              </div>
                          </div>
                          <div class="col col-md-3 ">
                              <div class="form-group">
                                <label for="name">จังหวัด</label>
                                <select class="custom-select" id="guarantee_province_<?=$id?>" name="guarantee_province[<?=$id?>]">
                                <?
                                foreach ($this->m_stringlib->province_type as $key => $value) {
                                  ?>
                                  <option value="<?=$value?>"><?=$value?></option>
                                  <?
                                }
                                ?>
                                </select>
                              </div>
                          </div>
                        </div>
            
        </div>
		<?
		
	}
	public function add_borrow()
	{
		$number=(int)$_POST['num']+1;
		$id=$this->m_aom->generate_id_borrow();
		?>
		<div class="col col-md-12 borrow-child">
			<div class="row">  
				<div class="col col-md-3">
	              <div class="form-group">
	                <label for="name">วันที่กู้ </label>
	                <input type="text" class="form-control datepicker" name="borrow_date_i[<?=$id?>]" placeholder="" id="" >
	              </div>
	            </div>          
	            <div class="col col-md-3">
	              <div class="form-group">
	                <label for="surname">ประเภทสินเชื่อ</label>
	                <input type="text" class="form-control" name="types_of_credits_i[<?=$id?>]" placeholder="" id="" >
	              </div>
	            </div>
	            <div class="col col-md-2">
	              <div class="form-group">
	                <label for="name">จำนวนเงินกู้ </label>
	                <input type="text" class="form-control" name="loan_i[<?=$id?>]" placeholder="" id="loan" >
	              </div>
	            </div>
	            <div class="col col-md-2">
	              <div class="form-group">
	                <label for="name">ดอกเบี้ย ณ วันกู้ </label>
	                <input type="text" class="form-control" name="interest_when_borrow_i[<?=$id?>]" placeholder="" id="" >
	              </div>
	            </div>
	            <div class="col col-md-2">
	              <div class="form-group">
	                <label for="name">ดอกเบี้ย ณ วันฟ้อง </label>
	                <input type="text" class="form-control" name="interest_when_sue_i[<?=$id?>]" placeholder="" id="" >
	              </div>
	            </div>
	            <button type="button" class="btn btn-success del_borrow">X</button>
	          </div>  
	          <div class="row">
			            <div class="col col-md-12">
			              <hr>
			            </div>
			          </div>          
        </div>
		<?
		
	}
	public function add_appeal()
	{
		$number=(int)$_POST['num']+1;
		$id=$this->m_aom->generate_id_appeal();
		?>
		<div class="col col-md-12 appeal-child">
			<div class="row">
				<div class="col col-md-12 ">
	                <div class="form-group">
	                  <label for="name">ขยายอุทธรณ์ ครั้งที่ <?=$number?></label>
	                  <input type="text" class="form-control datepicker" name="extend_appeal_date[<?=$id?>]" placeholder="">                  
	                </div>
	                <div class="form-group">
	                  <label for="name">หมายเหตุการขยาย</label>
	                  <textarea class="form-control" name="extend_appeal_note[<?=$id?>]" style="width: 100%;height: 150px;"></textarea>         
	                </div>
	            </div>
	            <button type="button" class="btn btn-success del_appeal">X</button>
            </div>
            
        </div>
		<?
		
	}
	public function add_consider()
	{
		$number=(int)$_POST['num']+1;
		?>
		<div class="col col-md-12 consider-child">
                  <div class="row">
                    <div class="col col-md-4 ">
                              <div class="form-group">
                                <label for="name">นัดพิจารณาคดี ครั้งที่ <?=$number?></label>
                                <input type="text" class="form-control datepicker" name="consider_date_ex[]" placeholder="" value="">                  
                              </div>                              
                          </div>
                          <div class="col col-md-4 ">
                            <div class="form-group">
                                <label for="name">หมายเหตุการนัดพิจารณาคดี</label>
                                <textarea class="form-control" name="consider_note_ex[]" style="width: 100%;height: 40px;"></textarea>         
                              </div>
                          </div>
                          <button type="button" class="btn btn-success del_consider">X</button>
                        </div>
                        
                    </div>
		<?
		
	}
	public function add_withdraw()
	{
		$number=(int)$_POST['num']+1;
		$id=$this->m_aom->generate_id_withdraw();
		?>
		<div class="col col-md-12 withdraw-child">
			<div class="row">
				<div class="col col-md-12 ">
	                <div class="form-group">
	                  <label for="name">เบิกเงิน ครั้งที่ <?=$number?></label>                  
	                </div>
	                  <div class="row">
			            <div class="col col-md-12">
			              <hr>
			            </div>
			          </div>

			          <div class="row">
			          	<div class="col col-md-1">
			          	</div>
			            <div class="col col-md-4">
			              <div class="form-group">
			                <label for="name">เพิ่มรายละเอียด</label>
			                <input type="hidden" name="withdraw_number[<?=$id?>]" value="<?=$number?>">
			                <button type="button" class="btn btn-success add_withdraw_detail" attr-id="<?=$id?>">เพิ่ม</button>
			              </div>
			            </div>
			          </div>
			          <div class="row" id="withdraw_detail_holder_<?=$id?>">
			          </div>

			          <div class="row">
			            <div class="col col-md-12">
			              <hr>
			            </div>
			          </div>
	            </div>
	            <button type="button" class="btn btn-success del_withdraw">X</button>
            </div>
            
        </div>
		<?
		
	}
	public function add_withdraw_detail()
	{
		$withdraw_id=$_POST['id'];
		$id=$this->m_aom->generate_id_withdraw_detail();
		?>
		<div class="col col-md-12 withdraw_detail-child">
			<div class="row">
				<div class="col col-md-2">
			          	</div>
				<div class="col col-md-10 ">
	                <div class="form-group">
	                  <label for="name">รายละเอียด</label>
	                  <input type="text" class="form-control" name="withdraw_detail[<?=$id?>]" placeholder="">
	                  <input type="hidden" name="withdraw_id[<?=$id?>]" value="<?=$withdraw_id?>">                  
	                </div>
	                <div class="form-group">
	                  <label for="name">จำนวนเงิน</label>
	                  <input type="text" class="form-control" name="price[<?=$id?>]" placeholder="">          
	                </div>
	            </div>
	            <button type="button" class="btn btn-success del_withdraw_detail">X</button>
            </div>
            
        </div>
		<?
		
	}

	public function add_sold()
	{
		$number=(int)$_POST['num']+1;
		$id=$this->m_aom->generate_id_sold();
		?>
		<div class="col col-md-12 sold-child">
			<div class="row">
				<div class="col col-md-4 ">
	                <div class="form-group">
	                  <label for="name">ประกาศขาย นัดที่ <?=$number?></label>
	                  <input type="text" class="form-control datepicker" name="sold_date[<?=$id?>]" placeholder="">                   
	                </div>
	            </div>
	            <div class="col col-md-2 ">
	                <div class="form-group">
	                  <label for="name">การขาย</label>
	                  <div class="form-check">
						  <input class="form-check-input" type="checkbox" name="sold[<?=$id?>]" id="exampleRadios1" value="y">
						  <label class="form-check-label" >
						    ขาย
						  </label>
						</div>                 
	                </div>
	            </div>
	            <div class="col col-md-4 ">
	                <div class="form-group">
	                  <label for="name">จำนวนเงิน</label>
	                  <input type="text" class="form-control" name="price_sold[<?=$id?>]" placeholder="">           
	                </div>
	            </div>
	            <button type="button" class="btn btn-success del_sold">X</button>
            </div>
            
        </div>
		<?
		
	}


	public function ajax_get_section4()
	{
		header('Content-Type: application/json');
        $json = array();
        $json['flag']="OK";
		
		$id=$_POST['id'];
		$section4=$this->m_section4->get_template_section4_by_id($id);
		$json['des']=$section4->description;

		echo json_encode($json);		    
	}
}
