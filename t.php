<?php 
require ("fpdf/fpdf.php");
$mydb = mysqli_connect("localhost","root","","project");
$mydb->set_charset("utf8");
class PDF extends FPDF{
  function Header(){
    $this->AddFont('THSarabun','','THSarabun.php');
    $this->setFont('THSarabun','',20);
    $this->Cell(0,5,iconv("UTF-8","TIS-620",'ใบเสร็จ'),0,1,"C");
    $this->Ln(15);
  }

  function footer(){
    $this->SetY(-50);
    $this->AddFont('THSarabun','','THSarabun.php');
    $this->setFont('THSarabun','',12);
    $this->Cell(0,10,iconv("UTF-8","TIS-620",'ลงชื่อ ..........................................................................ผู้รับเงิน'),0,0,'R');
    $this->Ln();
    $this->Cell(0,10,iconv("UTF-8","TIS-620",'     (.........................................................................)         '),0,0,'R');
    $this->SetY(-15);
    $this->AddFont('THSarabun','','THSarabun.php');
    $this->setFont('THSarabun','',8);
    $this->Cell(0,10,iconv("UTF-8","TIS-620",'หน้า ').$this->PageNo().'/{nb}',0,0,'C');
    $this->Cell(0,5,iconv("UTF-8","TIS-620",'เวลาที่ออกใบเสร็จ : '.date('d').'/'.date('m').'/'.(date('Y')+543).' '.date('H:i:s')),0,0,"R");
  }
  function headerTable(){
    $this->AddFont('THSarabun','','THSarabun.php');
    $this->setFont('THSarabun','',14);
    $this->Cell(20,10,iconv("UTF-8","TIS-620",'ชื่อ'),1,0,'C');
    $this->Cell(60,10,iconv("UTF-8","TIS-620",'วิธีการรักษา '),1,0,'C');
    $this->Ln();
  }
  function viewtable($mydb){
    $strID = null;

    if (isset($_GET["ID"])) {
    $strID = $_GET["ID"];
    }

    $this->SetFont('THSarabun','',14);
    $sql = "SELECT * FROM treatment inner join newcase on treatment.id = newcase.id where treatment.id = '$strID' order by treatment_id desc  " or die("Error:" . mysqli_error());
    $query = mysqli_query($mydb, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $this->Cell(20,10,$result["firstname"]->ชื่อ,1,0,'C');
  }
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();
$pdf->Output();

?>