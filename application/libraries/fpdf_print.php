<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('./assets/fpdf17/fpdf.php');
class Fpdf_print extends FPDF
{
// Page header
/*public function Header()
{
    // Logo
    $thaiMon = array( "01" => "มกราคม", "02" => "กุมภาพันธ์", "03" => "มีนาคม", "04" => "เมษายน",
                  "05" => "พฤษภาคม","06" => "มิถุนายน", "07" => "กรกฎาคม", "08" => "สิงหาคม",
                  "09" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤศจิกายน", "12" => "ธันวาคม");
	
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','','angsa.php');
	 
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','B','angsab.php');
	 
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','I','angsai.php');
	 
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','BI','angsaz.php');
    //$this->Image('images/logo.jpg',10,6,30);
    // Arial bold 15
    $this->SetFont('angsana','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,iconv( 'UTF-8','cp874' , "นัดหมายประจำ"." วันที่ "),0,0,'C');
    // Line break
    $this->Ln(20);
}*/

// Page footer
public function Footer()
{
    // Position at 1.5 cm from bottom
    // เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','','angsa.php');
	 
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','B','angsab.php');
	 
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','I','angsai.php');
	 
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','BI','angsaz.php');
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('angsana','I',8);
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}