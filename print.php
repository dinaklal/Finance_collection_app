<?php

                $month=$_GET['id'];
            require_once 'db_connect.php';
             $sql="SELECT sum(amount) as su FROM others WHERE status=1 AND month(date)='$month'";
                $res=mysqli_query($con,$sql);
                $row1=  mysqli_fetch_array($res);
               
                 $sql="SELECT sum(amount) as su FROM others WHERE status=0 AND month(date)='$month'";
                $res=mysqli_query($con,$sql);
                $row2=  mysqli_fetch_array($res);
                 $sql="SELECT name FROM month WHERE id='$month'";
                $res=mysqli_query($con,$sql);
                $row3=  mysqli_fetch_array($res);
                   $sql="SELECT sum(amount)as suma FROM interest WHERE month(date)='$month'  AND status=1";
                $res=mysqli_query($con,$sql);
                $row4=  mysqli_fetch_array($res);
                  $sql="SELECT sum(p_amount)as suma FROM loan WHERE month(loan_date)='$month'  ";
                $res=mysqli_query($con,$sql);
                $row5=  mysqli_fetch_array($res);
                    $sql="SELECT sum(amount)as suma FROM week_register WHERE month(date)='$month'  ";
                $res=mysqli_query($con,$sql);
                $row6=  mysqli_fetch_array($res);
              $sql="SELECT distinct member_id FROM week_register WHERE amount<1 AND month_id='$month'";
                $res=mysqli_query($con,$sql);
                 $sql="SELECT  member_id FROM interest WHERE (status is NULL OR status=0) AND month_id='$month'";
                $res8=mysqli_query($con,$sql);
                $dateObj   = DateTime::createFromFormat('!m', $month);
$monthName = $dateObj->format('F');
require('fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Times','B',25);
    // Move to the right
    $this->Cell(35);
    // Title
    
    $this->Cell(160,12,'KAIRALI SELF FINANCE SOCEITY',1,0,'C');
    // Line break
    $this->Ln(10);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Space IT labs',0,0,'C');
}
 
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$str = iconv('UTF-8', 'windows-1252', $row3['name']);
     $pdf->Cell(0,10,'                                                                CHEMBILERI, CHENGALAYI P.O,KANNUR',0,1);
    $pdf->Cell(0,4,'                                                                ',0,1);
    $id1=''.'  '.$month."/".date('Y').'  '.$monthName.' Total Report';

    $pdf->SetFont('Arial','',12);
     $pdf->Cell(0,4,$id1,0,1);
     $pdf->Ln();
     $pdf->Cell(100,15,'TOTAL INCOME',1,0,'C');
      $pdf->Cell(85,15,$row1['su']+$row4['suma']+$row6['suma']." rs",1,0,'C');
        $pdf->Ln();
        $pdf->Cell(100,15,'TOTAL EXPENSE',1,0,'C');
        $pdf->Cell(85,15,$row2['su']+$row5['suma']." rs",1,0,'C');
        $pdf->Ln();
        $pdf->Cell(100,15,'TOTAL LOAN GIVEN',1,0,'C');
       
        $pdf->Cell(85,15,$row5['suma']." rs",1,0,'C');
        $pdf->Ln();
        $pdf->Cell(100,15,'TOTAL DEPOSIT',1,0,'C');
        
       
        $pdf->Cell(85,15,$row6['suma']." rs",1,0,'C');
        $pdf->Ln();
        
                                                                                                                                            
  


 
    

    
     $pdf->Cell(100,15,'TOTAL INTEREST PAID',1,0,'C');
      $pdf->Cell(85,15,$row4['suma']." rs",1,0,'C');
        $pdf->Ln();
        $pdf->Cell(100,15,'TOTAL OTHER INCOME',1,0,'C');
        $pdf->Cell(85,15,$row1['su']." rs",1,0,'C');
        $pdf->Ln();
        $pdf->Cell(100,15,'TOTAL OTHER EXPENSE',1,0,'C');
       
        $pdf->Cell(85,15,$row2['su']." rs",1,0,'C');
        $pdf->Ln();
       
        
        $pdf->SetFont('Times','I',12);
     $pdf->Cell(120,17,'                                                                                                                                           Signature',0,1);
  
     
  


 
    

    
    // Arial italic 8
    $pdf->SetFont('Arial','I',8);
    // Page number
   
      
    
    

$pdf->Output();

?>
