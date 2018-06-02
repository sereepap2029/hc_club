<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bang extends CI_Controller {

	public function __construct() {
        parent::__construct();   
        $this->load->model('m_admin');   
        $this->load->model('m_bang');
        $this->load->model('m_bang_item'); 
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
		$bang_id=$this->uri->segment(3,"");
		$data['pic_list']=$this->m_bang_item->get_all_bang_item($bang_id);
		$this->load->view('fancy_box/header',$data);
		$this->load->view('fancy_box/read_bang_item',$data);
		$this->load->view('footer',$data);

	}
	public function read_log()
	{
		$bang_id=$this->uri->segment(3,"");
		$data['log_list']=$this->m_bang->get_all_log($bang_id);
		$this->load->view('fancy_box/header',$data);
		$this->load->view('fancy_box/read_bang_log',$data);
		$this->load->view('footer',$data);

	}
	public function delete()
	{
		if ($this->session->userdata('id')) {
            $user_data = $this->m_admin->get_admin_by_id($this->session->userdata('id'));
            if (isset($user_data->username)&&isset($user_data->perm['delete'])) {
                $this->user_data = $user_data;
                $bang_id=$this->uri->segment(3,"");
				$this->m_bang->delete_bang($bang_id);
				redirect("main/bang");
            }
            else {
                redirect('main/logout');
            }
        }
        else {
            redirect('main/logout');
        }
		
	}
	private function create_ins_array($bang_id,$post)
	{
		$data_ins = array(
				'id' => $bang_id,
				'group_number' => $post['group_number'],
				'group_name' => $post['group_name'],
				'date' => $this->m_time->datepicker_to_unix($post['date']),
				'mail_date' => $this->m_time->datepicker_to_unix($post['mail_date']), 
				'acc_no' => $post['acc_no'],
				'cort' => $post['cort'],
				'principle' => $post['principle'],
				'interest' => $post['interest'],
				'interest_pk' => $post['interest_pk'],
				'lawyer_cost' => $post['lawyer_cost'],
				'borrower' => $post['borrower'],
				'borrower_id' => $post['borrower_id'],
				'black_case' => $post['black_case'],
				'red_case' => $post['red_case'],
				'branch' => $post['branch'],
				'insurance' => $post['insurance'],
				'defendant_num' => $post['defendant_num'],
				'sue_date' => $this->m_time->datepicker_to_unix($post['sue_date']),
				'sue_date_limit' => $this->m_time->datepicker_to_unix($post['sue_date_limit']),
				'consider_date' => $this->m_time->datepicker_to_unix($post['consider_date']),
				'Judge_date' => $this->m_time->datepicker_to_unix($post['Judge_date']),
				'appeal_date' => $this->m_time->datepicker_to_unix($post['appeal_date']),
				'unappeal_date' => $this->m_time->datepicker_to_unix($post['unappeal_date']),
				'appeal_type_date' => $this->m_time->datepicker_to_unix($post['appeal_type_date']),
				'statement_officer' => $post['statement_officer'],
				'court_order_date' => $this->m_time->datepicker_to_unix($post['court_order_date']),
				'court_order_note' => $post['court_order_note'],
				'warrant_mark_date' => $this->m_time->datepicker_to_unix($post['warrant_mark_date']),
				'court_cost' => $post['court_cost'],
				'court_cost_date' => $this->m_time->datepicker_to_unix($post['court_cost_date']),
				'property' => $post['property'],
				'sequester_date' => $this->m_time->datepicker_to_unix($post['sequester_date']),
				'seize_date' => $this->m_time->datepicker_to_unix($post['seize_date']),
				'sequester_property' => $post['sequester_property'],
				'sold_estimate' => $post['sold_estimate'],
				'monthly_pay' => $post['monthly_pay'],
				'pay_time' => $post['pay_time'],
				'start_pay_year' => $post['start_pay_year'],
				'start_pay_month' => $post['start_pay_month'],
				'end_pay_date' => $this->m_time->datepicker_to_unix($post['end_pay_date']),
				'borrow_date' => $this->m_time->datepicker_to_unix($post['borrow_date']),
				'types_of_credits' => $post['types_of_credits'],
				'loan' => $post['loan'],
				'interest_when_borrow' => $post['interest_when_borrow'],
				'interest_when_sue' => $post['interest_when_sue'],
				'section4_template' => $post['section4_template'],
				'section4_description' => $post['section4_description'],
				'heritage' => $post['heritage'],
				'heritage_relate' => $post['relate'],
				'responsible_lawyer' => $post['responsible_lawyer'],
				'sold_note' => $post['sold_note'],
				'wearing_date' => $this->m_time->datepicker_to_unix($post['wearing_date']),
				'wearing_warrant_cost' => $post['wearing_warrant_cost'],
				'wearing_warrant_fee' => $post['wearing_warrant_fee'],
				'wearing_order' => $post['wearing_order'],
				'request_warrant_mark_date' => $this->m_time->datepicker_to_unix($post['request_warrant_mark_date']),
				'investigete_contract_note' => $post['investigete_contract_note'],
				'investigete_officer' => $post['investigete_officer'],
				'seize_officer' => $post['seize_officer'],
				'seize_owner' => $post['seize_owner'],
				'seize_guarantee_num' => $post['seize_guarantee_num'],
				'seize_enforce_office' => $post['seize_enforce_office'],
				'seize_property_type' => $post['seize_property_type'],
				'seize_billing_at_office' => $post['seize_billing_at_office'],
				'seize_billing_at_office_fee' => $post['seize_billing_at_office_fee'],
				'seize_billing_outbound' => $post['seize_billing_outbound'],
				'seize_billing_outbound_fee' => $post['seize_billing_outbound_fee'],
				'seize_lead_officer' => $post['seize_lead_officer'],
				'acc_close_date' => $this->m_time->datepicker_to_unix($post['acc_close_date']),
				'paybill_enforce_date' => $this->m_time->datepicker_to_unix($post['paybill_enforce_date']),
				'paybill_lawyer_date' => $this->m_time->datepicker_to_unix($post['paybill_lawyer_date']),
				'payperiod_date' => $this->m_time->datepicker_to_unix($post['payperiod_date']),
				'payperiod_command_date' => $this->m_time->datepicker_to_unix($post['payperiod_command_date']),
				'acc_withdraw_date' => $this->m_time->datepicker_to_unix($post['acc_withdraw_date']),
				'refund_date' => $this->m_time->datepicker_to_unix($post['refund_date']),
				'refund_outbound_date' => $this->m_time->datepicker_to_unix($post['refund_outbound_date']),
				'refund_withdraw_date' => $this->m_time->datepicker_to_unix($post['refund_withdraw_date']),
				'refund_checks_number' => $post['refund_checks_number'],
				'refund_outbound_checks_number' => $post['refund_outbound_checks_number'],
				'refund_phone' => $post['refund_phone'],
				'refund_note' => $post['refund_note'],
				'refund_officer' => $post['refund_officer'],
				'sold_officer' => $post['sold_officer'],
			);
			if (isset($post['judge'])) {
				$data_ins['judge']=$post['judge'];
			}
			if (isset($post['appeal_type'])) {
				$data_ins['appeal_type']=$post['appeal_type'];
			}
			if (isset($post['bank_statement'])) {
				$data_ins['bank_statement']=$post['bank_statement'];
			}else{
				$data_ins['bank_statement']="n";
			}
			if (isset($post['we_statement'])) {
				$data_ins['we_statement']=$post['we_statement'];
			}else{
				$data_ins['we_statement']="n";
			}
			if (isset($post['court_order'])) {
				$data_ins['court_order']=$post['court_order'];
			}else{
				$data_ins['court_order']="n";
			}
			if (isset($post['warrant_mark'])) {
				$data_ins['warrant_mark']=$post['warrant_mark'];
			}else{
				$data_ins['warrant_mark']="n";
			}
			if (isset($post['finish'])) {
				$data_ins['finish']=$post['finish'];
			}else{
				$data_ins['finish']="n";
			}
			if (isset($post['borrower_dead'])) {
				$data_ins['borrower_dead']=$post['borrower_dead'];
			}else{
				$data_ins['borrower_dead']="n";
			}
			if (isset($post['borrower_mail_1'])) {
				$data_ins['borrower_mail_1']=$post['borrower_mail_1'];
			}else{
				$data_ins['borrower_mail_1']="z";
			}
			if (isset($post['borrower_mail_2'])) {
				$data_ins['borrower_mail_2']=$post['borrower_mail_2'];
			}else{
				$data_ins['borrower_mail_2']="z";
			}
			if (isset($post['borrower_mail_3'])) {
				$data_ins['borrower_mail_3']=$post['borrower_mail_3'];
			}else{
				$data_ins['borrower_mail_3']="z";
			}
			if (isset($post['case_close'])) {
				$data_ins['case_close']=$post['case_close'];
			}else{
				$data_ins['case_close']="n";
			}
			if (isset($post['refrain'])) {
				$data_ins['refrain']=$post['refrain'];
			}else{
				$data_ins['refrain']="n";
			}
			if (isset($post['sue_cancel'])) {
				$data_ins['sue_cancel']=$post['sue_cancel'];
			}else{
				$data_ins['sue_cancel']="n";
			}

			if (isset($post['wearing_claim'])) {
				$data_ins['wearing_claim']=$post['wearing_claim'];
			}else{
				$data_ins['wearing_claim']="n";
			}
			if (isset($post['wearing_receipt'])) {
				$data_ins['wearing_receipt']=$post['wearing_receipt'];
			}else{
				$data_ins['wearing_receipt']="n";
			}
			if (isset($post['wearing_withdraw_y'])) {
				$data_ins['wearing_withdraw_y']=$post['wearing_withdraw_y'];
			}else{
				$data_ins['wearing_withdraw_y']="n";
			}
			if (isset($post['wearing_withdraw_n'])) {
				$data_ins['wearing_withdraw_n']=$post['wearing_withdraw_n'];
			}else{
				$data_ins['wearing_withdraw_n']="n";
			}
			if (isset($post['wearing_c'])) {
				$data_ins['wearing_c']=$post['wearing_c'];
			}else{
				$data_ins['wearing_c']="n";
			}

			if (isset($post['request_warrant_mark'])) {
				$data_ins['request_warrant_mark']=$post['request_warrant_mark'];
			}else{
				$data_ins['request_warrant_mark']="n";
			}
			if (isset($post['cort_warrant_mark'])) {
				$data_ins['cort_warrant_mark']=$post['cort_warrant_mark'];
			}else{
				$data_ins['cort_warrant_mark']="n";
			}
			if (isset($post['scan_warrant_mark'])) {
				$data_ins['scan_warrant_mark']=$post['scan_warrant_mark'];
			}else{
				$data_ins['scan_warrant_mark']="n";
			}
			if (isset($post['withdraw_warrant_mark'])) {
				$data_ins['withdraw_warrant_mark']=$post['withdraw_warrant_mark'];
			}else{
				$data_ins['withdraw_warrant_mark']="n";
			}
			if (isset($post['unwithdraw_warrant_mark'])) {
				$data_ins['unwithdraw_warrant_mark']=$post['unwithdraw_warrant_mark'];
			}else{
				$data_ins['unwithdraw_warrant_mark']="n";
			}

			if (isset($post['investigete_close'])) {
				$data_ins['investigete_close']=$post['investigete_close'];
			}else{
				$data_ins['investigete_close']="n";
			}
			if (isset($post['investigete_death'])) {
				$data_ins['investigete_death']=$post['investigete_death'];
			}else{
				$data_ins['investigete_death']="n";
			}
			if (isset($post['investigete_done'])) {
				$data_ins['investigete_done']=$post['investigete_done'];
			}else{
				$data_ins['investigete_done']="n";
			}
			if (isset($post['investigete_undone'])) {
				$data_ins['investigete_undone']=$post['investigete_undone'];
			}else{
				$data_ins['investigete_undone']="n";
			}
			if (isset($post['withdraw_investigete'])) {
				$data_ins['withdraw_investigete']=$post['withdraw_investigete'];
			}else{
				$data_ins['withdraw_investigete']="n";
			}
			if (isset($post['unwithdraw_investigete'])) {
				$data_ins['unwithdraw_investigete']=$post['unwithdraw_investigete'];
			}else{
				$data_ins['unwithdraw_investigete']="n";
			}

			if (isset($post['seize_map'])) {
				$data_ins['seize_map']=$post['seize_map'];
			}else{
				$data_ins['seize_map']="n";
			}
			if (isset($post['seize_photo'])) {
				$data_ins['seize_photo']=$post['seize_photo'];
			}else{
				$data_ins['seize_photo']="n";
			}

			if (isset($post['seize_land'])) {
				$data_ins['seize_land']=$post['seize_land'];
			}else{
				$data_ins['seize_land']="n";
			}
			if (isset($post['seize_car'])) {
				$data_ins['seize_car']=$post['seize_car'];
			}else{
				$data_ins['seize_car']="n";
			}

			if (isset($post['tr_14_12'])) {
				$data_ins['tr_14_12']=$post['tr_14_12'];
			}else{
				$data_ins['tr_14_12']="n";
			}
			if (isset($post['seize_request'])) {
				$data_ins['seize_request']=$post['seize_request'];
			}else{
				$data_ins['seize_request']="n";
			}
			if (isset($post['seize_report'])) {
				$data_ins['seize_report']=$post['seize_report'];
			}else{
				$data_ins['seize_report']="n";
			}
			if (isset($post['seize_deed'])) {
				$data_ins['seize_deed']=$post['seize_deed'];
			}else{
				$data_ins['seize_deed']="n";
			}
			if (isset($post['seize_price_estimate'])) {
				$data_ins['seize_price_estimate']=$post['seize_price_estimate'];
			}else{
				$data_ins['seize_price_estimate']="n";
			}
			if (isset($post['seize_mapandphoto'])) {
				$data_ins['seize_mapandphoto']=$post['seize_mapandphoto'];
			}else{
				$data_ins['seize_mapandphoto']="n";
			}
			if (isset($post['seize_bill'])) {
				$data_ins['seize_bill']=$post['seize_bill'];
			}else{
				$data_ins['seize_bill']="n";
			}
			if (isset($post['withdraw_seize'])) {
				$data_ins['withdraw_seize']=$post['withdraw_seize'];
			}else{
				$data_ins['withdraw_seize']="n";
			}
			if (isset($post['unwithdraw_seize'])) {
				$data_ins['unwithdraw_seize']=$post['unwithdraw_seize'];
			}else{
				$data_ins['unwithdraw_seize']="n";
			}

			if (isset($post['acc_close'])) {
				$data_ins['acc_close']=$post['acc_close'];
			}else{
				$data_ins['acc_close']="n";
			}
			if (isset($post['paybill_enforce'])) {
				$data_ins['paybill_enforce']=$post['paybill_enforce'];
			}else{
				$data_ins['paybill_enforce']="n";
			}
			if (isset($post['paybill_lawyer'])) {
				$data_ins['paybill_lawyer']=$post['paybill_lawyer'];
			}else{
				$data_ins['paybill_lawyer']="n";
			}
			if (isset($post['payperiod'])) {
				$data_ins['payperiod']=$post['payperiod'];
			}else{
				$data_ins['payperiod']="n";
			}
			if (isset($post['payperiod_command'])) {
				$data_ins['payperiod_command']=$post['payperiod_command'];
			}else{
				$data_ins['payperiod_command']="n";
			}
			if (isset($post['acc_unwithdraw'])) {
				$data_ins['acc_unwithdraw']=$post['acc_unwithdraw'];
			}else{
				$data_ins['acc_unwithdraw']="n";
			}
			if (isset($post['acc_withdraw'])) {
				$data_ins['acc_withdraw']=$post['acc_withdraw'];
			}else{
				$data_ins['acc_withdraw']="n";
			}
			if (isset($post['refund_withdraw'])) {
				$data_ins['refund_withdraw']=$post['refund_withdraw'];
			}else{
				$data_ins['refund_withdraw']="n";
			}
			if (isset($post['refund_request'])) {
				$data_ins['refund_request']=$post['refund_request'];
			}else{
				$data_ins['refund_request']="n";
			}
			if (isset($post['refund_checks'])) {
				$data_ins['refund_checks']=$post['refund_checks'];
			}else{
				$data_ins['refund_checks']="n";			}

			if (isset($post['refund_judge'])) {
				$data_ins['refund_judge']=$post['refund_judge'];
			}else{
				$data_ins['refund_judge']="n";
			}
			if (isset($post['refund_draw'])) {
				$data_ins['refund_draw']=$post['refund_draw'];
			}else{
				$data_ins['refund_draw']="n";
			}
			if (isset($post['refund_undraw'])) {
				$data_ins['refund_undraw']=$post['refund_undraw'];
			}else{
				$data_ins['refund_undraw']="n";
			}

			if (isset($post['sold_refrain_request'])) {
				$data_ins['sold_refrain_request']=$post['sold_refrain_request'];
			}else{
				$data_ins['sold_refrain_request']="n";
			}
			if (isset($post['sold_report'])) {
				$data_ins['sold_report']=$post['sold_report'];
			}else{
				$data_ins['sold_report']="n";			}

			if (isset($post['sold_contract'])) {
				$data_ins['sold_contract']=$post['sold_contract'];
			}else{
				$data_ins['sold_contract']="n";
			}
			if (isset($post['sold_withdraw'])) {
				$data_ins['sold_withdraw']=$post['sold_withdraw'];
			}else{
				$data_ins['sold_withdraw']="n";
			}
			if (isset($post['sold_unwithdraw'])) {
				$data_ins['sold_unwithdraw']=$post['sold_unwithdraw'];
			}else{
				$data_ins['sold_unwithdraw']="n";
			}

		return $data_ins;

	}
	public function create()
	{
		$bang_id=$this->uri->segment(3,"");
		$bang=$this->m_bang->get_bang_by_id($bang_id);
		$data['page'] = 'create';
		$data['section4'] = $this->m_section4->get_all_template_section4();
		$data['lawyer'] = $this->m_lawyer->get_all_lawyer();
		if (isset($bang->id)) {
			$data['dat']=$bang;
			$data['edit']=$bang->id;
		}
		
		if (isset($_POST['acc_no'])&&!isset($_POST['edit'])) {
			$bang_id=$this->m_bang->generate_id();
			$data_ins=$this->create_ins_array($bang_id,$_POST);			
			$this->m_bang->add_bang($data_ins);
			$data_logs = array(
				'bang_id' => $bang_id, 
				'description' => $_POST['bang_log'],  
				'time' => time(),
				'user' => $this->user_data->id,
				);
			$this->m_bang->add_bang_log($data_logs);

			$sort_order=1;
			if (isset($_POST['transport_date'])) {
				$sort_order=1;
				foreach ($_POST['transport_date'] as $key => $value) {
					$investigete = array(
						'id' => $this->m_bang->generate_id_investigate(),
						'bang_id' => $bang_id, 
						'transport_date' => $this->m_time->datepicker_to_unix($_POST['transport_date'][$key]),
						'transport_book' => $_POST['transport_book'][$key],
						'transport_property' => $_POST['transport_property'][$key],
						'transport_note' => $_POST['transport_note'][$key],
						'land_date' => $this->m_time->datepicker_to_unix($_POST['land_date'][$key]),
						'land_book' => $_POST['land_book'][$key],
						'land_property' => $_POST['land_property'][$key],
						'land_note' => $_POST['land_note'][$key],
						'sort_order' => $sort_order,
					);
					if (isset($_POST['transport_found'][$key])) {
						$investigete['transport_found']=$_POST['transport_found'][$key];
					}else{
						$investigete['transport_found']="n";
					}
					if (isset($_POST['land_found'][$key])) {
						$investigete['land_found']=$_POST['land_found'][$key];
					}else{
						$investigete['land_found']="n";
					}
					$this->m_bang->add_investigete($investigete);
					$sort_order+=1;
				}
			}

			if (isset($_POST['guarantee'])) {
				$sort_order=1;
				foreach ($_POST['guarantee'] as $key => $value) {
					$guarantee = array(
						'id' => $this->m_bang->generate_id_guarantee(),
						'bang_id' => $bang_id, 
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
					$this->m_bang->add_guarantee($guarantee);
					$sort_order+=1;
				}
			}
			if (isset($_POST['payment_date'])) {
				foreach ($_POST['payment_date'] as $key => $value) {
					$payment = array(
						'id' => $this->m_bang->generate_id_appeal(),
						'bang_id' => $bang_id, 
						'payment_bill_number' => $_POST['payment_bill_number'][$key],
						'payment_bill_fee' => $_POST['payment_bill_fee'][$key],
						'payment_officer' => $_POST['payment_officer'][$key],
						'payment_date' => $this->m_time->datepicker_to_unix($_POST['payment_date'][$key]),
						'sort_order' => $sort_order,
					);
					if (isset($_POST['payment_request'][$key])) {
						$payment['payment_request']=$_POST['payment_request'][$key];
					}else{
						$payment['payment_request']="n";
					}
					if (isset($_POST['payment_warrant'][$key])) {
						$payment['payment_warrant']=$_POST['payment_warrant'][$key];
					}else{
						$payment['payment_warrant']="n";
					}
					if (isset($_POST['payment_bill'][$key])) {
						$payment['payment_bill']=$_POST['payment_bill'][$key];
					}else{
						$payment['payment_bill']="n";
					}
					if (isset($_POST['payment_withdraw'][$key])) {
						$payment['payment_withdraw']=$_POST['payment_withdraw'][$key];
					}else{
						$payment['payment_withdraw']="n";
					}
					if (isset($_POST['payment_unwithdraw'][$key])) {
						$payment['payment_unwithdraw']=$_POST['payment_unwithdraw'][$key];
					}else{
						$payment['payment_unwithdraw']="n";
					}
					
					$this->m_bang->add_payment($payment);
					$sort_order+=1;
				}
			}

			if (isset($_POST['extend_appeal_date'])) {
				$sort_order=1;
				foreach ($_POST['extend_appeal_date'] as $key => $value) {
					$appeal = array(
						'id' => $this->m_bang->generate_id_appeal(),
						'bang_id' => $bang_id, 
						'extend_appeal_note' => $_POST['extend_appeal_note'][$key],
						'extend_appeal_date' => $this->m_time->datepicker_to_unix($_POST['extend_appeal_date'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_bang->add_appeal($appeal);
					$sort_order+=1;
				}
			}
			if (isset($_POST['borrow_date_i'])) {
				$sort_order=1;
				foreach ($_POST['borrow_date_i'] as $key => $value) {
					$appeal = array(
						'id' => $this->m_bang->generate_id_borrow(),
						'bang_id' => $bang_id, 
						'types_of_credits' => $_POST['types_of_credits_i'][$key],
						'loan' => $_POST['loan_i'][$key],
						'interest_when_borrow' => $_POST['interest_when_borrow_i'][$key],
						'interest_when_sue' => $_POST['interest_when_sue_i'][$key],
						'borrow_date' => $this->m_time->datepicker_to_unix($_POST['borrow_date_i'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_bang->add_borrow($appeal);
					$sort_order+=1;
				}
			}

			if (isset($_POST['withdraw_number'])) {
				$sort_order=1;
				foreach ($_POST['withdraw_number'] as $key => $value) {
					$withdraw = array(
						'id' => $key,
						'bang_id' => $bang_id, 
						'sort_order' => $sort_order,
					);
					
					$this->m_bang->add_withdraw($withdraw);
					$sort_order+=1;
				}
			}
			if (isset($_POST['withdraw_detail'])) {
				$sort_order=1;
				foreach ($_POST['withdraw_detail'] as $key => $value) {
					$withdraw_detail = array(
						'id' => $key,
						'bang_id' => $bang_id, 
						'sort_order' => $sort_order,
						"withdraw_id" => $_POST['withdraw_id'][$key],
						"withdraw_detail" => $_POST['withdraw_detail'][$key],
						"price" => $_POST['price'][$key],
					);
					
					$this->m_bang->add_withdraw_detail($withdraw_detail);
					$sort_order+=1;
				}
			}
			if (isset($_POST['sold_date'])) {
				$sort_order=1;
				foreach ($_POST['sold_date'] as $key => $value) {
					$sold = array(
						'id' => $key,
						'bang_id' => $bang_id, 
						'sort_order' => $sort_order,
						"sold_date" => $this->m_time->datepicker_to_unix($_POST['sold_date'][$key]),
						"price_sold" => $_POST['price_sold'][$key],
						"sold_refrain_note" => $_POST['sold_refrain_note'][$key],
					);
					if (isset($_POST['sold'][$key])) {
						$sold['sold']=$_POST['sold'][$key];
					}else{
						$sold['sold']="n";
					}
					if (isset($_POST['unsold'][$key])) {
						$sold['unsold']=$_POST['unsold'][$key];
					}else{
						$sold['unsold']="n";
					}
					if (isset($_POST['sold_refrain'][$key])) {
						$sold['sold_refrain']=$_POST['sold_refrain'][$key];
					}else{
						$sold['sold_refrain']="n";
					}
					$this->m_bang->add_sold($sold);
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
                        $item_id=$this->m_bang_item->generate_id();
                        $ext=explode(".", $value);
                        $new_ext=$ext[count($ext)-1];
                        $new_filename=$bang_id."_".$item_id."_".$ext[0].".".$new_ext;
                        $file = './media/temp/'.$value;
                        $newfile = './media/bang_item/'.$new_filename;
                        if (!is_dir('./media/bang_item/')) {
                                mkdir('./media/bang_item/');
                            }
                        $item_data = array(
                        'id' => $item_id, 
                        'sort_order' => $sort_order, 
                        'filepath' => $new_filename, 
                        'bang_id' => $bang_id, 
                        );
                        if (!copy($file, $newfile)) {
                            echo "failed to copy $file...\n".$file." to ".$newfile;
                            @unlink("./media/temp/".$value);
                            @unlink("./media/temp/thumbnail/".$value);
                        }else{
                            $this->m_bang_item->add_bang_item($item_data);
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
                        $this->m_bang_item->update_bang_item($item_data,$item_id);
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
			redirect("main/bang/1");

		//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	

		}else if (isset($_POST['acc_no'])&&isset($_POST['edit'])) {
			$bang_id=$_POST['edit'];

			$data_ins=$this->create_ins_array($bang_id,$_POST);
			$this->m_bang->update_bang($data_ins,$bang_id);
			$data_logs = array(
				'bang_id' => $bang_id, 
				'description' => $_POST['bang_log'],  
				'time' => time(),
				'user' => $this->user_data->id,
				);
			$this->m_bang->add_bang_log($data_logs);



			// del region
			if (isset($_POST['del_guarantee'])) {
				foreach ($_POST['del_guarantee'] as $key => $value) {
					$this->m_bang->delete_guarantee($value);
				}
			}
			if (isset($_POST['del_payment'])) {
				foreach ($_POST['del_payment'] as $key => $value) {
					$this->m_bang->delete_payment($value);
				}
			}
			if (isset($_POST['del_appeal'])) {
				foreach ($_POST['del_appeal'] as $key => $value) {
					$this->m_bang->delete_appeal($value);
				}
			}
			if (isset($_POST['del_investigate'])) {
				foreach ($_POST['del_investigate'] as $key => $value) {
					$this->m_bang->delete_investigete($value);
				}
			}
			if (isset($_POST['del_borrow'])) {
				foreach ($_POST['del_borrow'] as $key => $value) {
					$this->m_bang->delete_borrow($value);
				}
			}
			if (isset($_POST['del_withdraw_detail'])) {
				foreach ($_POST['del_withdraw_detail'] as $key => $value) {
					$this->m_bang->delete_withdraw_detail($value);
				}
			}
			if (isset($_POST['del_withdraw'])) {
				foreach ($_POST['del_withdraw'] as $key => $value) {
					$this->m_bang->delete_withdraw($value);
				}
			}
			if (isset($_POST['del_sold'])) {
				foreach ($_POST['del_sold'] as $key => $value) {
					$this->m_bang->delete_sold($value);
				}
			}
			if (isset($_POST['del_pic'])) {
				foreach ($_POST['del_pic'] as $key => $value) {
					$this->m_bang_item->delete_bang($value);
				}
			}




			$sort_order=1;
			if (isset($_POST['transport_date_old'])) {
				$sort_order=1;
				foreach ($_POST['transport_date_old'] as $key => $value) {
					$investigete = array(
						'bang_id' => $bang_id, 
						'transport_date' => $this->m_time->datepicker_to_unix($_POST['transport_date_old'][$key]),
						'transport_book' => $_POST['transport_book_old'][$key],
						'transport_property' => $_POST['transport_property_old'][$key],
						'transport_note' => $_POST['transport_note_old'][$key],
						'land_date' => $this->m_time->datepicker_to_unix($_POST['land_date_old'][$key]),
						'land_book' => $_POST['land_book_old'][$key],
						'land_property' => $_POST['land_property_old'][$key],
						'land_note' => $_POST['land_note_old'][$key],
						'sort_order' => $sort_order,
					);
					if (isset($_POST['transport_found_old'][$key])) {
						$investigete['transport_found']=$_POST['transport_found_old'][$key];
					}else{
						$investigete['transport_found']="n";
					}
					if (isset($_POST['land_found_old'][$key])) {
						$investigete['land_found']=$_POST['land_found_old'][$key];
					}else{
						$investigete['land_found']="n";
					}
					$this->m_bang->update_investigete($investigete,$key);
					$sort_order+=1;
				}
			}
			if (isset($_POST['transport_date'])) {
				foreach ($_POST['transport_date'] as $key => $value) {
					$investigete = array(
						'id' => $this->m_bang->generate_id_investigate(),
						'bang_id' => $bang_id, 
						'transport_date' => $this->m_time->datepicker_to_unix($_POST['transport_date'][$key]),
						'transport_book' => $_POST['transport_book'][$key],
						'transport_property' => $_POST['transport_property'][$key],
						'transport_note' => $_POST['transport_note'][$key],
						'land_date' => $this->m_time->datepicker_to_unix($_POST['land_date'][$key]),
						'land_book' => $_POST['land_book'][$key],
						'land_property' => $_POST['land_property'][$key],
						'land_note' => $_POST['land_note'][$key],
						'sort_order' => $sort_order,
					);
					if (isset($_POST['transport_found'][$key])) {
						$investigete['transport_found']=$_POST['transport_found'][$key];
					}else{
						$investigete['transport_found']="n";
					}
					if (isset($_POST['land_found'][$key])) {
						$investigete['land_found']=$_POST['land_found'][$key];
					}else{
						$investigete['land_found']="n";
					}
					$this->m_bang->add_investigete($investigete);
					$sort_order+=1;
				}
			}

			$sort_order=1;
			if (isset($_POST['guarantee_old'])) {
				$sort_order=1;
				foreach ($_POST['guarantee_old'] as $key => $value) {
					$guarantee = array(
						'bang_id' => $bang_id, 
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
					$this->m_bang->update_guarantee($guarantee,$key);
					$sort_order+=1;
				}
			}


			if (isset($_POST['guarantee'])) {
				foreach ($_POST['guarantee'] as $key => $value) {
					$guarantee = array(
						'id' => $this->m_bang->generate_id_guarantee(),
						'bang_id' => $bang_id, 
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
					$this->m_bang->add_guarantee($guarantee);
					$sort_order+=1;
				}
			}
			if (isset($_POST['payment_date_old'])) {
				$sort_order=1;
				foreach ($_POST['payment_date_old'] as $key => $value) {
					$payment = array(
						'bang_id' => $bang_id, 
						'payment_bill_number' => $_POST['payment_bill_number_old'][$key],
						'payment_bill_fee' => $_POST['payment_bill_fee_old'][$key],
						'payment_officer' => $_POST['payment_officer_old'][$key],
						'payment_date' => $this->m_time->datepicker_to_unix($_POST['payment_date_old'][$key]),
						'sort_order' => $sort_order,
					);
					if (isset($_POST['payment_request_old'][$key])) {
						$payment['payment_request']=$_POST['payment_request_old'][$key];
					}else{
						$payment['payment_request']="n";
					}
					if (isset($_POST['payment_warrant_old'][$key])) {
						$payment['payment_warrant']=$_POST['payment_warrant_old'][$key];
					}else{
						$payment['payment_warrant']="n";
					}
					if (isset($_POST['payment_bill_old'][$key])) {
						$payment['payment_bill']=$_POST['payment_bill_old'][$key];
					}else{
						$payment['payment_bill']="n";
					}
					if (isset($_POST['payment_withdraw_old'][$key])) {
						$payment['payment_withdraw']=$_POST['payment_withdraw_old'][$key];
					}else{
						$payment['payment_withdraw']="n";
					}
					if (isset($_POST['payment_unwithdraw_old'][$key])) {
						$payment['payment_unwithdraw']=$_POST['payment_unwithdraw_old'][$key];
					}else{
						$payment['payment_unwithdraw']="n";
					}
					$this->m_bang->update_payment($payment,$key);
					$sort_order+=1;
				}
			}
			if (isset($_POST['payment_date'])) {
				foreach ($_POST['payment_date'] as $key => $value) {
					$payment = array(
						'id' => $this->m_bang->generate_id_appeal(),
						'bang_id' => $bang_id, 
						'payment_bill_number' => $_POST['payment_bill_number'][$key],
						'payment_bill_fee' => $_POST['payment_bill_fee'][$key],
						'payment_officer' => $_POST['payment_officer'][$key],
						'payment_date' => $this->m_time->datepicker_to_unix($_POST['payment_date'][$key]),
						'sort_order' => $sort_order,
					);
					if (isset($_POST['payment_request'][$key])) {
						$payment['payment_request']=$_POST['payment_request'][$key];
					}else{
						$payment['payment_request']="n";
					}
					if (isset($_POST['payment_warrant'][$key])) {
						$payment['payment_warrant']=$_POST['payment_warrant'][$key];
					}else{
						$payment['payment_warrant']="n";
					}
					if (isset($_POST['payment_bill'][$key])) {
						$payment['payment_bill']=$_POST['payment_bill'][$key];
					}else{
						$payment['payment_bill']="n";
					}
					if (isset($_POST['payment_withdraw'][$key])) {
						$payment['payment_withdraw']=$_POST['payment_withdraw'][$key];
					}else{
						$payment['payment_withdraw']="n";
					}
					if (isset($_POST['payment_unwithdraw'][$key])) {
						$payment['payment_unwithdraw']=$_POST['payment_unwithdraw'][$key];
					}else{
						$payment['payment_unwithdraw']="n";
					}
					
					$this->m_bang->add_payment($payment);
					$sort_order+=1;
				}
			}

			if (isset($_POST['extend_appeal_date_old'])) {
				$sort_order=1;
				foreach ($_POST['extend_appeal_date_old'] as $key => $value) {
					$appeal = array(
						'bang_id' => $bang_id, 
						'extend_appeal_note' => $_POST['extend_appeal_note_old'][$key],
						'extend_appeal_date' => $this->m_time->datepicker_to_unix($_POST['extend_appeal_date_old'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_bang->update_appeal($appeal,$key);
					$sort_order+=1;
				}
			}
			if (isset($_POST['extend_appeal_date'])) {
				foreach ($_POST['extend_appeal_date'] as $key => $value) {
					$appeal = array(
						'id' => $this->m_bang->generate_id_appeal(),
						'bang_id' => $bang_id, 
						'extend_appeal_note' => $_POST['extend_appeal_note'][$key],
						'extend_appeal_date' => $this->m_time->datepicker_to_unix($_POST['extend_appeal_date'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_bang->add_appeal($appeal);
					$sort_order+=1;
				}
			}

			if (isset($_POST['borrow_date_old'])) {
				$sort_order=1;
				foreach ($_POST['borrow_date_old'] as $key => $value) {
					$appeal = array(
						'bang_id' => $bang_id, 
						'types_of_credits' => $_POST['types_of_credits_old'][$key],
						'loan' => $_POST['loan_old'][$key],
						'interest_when_borrow' => $_POST['interest_when_borrow_old'][$key],
						'interest_when_sue' => $_POST['interest_when_sue_old'][$key],
						'borrow_date' => $this->m_time->datepicker_to_unix($_POST['borrow_date_old'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_bang->update_borrow($appeal,$key);
					$sort_order+=1;
				}
			}
			if (isset($_POST['borrow_date_i'])) {
				foreach ($_POST['borrow_date_i'] as $key => $value) {
					$appeal = array(
						'id' => $this->m_bang->generate_id_borrow(),
						'bang_id' => $bang_id, 
						'types_of_credits' => $_POST['types_of_credits_i'][$key],
						'loan' => $_POST['loan_i'][$key],
						'interest_when_borrow' => $_POST['interest_when_borrow_i'][$key],
						'interest_when_sue' => $_POST['interest_when_sue_i'][$key],
						'borrow_date' => $this->m_time->datepicker_to_unix($_POST['borrow_date_i'][$key]),
						'sort_order' => $sort_order,
					);
					
					$this->m_bang->add_borrow($appeal);
					$sort_order+=1;
				}
			}

			if (isset($_POST['withdraw_number_old'])) {
				$sort_order=0;
				foreach ($_POST['withdraw_number_old'] as $key => $value) {
					$sort_order+=1;
					$withdraw = array(
						'bang_id' => $bang_id, 
						'sort_order' => $sort_order,
					);
					
					$this->m_bang->update_withdraw($withdraw,$key);
					
				}
			}
				$bang=$this->m_bang->get_bang_by_id($bang_id);
				$sort_order=count($bang->withdraw);
			if (isset($_POST['withdraw_number'])) {
				foreach ($_POST['withdraw_number'] as $key => $value) {
					$sort_order+=1;
					$withdraw = array(
						'id' => $key,
						'bang_id' => $bang_id, 
						'sort_order' => $sort_order,
					);
					
					$this->m_bang->add_withdraw($withdraw);
				}
			}
			if (isset($_POST['withdraw_detail_old'])) {
				$sort_order_with=1;
				foreach ($_POST['withdraw_detail_old'] as $key => $value) {
					$withdraw_detail = array(
						'bang_id' => $bang_id, 
						'sort_order' => $sort_order_with,
						"withdraw_id" => $_POST['withdraw_id_old'][$key],
						"withdraw_detail" => $_POST['withdraw_detail_old'][$key],
						"price" => $_POST['price_old'][$key],
					);
					
					$this->m_bang->update_withdraw_detail($withdraw_detail,$key);
					$sort_order_with+=1;
				}
			}
			if (isset($_POST['withdraw_detail'])) {
				$sort_order_with=1;
				foreach ($_POST['withdraw_detail'] as $key => $value) {
					$withdraw_detail = array(
						'id' => $key,
						'bang_id' => $bang_id, 
						'sort_order' => $sort_order_with,
						"withdraw_id" => $_POST['withdraw_id'][$key],
						"withdraw_detail" => $_POST['withdraw_detail'][$key],
						"price" => $_POST['price'][$key],
					);
					
					$this->m_bang->add_withdraw_detail($withdraw_detail);
					$sort_order_with+=1;
				}
			}

			if (isset($_POST['sold_date_old'])) {
				$sort_order=1;
				foreach ($_POST['sold_date_old'] as $key => $value) {
					$sold = array(
						'bang_id' => $bang_id, 
						'sort_order' => $sort_order,
						"sold_date" => $this->m_time->datepicker_to_unix($_POST['sold_date_old'][$key]),
						"price_sold" => $_POST['price_sold_old'][$key],
						"sold_refrain_note" => $_POST['sold_refrain_note_old'][$key],
					);
					if (isset($_POST['sold_old'][$key])) {
						$sold['sold']=$_POST['sold_old'][$key];
					}else{
						$sold['sold']="n";
					}
					if (isset($_POST['unsold_old'][$key])) {
						$sold['unsold']=$_POST['unsold_old'][$key];
					}else{
						$sold['unsold']="n";
					}
					if (isset($_POST['sold_refrain_old'][$key])) {
						$sold['sold_refrain']=$_POST['sold_refrain_old'][$key];
					}else{
						$sold['sold_refrain']="n";
					}
					$this->m_bang->update_sold($sold,$key);
					$sort_order+=1;
				}
			}
			if (isset($_POST['sold_date'])) {
				foreach ($_POST['sold_date'] as $key => $value) {
					$sold = array(
						'id' => $key,
						'bang_id' => $bang_id, 
						'sort_order' => $sort_order,
						"sold_date" => $this->m_time->datepicker_to_unix($_POST['sold_date'][$key]),
						"price_sold" => $_POST['price_sold'][$key],
						"sold_refrain_note" => $_POST['sold_refrain_note'][$key],
					);
					if (isset($_POST['sold'][$key])) {
						$sold['sold']=$_POST['sold'][$key];
					}else{
						$sold['sold']="n";
					}
					if (isset($_POST['unsold'][$key])) {
						$sold['unsold']=$_POST['unsold'][$key];
					}else{
						$sold['unsold']="n";
					}
					if (isset($_POST['sold_refrain'][$key])) {
						$sold['sold_refrain']=$_POST['sold_refrain'][$key];
					}else{
						$sold['sold_refrain']="n";
					}
					$this->m_bang->add_sold($sold);
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
                        $item_id=$this->m_bang_item->generate_id();
                        $ext=explode(".", $value);
                        $new_ext=$ext[count($ext)-1];
                        $new_filename=$bang_id."_".$item_id."_".$ext[0].".".$new_ext;
                        $file = './media/temp/'.$value;
                        $newfile = './media/bang_item/'.$new_filename;
                        if (!is_dir('./media/bang_item/')) {
                                mkdir('./media/bang_item/');
                            }
                        $item_data = array(
                        'id' => $item_id, 
                        'sort_order' => $sort_order, 
                        'filepath' => $new_filename, 
                        'bang_id' => $bang_id, 
                        );
                        if (!copy($file, $newfile)) {
                            echo "failed to copy $file...\n".$file." to ".$newfile;
                            @unlink("./media/temp/".$value);
                            @unlink("./media/temp/thumbnail/".$value);
                        }else{
                            $this->m_bang_item->add_bang_item($item_data);
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
                        $this->m_bang_item->update_bang_item($item_data,$item_id);
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
			redirect("main/bang/1");
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
			//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
			//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
			//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
		}else{
			
			$this->load->view('header',$data);
			$this->load->view('bang_create',$data);
			$this->load->view('footer',$data);
		}	
	}
	public function add_guarantee()
	{
		$number=(int)$_POST['num']+1;
		$id=$this->m_bang->generate_id_guarantee();
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
		$id=$this->m_bang->generate_id_borrow();
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
		$id=$this->m_bang->generate_id_appeal();
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
	public function add_payment()
	{
		$number=(int)$_POST['num']+1;
		$id=$this->m_bang->generate_id_payment();
		?>
		<div class="col col-md-12 payment-child">
                  <div class="row">
                    <div class="col col-md-2 ">
                        <div class="form-group">
                          <label for="name">ครั้งที่ <?=$number?></label>                          
                        </div>
                    </div>
                    <div class="col col-md-4 ">
                        <div class="form-group">
                          <label for="name">วันที่วางเงิน</label>
                          <input type="text" class="form-control datepicker" name="payment_date[<?=$id?>]" placeholder="" >                  
                        </div>
                    </div>
                    <button type="button" class="btn btn-success del_payment" del-id="<?=$id?>">X</button>
                  </div>
                  <div class="row">
                    <div class="col col-md-4">
                      <div class="form-group">
                        <label for="name">เลขที่ใบเสร็จ </label>
                        <input type="text" class="form-control" id="" name="payment_bill_number[<?=$id?>]" >
                      </div>
                    </div> 
                    <div class="col col-md-4">
                      <div class="form-group">
                        <label for="name">ค่าธรรมเนียม </label>
                        <input type="text" class="form-control" id="" name="payment_bill_fee[<?=$id?>]" >
                      </div>
                    </div>                      
                  </div>
                  <div class="row">
                    <div class="col col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_request[<?=$id?>]" id="" value="y" >
                            <label class="form-check-label" >
                              คำร้องขอวางเงิน
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_warrant[<?=$id?>]" id="" value="y" >
                            <label class="form-check-label" >
                              หมายวางเงิน
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_bill[<?=$id?>]" id="" value="y" >
                            <label class="form-check-label" >
                              ใบเสร็จ
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_withdraw[<?=$id?>]" id="" value="y" >
                            <label class="form-check-label" >
                              เบิกวางเงินแล้ว
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="payment_unwithdraw[<?=$id?>]" id="" value="y" >
                            <label class="form-check-label" >
                              ยังไม่เบิกวางเงิน
                            </label>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col col-md-4">
                      <div class="form-group">
                        <label for="name">ผู้รับผิดชอบ</label>
                        <input type="text" class="form-control" id="" name="payment_officer[<?=$id?>]" >
                      </div>
                    </div>                      
                  </div>
                        
                </div>
		<?
		
	}
	public function add_investigate()
	{
		$number=(int)$_POST['num']+1;
		$id=$this->m_bang->generate_id_investigate();
		?>
		<div class="col col-md-12 investigate-child">
                  <div class="row">
                    <div class="col col-md-6">
                      <h5>ขนส่ง</h5>
                    </div>
                    <div class="col col-md-6">
                      <h5>ที่ดิน</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col col-md-6">
                      <div class="form-group">
                        <label for="name">จำเลยที่ <?=$number?> </label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="transport_found[<?=$id?>]" id="" value="y" >
                            <label class="form-check-label" >
                              พบ
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="transport_found[<?=$id?>]" id="" value="n" >
                            <label class="form-check-label" >
                              ไม่พบ
                            </label>
                          </div> 
                      </div>
                    </div>
                    <div class="col col-md-6">
                      <div class="form-group">
                        <label for="name">จำเลยที่ <?=$number?> </label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="land_found[<?=$id?>]" id="" value="y" >
                            <label class="form-check-label" >
                              พบ
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="land_found[<?=$id?>]" id="" value="n">
                            <label class="form-check-label" >
                              ไม่พบ
                            </label>
                          </div> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col col-md-6 ">
                              <div class="form-group">
                                <label for="name">วันที่สืบ</label>
                                <input type="text" class="form-control datepicker" name="transport_date[<?=$id?>]" placeholder="" >                  
                              </div>
                              <div class="form-group">
                                <label for="name">เลขหนังสือ</label>
                                <input type="text" class="form-control" name="transport_book[<?=$id?>]" placeholder="" >
                              </div>
                              <div class="form-group">
                                <label for="name">ทรัพย์ที่พบ</label>
                                <input type="text" class="form-control" name="transport_property[<?=$id?>]" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="name">หมายเหตุ</label>
                                <textarea class="form-control" name="transport_note[<?=$id?>]" style="width: 100%;height: 60px;"></textarea>         
                              </div>
                          </div>
                          <div class="col col-md-6 ">
                              <div class="form-group">
                                <label for="name">วันที่สืบ</label>
                                <input type="text" class="form-control datepicker" name="land_date[<?=$id?>]" placeholder="" >                  
                              </div>
                              <div class="form-group">
                                <label for="name">เลขหนังสือ</label>
                                <input type="text" class="form-control" name="land_book[<?=$id?>]" placeholder="" >
                              </div>
                              <div class="form-group">
                                <label for="name">ทรัพย์ที่พบ</label>
                                <input type="text" class="form-control" name="land_property[<?=$id?>]" placeholder="" >
                              </div>
                              <div class="form-group">
                                <label for="name">หมายเหตุ</label>
                                <textarea class="form-control" name="land_note[<?=$id?>]" style="width: 100%;height: 60px;"></textarea>         
                              </div>
                          </div>
                          <button type="button" class="btn btn-success del_investigate" del-id="<?=$id?>">X</button>
                        </div>
                        
                    </div>
		<?
		
	}
	public function add_withdraw()
	{
		$number=(int)$_POST['num']+1;
		$id=$this->m_bang->generate_id_withdraw();
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
		$id=$this->m_bang->generate_id_withdraw_detail();
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
		$id=$this->m_bang->generate_id_sold();
		?>
		<div class="col col-md-12 sold-child">
                  <div class="row">
                    <div class="col col-md-2 ">
                        <div class="form-group">
                          <label for="name">ประกาศขาย นัดที่ <?=$number?></label>
                          <input type="text" class="form-control datepicker" name="sold_date[<?=$id?>]" placeholder="" >                   
                        </div>
                    </div>
                    <div class="col col-md-2 ">
                      <div class="form-group">
                        <label for="name">การขาย</label>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="sold[<?=$id?>]" id="exampleRadios1" value="y" >
                          <label class="form-check-label" >
                            ขายได้
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="unsold[<?=$id?>]" id="exampleRadios1" value="y" >
                          <label class="form-check-label" >
                            ขายไม่ได้
                          </label>
                        </div>                 
                      </div>
                    </div>
                    <div class="col col-md-3 ">
                      <div class="form-group">
                        <label for="name">จำนวนเงิน</label>
                        <input type="text" class="form-control" name="price_sold[<?=$id?>]" placeholder="" >           
                      </div>
                    </div>
                    <div class="col col-md-3 ">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="sold_refrain[<?=$id?>]" id="exampleRadios1" value="y" >
                          <label class="form-check-label" >
                            งด
                          </label>
                        </div>                 
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="sold_refrain_note[<?=$id?>]" placeholder="" >           
                      </div>
                    </div>
                    <button type="button" class="btn btn-success del_sold" del-id="<?=$id?>">X</button>
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
