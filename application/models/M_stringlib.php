<?php
class M_stringlib extends CI_Model {
 
    public function __construct(){
	date_default_timezone_set('Asia/Bangkok');
        parent::__construct();
        $this->province_type=array("เลือกจังหวัด","กระบี่","กรุงเทพมหานคร","กาญจนบุรี","กาฬสินธุ์","กำแพงเพชร","ขอนแก่น","จันทบุรี","ฉะเชิงเทรา","ชลบุรี","ชัยนาท","ชัยภูมิ","ชุมพร","เชียงราย","เชียงใหม่","ตรัง","ตราด","ตาก","นครนายก","นครปฐม","นครพนม","นครราชสีมา","นครศรีธรรมราช","นครสวรรค์","นนทบุรี","นราธิวาส","น่าน","บุรีรัมย์","บึงกาฬ","ปทุมธานี","ประจวบคีรีขันธ์","ปราจีนบุรี","ปัตตานี","พระนครศรีอยุธยา","พะเยา","พังงา","พัทลุง","พิจิตร","พิษณุโลก","เพชรบุรี","เพชรบูรณ์","แพร่","ภูเก็ต","มหาสารคาม","มุกดาหาร","แม่ฮ่องสอน","ยโสธร","ยะลา","ร้อยเอ็ด","ระนอง","ระยอง","ราชบุรี","ลพบุรี","ลำปาง","ลำพูน","เลย","ศรีสะเกษ","สกลนคร","สงขลา","สตูล","สมุทรปราการ","สมุทรสงคราม","สมุทรสาคร","สระแก้ว","สระบุรี","สิงห์บุรี","สุโขทัย","สุพรรณบุรี","สุราษฎร์ธานี","สุรินทร์","หนองคาย","หนองบัวลำภู","อ่างทอง","อำนาจเจริญ","อุดรธานี","อุตรดิตถ์","อุทัยธานี","อุบลราชธานี");
                                                                    
	}
	
	public function useMD5($str1, $str2) {
		return hash("MD5", $str1 . $str2, FALSE);
	}
	
	public function uniqueNum10 () {
		$random = substr(number_format(time() * rand(),0,'',''),0,10);
		return $random;
	}
	
	public function uniqueNum6 () {
		$random = substr(number_format(time() * rand(),0,'',''),0,6);
		return $random;
	}
	public function uniqueAlphaNum6 () {
		$random = substr(md5(time() * rand()),0,6);
		return $random;
	}
	
	public function uniqueAlphaNum10 () {
		$random = substr(md5(time() * rand()),0,10);
		return $random;
	}
	
	public function uniqueAlphaNum20 () {
		$random = substr(md5(time() * rand()),0,20);
		return $random;
	}
	
	
	
	function timeAgo ($time){
	    $time = time() - $time; // to get the time since that moment
	    $tokens = array (
		31536000 => $this->lang->line('yearsAgo'),
		2592000 => $this->lang->line('monthsAgo'),
		604800 => $this->lang->line('weeksAgo'),
		86400 => $this->lang->line('daysAgo'),
		3600 => $this->lang->line('hoursAgo'),
		60 => $this->lang->line('minutesAgo'),
		1 => $this->lang->line('secondsAgo')
	    );
	    foreach ($tokens as $unit => $text) {
		if ($time < $unit) continue;
		$numberOfUnits = floor($time / $unit);
		//echo $numberOfUnits.' '.$text.' ';
		if($time > 86400 && $time < 172800){
		    return $this->lang->line('yesterday');
		}
		else{
		    return $numberOfUnits.' '.$text/*.(($numberOfUnits>1)?'s':'')*/;
		}
	    }
	}	
	
	function month_word_to_int($month){
	    $_month['Jan']	=	1;
	    $_month['Feb']	=	2;
	    $_month['Mar']	=	3;
	    $_month['Apr']	=	4;
	    $_month['May']	=	5;
	    $_month['Jun']	=	6;
	    $_month['Jul']	=	7;
	    $_month['Aug']	=	8;
	    $_month['Sep']	=	9;
	    $_month['Oct']	=	10;
	    $_month['Nov']	=	11;
	    $_month['Dec']	=	12;
	    return substr($month,7,4).'-'.$_month[substr($month,3,3)].'-'.substr($month,0,2);
	}
	
}
?>