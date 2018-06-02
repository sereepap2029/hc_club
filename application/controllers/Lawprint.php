<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lawprint extends CI_Controller {

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
        if ($this->session->userdata('id')) {
            $user_data = $this->m_admin->get_admin_by_id($this->session->userdata('id'));
            if (isset($user_data->username)&&isset($user_data->perm['print'])) {
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
	public function test(){
		// create new PDF document
		$pdf = new Sue_consumer(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('คำฟ้องคดีผู้บริโภค');
		$pdf->SetSubject('คำฟ้องคดีผู้บริโภค');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(K_PATH_LANG.'eng.php')) {
			require_once(K_PATH_LANG.'eng.php');
			$pdf->setLanguageArray($l);
		}


		// set font
		$pdf->SetFont('cordiaupc', '', 18);
		// add a page
		$pdf->AddPage();

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
		$pdf->SetFillColor(255, 255, 127);
$pdf->SetAbsXY(10,20);
$pdf->MultiCell(20, 5, '<img src="'.site_url("images/circle.png").'">', 0, 'L', 0, 0, '', '', true,0,true);
$pdf->SetAbsXY(10,10);
$txt = "\n".'       บัญชีพยาน';
$pdf->MultiCell(60, 5, ''.$txt, 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(40, 5, '<img src="'.site_url("images/crut.png").'">', 0, 'L', 0, 0, '', '', true,0,true);

$txt = ''."\n"."\n"."\n"."\n".'คดีหมายเลขดำที่ ___________ / ________'."\n".'คดีหมายเลขแดงที่ __________ / ________';
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 1, '', '', true);
$pdf->SetAbsXY(145,41);
$pdf->SetFont('angsanaupc', '', 18);
$txt = "zs 2234";
$pdf->MultiCell(25, 5, $txt, 0, 'L', 0, 0, '', '', true);
$txt = "2550";
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 0, '', '', true);
$pdf->SetAbsXY(145,49);
$txt = "zs 2234";
$pdf->MultiCell(25, 5, $txt, 0, 'L', 0, 0, '', '', true);
$txt = "2550";
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 1, '', '', true);

$pdf->SetFont('cordiaupc', '', 18);
$txt = ''."\n".'ศาล __________________________________________'.
"\n".'วันที่ ______ เดือน _____________ พุทธศักราช _________'."\n"." ความ _____________________________________";
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->SetAbsXY(115,64);
$pdf->SetFont('angsanaupc', '', 18);
$txt = "จังหวัดมหาสารคาม";
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 0, '', '', true);
$pdf->SetAbsXY(110,72);
$txt = "25";
$pdf->MultiCell(26, 5, $txt, 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(48, 5, "มกราคม", 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(0, 5, "2556", 0, 'L', 0, 0, '', '', true);
$pdf->SetAbsXY(125,80);
$pdf->MultiCell(28, 5, "แพ่ง", 0, 'L', 0, 1, '', '', true);

$pdf->SetAbsXY(20,116);
$pdf->SetFont('cordiaupc', '', 18);
$txt = 'ระหว่าง';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$pdf->SetAbsXY(36,106.4);
$pdf->MultiCell(70, 10, '<img src="'.site_url("images/leftbrance.png").'">', 0, 'L', 0, 0, '', '', true,0,true);

$pdf->SetAbsXY(0,100);
$txt = '___________________________________________________________________ โจทก์';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->SetAbsXY(45,98);
$pdf->SetFont('angsanaupc', '', 18);
$txt = 'ธนาคารออมสิน';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);



$pdf->SetAbsXY(45,116);
$txt = 'นางสุภาพรรณ  วงศ์สินอุดม  ที่ 1  ,   นายทองม้วน พักตรคุย  ที่ 2'."\n".'นางสนม  นราโต ที่ 3';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$pdf->SetAbsXY(0,128.5);
$pdf->SetFont('cordiaupc', '', 18);
$txt = '___________________________________________________________________ จำเลย';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);

$pdf->SetXY(20,145);
$txt = 'ข้าพเจ้า ___________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ขอระบุพยานของข้าพเจ้ารวม  ______  อันดับ  ตามบัญชีตารางข้างล่างนี้ ';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$pdf->MultiCell(0, 5,"", 0, 'L', 0, 1, '' ,'', true);

// table
$pdf->MultiCell(8, 5,"อันดับ", 1, 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(40, 5,"ชื่อพยาน\n ", 1, 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(30, 5,"บ้านเลขที่ หมู่ที่ ถนน ตรอก/ซอย", 1, 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(18, 5,"ใกล้เคียง\n ", 1, 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(23, 5,"ตำบล/แขวง\n ", 1, 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(22, 5,"อำเภอ/เขต\n ", 1, 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(15, 5,"จังหวัด\n ", 1, 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(20, 5,"หมายเหตุ\n ", 1, 'C', 0, 1, '' ,'', true);
for ($i=1; $i <= 6; $i++) { 
	$pdf->MultiCell(8, 13,$i, 1, 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(40, 13,"", 1, 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(30, 13,"", 1, 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(18, 13,"", 1, 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(23, 13,"", 1, 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(22, 13,"", 1, 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(15, 13,"", 1, 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(20, 13,"นำ", 1, 'C', 0, 1, '' ,'', true, 0, false, true, 40);
}
$txt = "\n".'___________________________________ ผู้ระบุ';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->SetFont('angsanaupc', '', 18);
$txt = 'นางอัจฉรา  ม้วนโคกสูง';
$pdf->MultiCell(165, 5,$txt, 0, 'R', 0, 0, '' ,'', true);
$pdf->SetFont('cordiaupc', '', 18);
$txt = '(พลิก)';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 0, '' ,'', true);


$pdf->SetXY(40,144);
$pdf->SetFont('angsanaupc', '', 18);
$txt = 'ธนาคารออมสิน';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '16';
$pdf->MultiCell(55, 5,"", 0, 'L', 0, 0, '' ,'', true);
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);

$pdf->SetXY(20,185);
$txt = 'นายนิติพจน์  พละไกร ธนาคารออมสิน ถ.นครสวรรค์ ต.ตลาด อ.เมือง จ.มหาสารคาม';
$pdf->MultiCell(10, 5,"", 0, 'L', 0, 0, '' ,'', true);
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);

$pdf->SetXY(20,198);
$txt = 'นายนิติพจน์  พละไกร ธนาคารออมสิน ถ.นครสวรรค์ ต.ตลาด อ.เมือง จ.มหาสารคาม';
$pdf->MultiCell(10, 5,"", 0, 'L', 0, 0, '' ,'', true);
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);

		//Close and output PDF document
		$pdf->Output('example_003.pdf', 'I');
		
		// ---------------------------------------------------------
	}
















	public function Sue_consumer()
	{
		

		// create new PDF document
		$pdf = new Sue_consumer(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('คำฟ้องคดีผู้บริโภค');
		$pdf->SetSubject('คำฟ้องคดีผู้บริโภค');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(K_PATH_LANG.'eng.php')) {
			require_once(K_PATH_LANG.'eng.php');
			$pdf->setLanguageArray($l);
		}

		
		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('cordiaupc', '', 18);
		// add a page
		$pdf->AddPage();

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
		$pdf->SetFillColor(255, 255, 127);
$txt = "\n".'(แบบ ผบ.๑)'."\n".'คำฟ้องคดีผู้บริโภค';
$pdf->MultiCell(55, 5, ''.$txt, 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(40, 5, '<img src="'.site_url("images/crut.png").'">', 0, 'L', 0, 0, '', '', true,0,true);

$txt = ''."\n"."\n"."\n"."\n".'คดีหมายเลขดำที่ ___________ / ________'."\n".'คดีหมายเลขแดงที่ __________ / ________';
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 1, '', '', true);
$pdf->SetAbsXY(150,41);
$pdf->SetFont('angsanaupc', '', 18);
$txt = "zs 2234";
$pdf->MultiCell(25, 5, $txt, 0, 'L', 0, 0, '', '', true);
$txt = "2550";
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 0, '', '', true);
$pdf->SetAbsXY(150,49);
$txt = "zs 2234";
$pdf->MultiCell(25, 5, $txt, 0, 'L', 0, 0, '', '', true);
$txt = "2550";
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 1, '', '', true);

$pdf->SetFont('cordiaupc', '', 18);
$txt = ''."\n".'ศาล __________________________________________'.
"\n".'วันที่ ______ เดือน _____________ พุทธศักราช _________'."\n"." ความ _____________________________________";
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->SetAbsXY(115,64);
$pdf->SetFont('angsanaupc', '', 18);
$txt = "จังหวัดมหาสารคาม";
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 0, '', '', true);
$pdf->SetAbsXY(105,72);
$txt = "25";
$pdf->MultiCell(26, 5, $txt, 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(48, 5, "มกราคม", 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(0, 5, "2556", 0, 'L', 0, 0, '', '', true);
$pdf->SetAbsXY(125,80);
$pdf->MultiCell(28, 5, "แพ่ง", 0, 'L', 0, 1, '', '', true);

$pdf->SetAbsXY(20,116);
$pdf->SetFont('cordiaupc', '', 18);
$txt = 'ระหว่าง';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$pdf->SetAbsXY(36,106.4);
$pdf->MultiCell(70, 10, '<img src="'.site_url("images/leftbrance.png").'">', 0, 'L', 0, 0, '', '', true,0,true);

$pdf->SetAbsXY(0,100);
$txt = '___________________________________________________________________ โจทก์';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->SetAbsXY(45,98);
$pdf->SetFont('angsanaupc', '', 18);
$txt = 'ธนาคารออมสิน';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);



$pdf->SetAbsXY(45,116);
$txt = 'นางสุภาพรรณ  วงศ์สินอุดม  ที่ 1  ,   นายทองม้วน พักตรคุย  ที่ 2'."\n".'นางสนม  นราโต ที่ 3';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$pdf->SetAbsXY(0,128.5);
$pdf->SetFont('cordiaupc', '', 18);
$txt = '__________________________________________________________________ จำเลย';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);

$pdf->SetAbsXY(20,145);
$txt = 'เรื่อง        __________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'จำนวนทุนทรัพย์ ______________________________ บาท _________________________ สตางค์';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '            ข้าพเจ้า ____________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '___________________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'เชื้อชาติ ____________________ สัญชาติ ____________________ อาชีพ ______________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'เลขประจำตัวประชาชน';
$pdf->MultiCell(45, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$pdf->MultiCell(80, 5, '<img src="'.site_url("images/citicen_id.png").'">', 0, 'L', 0, 0, '', '', true,0,true);
$txt = 'อยู่บ้านเลขที่ ____________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$pdf->SetAbsXY(0,143);
$pdf->SetFont('angsanaupc', '', 18);
$txt = 'กู้ยืมเงิน , ค้ำประกัน';
$pdf->MultiCell(0, 5,$txt, 0, 'C', 0, 1, '' ,'', true);
$pdf->SetAbsXY(60,152);
$txt = '3,000,000';
$pdf->MultiCell(85, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$txt = '00';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '                            ธนาคารออมสิน';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'โจทก์';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->SetAbsXY(50,175);
$txt = '-';
$pdf->MultiCell(50, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$txt = 'ไทย';
$pdf->MultiCell(50, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$txt = 'ธนาคาร';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$pdf->SetAbsXY(175,184);
$txt = '470';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);

$pdf->SetAbsXY(20,196);
$pdf->SetFont('cordiaupc', '', 18);
$txt = 'หมู่ที่ _____________ ถนน ____________ ตรอก/ซอย _____________ ใกล้เคียง _________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ตำเบล/แขวง _________________ อำเภอ/เขต _________________ จังหวัด _____________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'โทรศัพท์ ________________ โทรสาร _______________ จดหมายอิเล็กทรอนิกส์ _________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'สถานที่ติดต่อ _______________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ขอยื่นฟ้อง __________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '_____________________________________________________________________________ จำเลย';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'เชื้อชาติ _______________ สัญชาติ ______________ อาชีพ ________________ อายุ __________ ปี';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'อยู่บ้านเลขที่ __________________ หมู่ที่ ____________________ ถนน _______________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ตรอก/ซอย __________________ ใกล้เคียง __________________ ตำบล/แขวง __________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'อำเภอ/เขต __________________ จังหวัด ____________________ โทรศัพท์ ____________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'โทรสาร ____________ จดหมายอิเล็กทรอนิกส์ _______________ มีข้อความตามที่จะกล่าวต่อไปนี้';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$pdf->SetAbsXY(10,195);
$pdf->SetFont('angsanaupc', '', 18);
$txt = '                             -                            พหลโยธิน                                      -                                    -';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '                           ห้วยขวาง                                            ห้วยขวาง                                 กรุงเทพมหานคร';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '-';
$pdf->MultiCell(30, 5,"", 0, 'L', 0, 0, '' ,'', true);
$pdf->MultiCell(50, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$txt = '-';
$pdf->MultiCell(70, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$txt = '-';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '                        นางอัจฉรา  ม้วนโคกสูง    โทรศัพท์     043 - 711781  ,  081 - 8718778';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '                        นางสุภาพรรณ  วงศ์สินอุดม  ที่ 1 , นายทองม้วน พักตรคุย  ที่ 2';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'นางสนม  นราโต ที่ 3';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '                 (1-3)  ไทย                                 (1-3)  ไทย                             (1-3)  -                    (1-3 )  -';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);

$txt = '1)มีคำสั่งยกเลิก 14/3/2559,2)29,3)186';
$pdf->MultiCell(23, 5,"", 0, 'L', 0, 0, '' ,'', true,2);
$pdf->Cell(40, 5, $txt, 0, 0, 'L', 0, '', 1);
$pdf->MultiCell(9, 5,"", 0, 'L', 0, 0, '' ,'', true,2);
$txt = '(1-2)  13 , 3)  13----------------------------';
$pdf->Cell(42, 5, $txt, 0, 0, 'L', 0, '', 1);
$pdf->MultiCell(11, 5,"", 0, 'L', 0, 0, '' ,'', true,2);
$txt = '(1 - 3) ------------------------------';
$pdf->Cell(42, 5, $txt, 0, 1, 'L', 0, '', 1);

$pdf->MultiCell(20, 5,"", 0, 'L', 0, 0, '' ,'', true,2);
$txt = '(1 - 3) -------------------------------';
$pdf->Cell(40, 5, $txt, 0, 0, 'L', 0, '', 1);
$pdf->MultiCell(14, 5,"", 0, 'L', 0, 0, '' ,'', true,2);
$txt = '(1 - 3) -------------------------------';
$pdf->Cell(40, 5, $txt, 0, 0, 'L', 0, '', 1);
$pdf->MultiCell(20, 5,"", 0, 'L', 0, 0, '' ,'', true,2);
$txt = '(1 - 3) บรบือ--------------------------';
$pdf->Cell(40, 5, $txt, 0, 1, 'L', 0, '', 1);

$pdf->MultiCell(20, 5,"", 0, 'L', 0, 0, '' ,'', true,2);
$txt = '(1 - 3) บรบือ-------------------------';
$pdf->Cell(40, 5, $txt, 0, 0, 'L', 0, '', 1);
$pdf->MultiCell(12, 5,"", 0, 'L', 0, 0, '' ,'', true,2);
$txt = '(1 - 3) มหาสารคาม-----------------------';
$pdf->Cell(42, 5, $txt, 0, 0, 'L', 0, '', 1);
$pdf->MultiCell(16, 5,"", 0, 'L', 0, 0, '' ,'', true,2);
$txt = '(1 - 3) -------------------------------';
$pdf->Cell(45, 5, $txt, 0, 1, 'L', 0, '', 1);

$pdf->MultiCell(15, 5,"", 0, 'L', 0, 0, '' ,'', true,2);
$txt = '(1 - 3) ------------------------';
$pdf->Cell(26, 5, $txt, 0, 0, 'L', 0, '', 1);
$pdf->MultiCell(40, 5,"", 0, 'L', 0, 0, '' ,'', true,2);
$txt = '(1 - 3) --------------------------';
$pdf->Cell(32, 5, $txt, 0, 1, 'L', 0, '', 1);
	





	// set font
		$pdf->SetFont('cordiaupc', '', 18);
		// add a page Page 2
		$pdf->AddPage();

$txt = 'หน้า ๒';
$pdf->MultiCell(0, 0, ''.$txt, 0, 'C', 0, 1, '', '', true);

$pdf->SetFont('angsanaupc', '', 18);
$pdf->SetAbsXY(20,20);
$txt ='               ข้อ ๑. โจทก์เป็นนิติบุคคลตามพระราชบัญญัติธนาคารออมสิน พ.ศ.2489  มีวัตถุ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ประสงค์เพื่อส่งเสริมสวัสดิภาพแห่งสังคมในทางทรัพย์สิน   โดยการประกอบธุรกิจในการรับฝากเงิน';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ออกพันธบัตรและสลากออมสิน  ซื้อขายบัตรรัฐบาลไทย  ลงทุนเพื่อแสวงหาผลประโยชน์ซึ่งรัฐมนตรี';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ="อนุญาต   รวมทั้งการให้กู้เงินสินเชื่อประเภทต่างๆ   อันเป็นธุรกิจของโจทก์   อยู่ในความควบคุมของ";
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='กระทรวงการคลังและได้รับยกเว้นอากรแสตมป์ตามประมวลรัษฎากร  โดยกำหนดให้ผู้อำนวยการเป็น';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ผู้บริหารธนาคารในฐานะผู้จัดการมีอำนาจและหน้าที่ดำเนินกิจการให้เป็นไปตามประมวลกฎหมาย กฎ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='และข้อบังคับของโจทก์ โจทก์มีนายชาติชาย  พยุหนาวีชัย ผู้อำนวยการธนาคารออมสิน มีอำนาจบริหาร';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='หรือเป็นผู้กระทำการในนามของธนาคารออมสินหรือเป็นผู้แทนของธนาคารออมสินและมีอำนาจมอบ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='อำนาจให้พนักงานของโจทก์หรือบุคคลอื่นกระทำการแทนได้ รายละเอียดปรากฏตามบันทึกข้อความ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ที่ กค 0803.2/1797  เอกสารท้ายคำฟ้องหมายเลข 1  ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');

$txt ='               ในการฟ้องและดำเนินคดีนี้นายชาติชาย  พยุหนาวีชัย ผู้อำนวยการธนาคารออมสิน';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ได้มอบอำนาจให้นางสุนันท์ เสทือนวงษ์เป็นผู้ดำเนินคดีแทนโจทก์และให้มีอำนาจมอบอำนาจช่วงได้ซึ่ง';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='นางสุนันท์ เสทือนวงษ์ผู้รับมอบอำนาจได้มอบอำนาจช่วงให้นายอภิวิชญ์  พรภัทรเดชเป็นผู้มีอำนาจ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ="ดำเนินคดีนี้แทนโจทก์และให้มีอำนาจมอบอำนาจช่วงได้ด้วยซึ่งนายอภิวิชญ์  พรภัทรเดชได้มอบอำนาจ";
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ช่วงให้ นายกชกร ตัณฑสิทธิ์และ/หรือนายนิติพจน์  พละไกร และ/หรือนางอัจฉรา  ม้วนโคกสูง และ/หรือ';
$pdf->MultiCell(178, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='นางละมูล  โตนดไธสง เป็นผู้มีอำนาจฟ้องและดำเนินคดีต่าง ๆ แทนโจทก์ รายละเอียดปรากฏตามหนังสือ  ';
$pdf->MultiCell(178, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='มอบอำนาจ เอกสารท้ายคำฟ้องหมายเลข 2  ถึงเอกสารท้ายคำฟ้องหมายเลข 4  ตามลำดับ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');

$txt ='               ข้อ 2. เมื่อวันที่ 21 มีนาคม 2554  จำเลยได้ทำสัญญากู้ยืมเงินประเภทสินเชื่อ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ธนาคารประชาชน  ไปจากโจทก์ที่ธนาคารออมสิน สาขาบรบือ  ซึ่งเป็นสาขาหนึ่งของโจทก์ เป็น';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='จำนวนเงิน 100,000.00 บาท ซึ่งจำเลยได้รับเงินกู้จำนวนดังกล่าวไปจากโจทก์ครบถ้วนแล้วและจำเลย';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ="ตกลงยินยอมเสียดอกเบี้ยให้โจทก์ในอัตราดอกเบี้ยเงินกู้ขั้นต่ำประเภทเงินกู้ที่มีระยะเวลา (MLR) ที่ ";
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='โจทก์ประกาศกำหนด 0.75  ต่อปี ในวันทำสัญญาโจทก์ประกาศกำหนด MLR เท่ากับ 0.75  ต่อปี  และ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='จำเลยตกลงว่าภายหลังจากทำสัญญาหากโจทก์ได้ประกาศเปลี่ยนแปลงอัตราดอกเบี้ยดังกล่าวให้สูงขึ้น';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='หรือต่ำลงกว่าในขณะทำสัญญา   จำเลยยินยอมให้โจทก์คิดดอกเบี้ยตามสัญญานี้ได้ในอัตราดอกเบี้ย ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ตามที่โจทก์ได้ประกาศใช้บังคับใหม่ได้ทันทีที่มีการประกาศเปลี่ยนแปลงดอกเบี้ยทุกครั้ง   โดยโจทก์';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ไม่ต้องแจ้งการเปลี่ยนแปลงอัตราดอกเบี้ยให้จำเลย  ทราบแต่อย่างใดและให้ถือปฏิบัติเช่นนี้ตลอดไป';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');









// set font
		$pdf->SetFont('cordiaupc', '', 18);
		// add a page Page 3
		$pdf->AddPage();
$txt = '( ๔๐ ก.)';
$pdf->MultiCell(30, 0, ''.$txt, 0, 'C', 0, 0, '', '', true);
$txt = 'หน้า ๓';
$pdf->MultiCell(0, 0, ''.$txt, 0, 'C', 0, 1, '', '', true);
$pdf->SetFont('angsanaupc', '', 18);
$pdf->SetAbsY(20);
$txt ='จนกว่าจำเลย จะชำระหนี้ให้โจทก์จนครบถ้วนและจำเลย  สัญญาว่าจะชำระต้นเงินพร้อมดอกเบี้ย';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='เป็นรายเดือน เดือนละไม่น้อยกว่า 2,417.00   บาท โดยกำหนดชำระภายในวันที่ 21  ของทุกเดือน ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='เริ่มชำระงวดแรกในเดือนเมษายน 2554 และจำเลยสัญญาว่าจะชำระหนี้เงินกู้ทั้งหมดให้เสร็จสิ้นภายใน';
$pdf->MultiCell(178, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ="วันที่ 21 มีนาคม 2559   หรือไม่เกินกว่ากำหนดเวลาที่โจทก์ผ่อนผันให้และถ้าจำเลย ผิดนัดชำระหนี้";
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='เงินต้นและหรือดอกเบี้ยงวดหนึ่งงวดใดหรือผิดสัญญาข้อหนึ่งข้อใดให้ถือว่าจำเลยผิดนัดชำระหนี้ทั้ง';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='หมดและยินยอมให้โจทก์คิดดอกเบี้ยในระหว่างที่จำเลยผิดนัดในอัตราไม่เกินอัตราดอกเบี้ยสูงสุดที่';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='โจทก์จะพึงเรียกได้โดยชอบด้วยกฎหมายหรือในอัตราดอกเบี้ยผิดนัดตามประกาศของโจทก์ เมื่อจำเลย';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ผิดสัญญาข้อ 1. ข้อ 3.  ข้อ 4. ข้อ 6.  ข้อ 7.   ไม่ว่าข้อหนึ่งข้อใดโจทก์จะต้องแจ้งเป็นหนังสือบอกกล่าว';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ไปยังจำเลยเพื่อดำเนินการแก้ไขการผิดสัญญาภายใน 30 วัน นับจากวันที่จำเลยได้รับหนังสือบอกกล่าว';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='หากจำเลยมิได้ดำเนินการแก้ไขการผิดสัญญาภายในเวลาที่กำหนด   โจทก์มีสิทธิบอกเลิกสัญญาได้';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='โดยแจ้งให้จำเลยทราบเป็นหนังสือ และหรือมีสิทธิเรียกร้องให้จำเลยชำระหนี้เงินกู้ที่ค้างชำระคืนได้';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ทั้งหมดก่อนกำหนด โดยจำเลยตกลงยินยอมรับผิดชดใช้ค่าเสียหายบรรดาที่โจทก์พึงได้รับอันเนื่องมา';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='จากการผิดสัญญาหรือการไม่ปฎิบัติตามที่โจทก์เรียกร้อง รายละเอียดปรากฏตามสัญญากู้  เอกสารท้าย';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='คำฟ้องหมายเลข 5';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');

$txt ='                ข้อ 3.  เพื่อเป็นประกันการชำระหนี้สัญญากู้เงินดังกล่าว  เมื่อวันที่ 21 มีนาคม 2554';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='จำเลยที่ 2 และจำเลยที่ 3 ได้ทำสัญญาค้ำประกันการชำระหนี้ตามสัญญากู้เงินดังกล่าวโดยจำเลยที่ 2 และจำเลยที่ 3';
$pdf->MultiCell(178, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='สัญญาว่าหากจำเลยที่  1  ผิดนัดไม่ชำระหนี้หรือชำระหนี้ไม่ครบถ้วนจำเลยที่ 2 และ จำเลยที่ 3';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ="ยอมรับผิดร่วมกันกับจำเลยที่ 1  อย่างลูกหนี้ร่วมจนกว่าโจทก์จะได้รับชำระหนี้โดยสิ้นเชิง";
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='รายละเอียดปรากฏตามสัญญาค้ำประกัน  เอกสารท้ายคำฟ้องหมายเลข 6';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');

$txt ='               ข้อ 4. นับแต่จำเลยที่ 1 ได้ทำสัญญากู้ยืมเงินและรับเงินไปจากโจทก์ตามคำฟ้อง ข้อ 2. ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='แล้วจำเลยที่ 1 ได้ชำระหนี้ให้แก่โจทก์ตลอดมาจนถึงงวดวันที่สุดท้ายของเดือนธันวาคม  2561 แต่งวด';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='สุดท้ายของเดือนมกราคม 2562 จำเลยที่ 1 ไม่ชำระ จึงถือได้ว่าจำเลยที่ 1 ผิดนัดชำระหนี้ตั้งแต่วันที่ 1 ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ="กุมภาพันธ์ 2560 ต่อมาวันที่ 17 กรกฎาคม 2560 โจทก์ได้มีหนังสือแจ้งว่ายังจำเลยทั้ง 2 ว่าจำเลยที่ 1 ";
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ผิดนัดชำระหนี้ให้จำเลยทั้ง 2 นำเงินไปชำระหนี้ทั้งหมดคืนแก่โจทก์ จำเลยทั้ง 2 ได้รับแล้วชำระหนี้';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='บางส่วนแต่ไม่เป็นไปตามสัญญา โดยครั้งสุดท้ายชำระเมื่อวันที่ 2 สิงหาคม 2560 จำนวน 6,000 บาท';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');


$txt ='               ต่อมาโจทก์จึงได้มอบหมายให้ทนายความมีหนังสือบอกกล่าวเพื่อให้จำเลยทั้ง 2 เข้าพบโจทก์ ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='เพื่อแก้ไขการผิดสัญญาภายใน 30 วัน หากไม่เข้าไปแก้ไขสัญญาให้จำเลยทั้ง 2 นำเงินไปชำระโจทก์ภายใน';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='15 วัน จำเลยทั้ง 2 ได้รับแล้วเพิกเฉย โดยครั้งสุดท้ายชำระเมื่อวันที่ 2 สิงหาคม 2560 จำนวน 6,000 บาท รายละเอียด';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ปรากฎตามหนังสือทวงถามพร้อมใบตอบรับของบริษัทไปรษณีย์โทรเลข เอกสารท้ายคำฟ้องหมายเลย 7 ถึง 12';
$pdf->MultiCell(1000, 9, ''.$txt, "B", 'L', 0, 0, '', '', true, 0, false, true, 9, 'B');



// set font
		$pdf->SetFont('cordiaupc', '', 18);
		// add a page Page 3
		$pdf->AddPage();
$txt = 'หน้า ๔';
$pdf->MultiCell(0, 0, ''.$txt, 0, 'C', 0, 1, '', '', true);
$pdf->SetFont('angsanaupc', '', 18);
$pdf->SetAbsY(20);
$txt ='                เมื่อวันที่ 12 ธันวาคม 2557 นายวิทยา ศรีบรรเทา ได้ถึงแก่ความตาย นางกาญศิญาภา';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='หรือ นางแก้วมณี แก้วศิริหรือศรีบรรเทา ซึ่งเป็นภรรยาของนายวิทยา  ศรีบรรเทา จึงเป็นทายาทผู้มีสิทธิ์';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ได้รับมรดกของนายวิทยา  ศรีบรรเทา และรับผิดในมูลหนี้ของนายวิทยา  ศรีบรรเทา รายละเอียดปรากฎ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ="ตามข้อมูลทะเบียนครอบครัว แบบรับรองรายการทะเบียนคนตายเอกสารท้ายคำฟ้องหมายเลข 11 ถึง 12";
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');

$txt ='                เมื่อคำนวณยอดหนี้ถึงวันฟ้องจำเลยที่ 1 เป็นหนี้โจทก์เป็นต้นเงิน 0.00  บาท';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ดอกเบี้ยค้างชำระจำนวน 15,488.60   บาท รวมเป็นเงินที่จำเลยที่ 1   ต้องชำระให้แก่โจทก์เป็นเงิน';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='0.00 บาท ซึ่งโจทก์ขอถือเอาเป็นทุนทรัพย์ในการฟ้องคดีนี้ และเงินจำนวนดังกล่าวจำเลยที่  2';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ="และจำเลยที่ 3  ในฐานะผู้ค้ำประกันจะต้องร่วมรับผิดกับจำเลยที่ 1 ด้วย รายละเอียดปรากฏตามรายการ";
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='เอกสารท้ายคำฟ้องหมายเลข   13';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');

$txt ='               อนึ่ง อัตราดอกเบี้ยและวิธีการคำนวณยอดหนี้ตามสัญญากู้เงินนั้น  โจทก์ถือปฏิบัติ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ตามสัญญาที่จำเลยที่ 1 ตกลงไว้กับโจทก์   ตามประกาศธนาคารโจทก์และประกาศกระทรวงการคลัง';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ที่ให้โจทก์พึงเรียกเก็บได้  รายละเอียดปรากฏตามสำเนาภาพถ่ายประกาศธนาคารโจทก์และประกาศ';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ="กระทรวงการคลัง เอกสารท้ายคำฟ้องหมายเลข   14 และ 15";


$txt ='               โจทก์ไม่มีทางอื่นใดที่จะบังคับจำเลยทั้ง 3  ได้จึงต้องฟ้องเป็นคดีต่อศาลเพื่อขอบารมีศาลเป็นที่พึ่ง';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$txt ='ควรมิควรแล้วแต่จะโปรด';
$pdf->MultiCell(0, 9, ''.$txt, "B", 'C', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');
$pdf->MultiCell(0, 9, '', "B", 'L', 0, 1, '', '', true, 0, false, true, 9, 'B');



// set font
		$pdf->SetFont('cordiaupc', '', 18);
		// add a page
		$pdf->AddPage();

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
		$pdf->SetFillColor(255, 255, 127);
$pdf->SetAbsXY(10,20);
$pdf->MultiCell(20, 5, '<img src="'.site_url("images/circle.png").'">', 0, 'L', 0, 0, '', '', true,0,true);

$pdf->SetAbsXY(110,5);
$pdf->MultiCell(55, 5, '<img src="'.site_url("images/symbol1.png").'">', 0, 'L', 0, 0, '', '', true,0,true);	
$pdf->SetAbsXY(120,17);
$pdf->SetTextColor(0, 0, 255);
$txt = 'วันที่ 25 พฤษภาคม 2557';
$pdf->SetFont('angsanaupc', 'B', 14);
$pdf->MultiCell(60, 5, ''.$txt, 0, 'L', 0, 0, '', '', true);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('cordiaupc', '', 18);
$pdf->SetXY(10,0);	
$txt = "\n".'      (๙)'."\n"."\n".'     ใบแต่งทนายความ';
$pdf->MultiCell(60, 5, ''.$txt, 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(40, 5, '<img src="'.site_url("images/crut.png").'">', 0, 'L', 0, 0, '', '', true,0,true);

$txt = ''."\n"."\n"."\n"."\n"."\n".'คดีหมายเลขดำที่ __________ / ________';
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 1, '', '', true);
$pdf->SetFont('angsanaupc', '', 18);
$pdf->SetAbsXY(143,39);
$txt = "zs 2234";
$pdf->MultiCell(25, 5, $txt, 0, 'L', 0, 0, '', '', true);
$txt = "2550";
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 1, '', '', true);

$pdf->SetFont('cordiaupc', '', 18);
$txt = ''."\n".'ศาล __________________________________________'.
"\n".'วันที่ ______ เดือน _____________ พุทธศักราช _________'."\n"." ความ _____________________________________";
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->SetAbsXY(115,54);
$pdf->SetFont('angsanaupc', '', 18);
$txt = "จังหวัดมหาสารคาม";
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 0, '', '', true);
$pdf->SetAbsXY(105,62);
$txt = "25";
$pdf->MultiCell(26, 5, $txt, 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(48, 5, "มกราคม", 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(0, 5, "2556", 0, 'L', 0, 0, '', '', true);
$pdf->SetAbsXY(125,70);
$pdf->MultiCell(28, 5, "แพ่ง", 0, 'L', 0, 1, '', '', true);

$pdf->SetAbsXY(20,116);
$pdf->SetFont('cordiaupc', '', 18);
$txt = 'ระหว่าง';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$pdf->SetAbsXY(36,106.4);
$pdf->MultiCell(70, 10, '<img src="'.site_url("images/leftbrance.png").'">', 0, 'L', 0, 0, '', '', true,0,true);

$pdf->SetAbsXY(0,100);
$txt = '___________________________________________________________________ โจทก์';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->SetAbsXY(45,98);
$pdf->SetFont('angsanaupc', '', 18);
$txt = 'ธนาคารออมสิน';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);



$pdf->SetAbsXY(45,116);
$txt = 'นางสุภาพรรณ  วงศ์สินอุดม  ที่ 1  ,   นายทองม้วน พักตรคุย  ที่ 2'."\n".'นางสนม  นราโต ที่ 3';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$pdf->SetAbsXY(0,128.5);
$pdf->SetFont('cordiaupc', '', 18);
$txt = '___________________________________________________________________ จำเลย';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);

$pdf->SetXY(20,145);
$txt = '     ข้าพเจ้า _________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '___________________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ขอแต่งให้ __________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'เป็นทนายความของข้าพเจ้าในคดีเรื่องนี้และให้มีอำนาจ _____________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '___________________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '___________________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '___________________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ข้าพเจ้ายอมรับผิดชอบตามที่ __________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ทนายความจะได้ดำเนินกระบวนพิจารณาต่อไปตามกฎหมาย';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ขอรับรองว่าเป็นลายมือชื่อผู้แต่งทนาย';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$pdf->SetFont('angsanaupc', '', 18);
$txt = 'ลงนามต่อหน้าข้าพเจ้าจริง';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$pdf->SetFont('cordiaupc', '', 18);
$txt = '_________________________________________ ผู้แต่งทนายความ';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->SetFont('angsanaupc', '', 18);
$txt = "\n".'            ทนายความ';
$pdf->MultiCell(60, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$pdf->SetFont('cordiaupc', '', 18);
$txt = '(พลิก)';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$txt ='';
$pdf->MultiCell(0, 0, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true);
$pdf->SetFont('cordiaupc', '', 16);
$txt ='หมายเหตุ*';
$pdf->MultiCell(20, 0, ''.$txt, "B", 'L', 0, 0, '', '', true, 0, false, true);
$txt ='ตามประมวลกฎหมายวิธีพิจารณาความแพ่งมาตรา ๖๒ ทนายความไม่มีอำนาจดำเนินกระบวน'."\n";
$txt .='พิจารณาใดไปในทางจำหน่ายสิทธิของคู่ความนั้นเช่นการยอมรับตามที่คู่ความอีกฝ่ายหนึ่งเรียกร้อง'."\n";
$txt .='การถอนฟ้อง การประนีประนอมยอมความ การสละสิทธิ์หรือการใช้สิทธิในการอุทธรณ์หรือฎีกา'."\n";
$txt .='หรือในการขอให้พิจารณาคดีใหม่ ถ้าจะมอบให้มีอำนาจดังกล่าวประการใดบ้าง ให้กรอกลงในช่อง'."\n";
$pdf->MultiCell(0, 0, ''.$txt, 0, 'L', 0, 0, '', '', true, 0, false, true);

$pdf->SetXY(0,144);
$pdf->SetFont('angsanaupc', '', 18);
$pdf->MultiCell(45, 5,"", 0, 'L', 0, 0, '' ,'', true);
$txt = 'ธนาคารออมสิน';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'โจทก์';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$txt = 'นางอัจฉรา  ม้วนโคกสูง';
$pdf->MultiCell(20, 5,"", 0, 'L', 0, 0, '' ,'', true);
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);

$txt = 'ดำเนินกระบวนพิจารณาใดไปในทาง';
$pdf->MultiCell(95, 5,"", 0, 'L', 0, 0, '' ,'', true);
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'จำหน่ายสิทธิของข้าพเจ้าได้ เช่นการยอมรับตามที่คู่ความอีกฝ่ายหนึ่งเรียกร้อง การถอนฟ้อง การประนี';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ประนอมยอมความ  การสละสิทธิ์หรือการใช้สิทธิในการอุทธรณ์หรือฎีกา  หรือในการขอให้พิจารณา';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'คดีใหม่';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);

$txt = 'นางอัจฉรา  ม้วนโคกสูง';
$pdf->MultiCell(50, 5,"", 0, 'L', 0, 0, '' ,'', true);
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);










// set font
		$pdf->SetFont('cordiaupc', '', 18);
		// add a page
		$pdf->AddPage();

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)


//$pdf->SetXY(0,15);
$txt ='คำรับเป็นทนายความ';
$pdf->MultiCell(70, 5,"", 0, 'L', 0, 0, '' ,'', true);
$pdf->MultiCell(40, 5, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 10, 'B');

$pdf->SetXY(30,30);
$txt = 'ข้าพเจ้า _______________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '___________________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ทนายความชั้นที่ ________________ ใบอนุญาตที่ _____________________ ได้รับอนุญาตให้ว่าความ';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '______________________ สำนักงานอยู่บ้านเลขที่ ___________________ หมู่ที่ _________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ถนน _____________________ ตรอก/ซอย ____________________ ใกล้เคียง ___________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ตำบล/แขวง ___________ อำเภอ/เขต _____________ จังหวัด ______________ โทร. ____________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ขอเข้ารับเป็นทนายความของ __________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '__________________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'เพื่อดำเนินกระบวนพิจารณาต่อไปตามหน้าที่ในกฏหมาย';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = "\n"."\n".'_________________________________________ ทนายความ'."\n";
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->MultiCell(0, 5,"\n", 0, 'R', 0, 1, '' ,'', true);
$pdf->MultiCell(0, 5,"\n", 0, 'R', 0, 1, '' ,'', true);
$txt ='คำสั่ง';
$pdf->MultiCell(85, 5,"", 0, 'L', 0, 0, '' ,'', true);
$pdf->MultiCell(12, 5, ''.$txt, "B", 'L', 0, 1, '', '', true, 0, false, true, 10, 'B');
$txt = "\n".'___________________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$txt = "\n".'___________________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$txt = "\n".'___________________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->MultiCell(0, 5,"\n", 0, 'R', 0, 1, '' ,'', true);
$txt = '_________________________________________ ผู้พิพากษา';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);

$pdf->SetXY(0,29);
$pdf->SetFont('angsanaupc', '', 18);
$pdf->MultiCell(50, 5,'', 0, 'L', 0, 0, '' ,'', true);
$txt = 'นางอัจฉรา  ม้วนโคกสูง';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->SetX(60);
$txt = 'หนึ่ง';
$pdf->MultiCell(60, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$txt = '1214/2549';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$pdf->SetX(25);
$txt = 'ทั่วราชอาณาจักร';
$pdf->MultiCell(90, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$txt = '1072';
$pdf->MultiCell(60, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$txt = '-';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$pdf->SetX(30);
$txt = 'นครสวรรค์';
$pdf->MultiCell(80, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$txt = '-';
$pdf->MultiCell(70, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$txt = '-';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$pdf->SetX(45);
$txt = 'ตลาด';
$pdf->MultiCell(45, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$txt = 'เมือง';
$pdf->MultiCell(40, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$txt = 'มหาสารคาม';
$pdf->MultiCell(38, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$txt = '081-8718778';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$pdf->SetX(74);
$txt = 'ธนาคารออมสิน';
$pdf->MultiCell(48, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'โจทก์  ';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);




// set font
		$pdf->SetFont('cordiaupc', '', 18);
		// add a page
		$pdf->AddPage();

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
		$pdf->SetFillColor(255, 255, 127);
$pdf->SetAbsXY(10,20);
$pdf->MultiCell(20, 5, '<img src="'.site_url("images/circle.png").'">', 0, 'L', 0, 0, '', '', true,0,true);
$pdf->SetAbsXY(10,10);
$txt = "\n".'       บัญชีพยาน';
$pdf->MultiCell(60, 5, ''.$txt, 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(40, 5, '<img src="'.site_url("images/crut.png").'">', 0, 'L', 0, 0, '', '', true,0,true);

$txt = ''."\n"."\n"."\n"."\n".'คดีหมายเลขดำที่ ___________ / ________'."\n".'คดีหมายเลขแดงที่ __________ / ________';
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 1, '', '', true);
$pdf->SetAbsXY(145,41);
$pdf->SetFont('angsanaupc', '', 18);
$txt = "zs 2234";
$pdf->MultiCell(25, 5, $txt, 0, 'L', 0, 0, '', '', true);
$txt = "2550";
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 0, '', '', true);
$pdf->SetAbsXY(145,49);
$txt = "zs 2234";
$pdf->MultiCell(25, 5, $txt, 0, 'L', 0, 0, '', '', true);
$txt = "2550";
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 1, '', '', true);

$pdf->SetFont('cordiaupc', '', 18);
$txt = ''."\n".'ศาล __________________________________________'.
"\n".'วันที่ ______ เดือน _____________ พุทธศักราช _________'."\n"." ความ _____________________________________";
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->SetAbsXY(115,64);
$pdf->SetFont('angsanaupc', '', 18);
$txt = "จังหวัดมหาสารคาม";
$pdf->MultiCell(0, 5, $txt, 0, 'L', 0, 0, '', '', true);
$pdf->SetAbsXY(105,72);
$txt = "25";
$pdf->MultiCell(26, 5, $txt, 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(48, 5, "มกราคม", 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(0, 5, "2556", 0, 'L', 0, 0, '', '', true);
$pdf->SetAbsXY(125,80);
$pdf->MultiCell(28, 5, "แพ่ง", 0, 'L', 0, 1, '', '', true);

$pdf->SetAbsXY(20,116);
$pdf->SetFont('cordiaupc', '', 18);
$txt = 'ระหว่าง';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$pdf->SetAbsXY(36,106.4);
$pdf->MultiCell(70, 10, '<img src="'.site_url("images/leftbrance.png").'">', 0, 'L', 0, 0, '', '', true,0,true);

$pdf->SetAbsXY(0,100);
$txt = '___________________________________________________________________ โจทก์';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->SetAbsXY(45,98);
$pdf->SetFont('angsanaupc', '', 18);
$txt = 'ธนาคารออมสิน';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);



$pdf->SetAbsXY(45,116);
$txt = 'นางสุภาพรรณ  วงศ์สินอุดม  ที่ 1  ,   นายทองม้วน พักตรคุย  ที่ 2'."\n".'นางสนม  นราโต ที่ 3';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 0, '' ,'', true);
$pdf->SetAbsXY(0,128.5);
$pdf->SetFont('cordiaupc', '', 18);
$txt = '___________________________________________________________________ จำเลย';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);

$pdf->SetXY(20,145);
$txt = 'ข้าพเจ้า ___________________________________________________________________________';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = 'ขอระบุพยานของข้าพเจ้ารวม  ______  อันดับ  ตามบัญชีตารางข้างล่างนี้ ';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$pdf->MultiCell(0, 5,"", 0, 'L', 0, 1, '' ,'', true);

// table
$pdf->MultiCell(8, 5,"อันดับ", 1, 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(40, 5,"ชื่อพยาน\n ", "TR", 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(30, 5,"บ้านเลขที่ หมู่ที่ ถนน ตรอก/ซอย", "TR", 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(18, 5,"ใกล้เคียง\n ", "TR", 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(23, 5,"ตำบล/แขวง\n ", "TR", 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(22, 5,"อำเภอ/เขต\n ", "TR", 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(15, 5,"จังหวัด\n ", "TR", 'C', 0, 0, '' ,'', true);
$pdf->MultiCell(20, 5,"หมายเหตุ\n ", "TR", 'C', 0, 1, '' ,'', true);
for ($i=1; $i <= 6; $i++) { 
	$border="TR";
	if ($i==6) {
		$border="TRB";
	}
	$pdf->MultiCell(8, 13,"", "LBR", 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(40, 13,"", $border, 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(30, 13,"", $border, 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(18, 13,"", $border, 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(23, 13,"", $border, 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(22, 13,"", $border, 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(15, 13,"", $border, 'C', 0, 0, '' ,'', true, 0, false, true, 40);
	$pdf->MultiCell(20, 13,"นำ", $border, 'C', 0, 1, '' ,'', true, 0, false, true, 40);
}
$txt = "\n".'___________________________________ ผู้ระบุ';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 1, '' ,'', true);
$pdf->SetFont('angsanaupc', '', 18);
$txt = 'นางอัจฉรา  ม้วนโคกสูง';
$pdf->MultiCell(162, 5,$txt, 0, 'R', 0, 0, '' ,'', true);
$pdf->SetFont('cordiaupc', '', 18);
$txt = '(พลิก)';
$pdf->MultiCell(0, 5,$txt, 0, 'R', 0, 0, '' ,'', true);


$pdf->SetXY(40,144);
$pdf->SetFont('angsanaupc', '', 18);
$txt = 'ธนาคารออมสิน';
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);
$txt = '16';
$pdf->MultiCell(55, 5,"", 0, 'L', 0, 0, '' ,'', true);
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);

$pdf->SetXY(12,185);
$txt = '1     นายนิติพจน์  พละไกร ธนาคารออมสิน ถ.นครสวรรค์ ต.ตลาด อ.เมือง จ.มหาสารคาม';
$pdf->MultiCell(10, 5,"", 0, 'L', 0, 0, '' ,'', true);
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);

$pdf->SetXY(12,198);
$txt = '2     นายนิติพจน์  พละไกร ธนาคารออมสิน ถ.นครสวรรค์ ต.ตลาด อ.เมือง จ.มหาสารคาม';
$pdf->MultiCell(10, 5,"", 0, 'L', 0, 0, '' ,'', true);
$pdf->MultiCell(0, 5,$txt, 0, 'L', 0, 1, '' ,'', true);











		// ---------------------------------------------------------

		//Close and output PDF document
		$pdf->Output('example_003.pdf', 'I');
	}
}
