<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lawprint_content extends CI_Controller {

	public function __construct() {
        parent::__construct();      
        $this->load->model('m_admin');   
        $this->load->model('m_aom');
        $this->load->model('m_aom_item'); 
        $this->load->model('m_time');
        $this->load->model('m_stringlib');   
        $this->load->model('m_section4');
        $this->load->model('m_lawyer');
        $this->load->library('Sue_consumer');
        $this->thNum = array("0" => "๐","1" => "๑","2" => "๒","3" => "๓","4" => "๔","5" => "๕","6" => "๖","7" => "๗","8" => "๘","9" => "๙",0 => "๐",1 => "๑",2 => "๒",3 => "๓",4 => "๔",5 => "๕",6 => "๖",7 => "๗",8 => "๘",9 => "๙",);
        
    }
	public function index()
	{
		
	}
	public function sue_consumer_content()
	{
		?>
		<div>asdasdsa<br>
			<div>2222232323</div>
			<?=site_url("lawprint/sue_consumer_content")?>
		</div>
		<?
	}
}
