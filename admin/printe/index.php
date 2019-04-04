<?php
$conn=mysqli_connect('localhost','root','','school2');
$sql="SELECT * FROM student";
$sel="SELECT * FROM closing";
$school="SELECT * FROM school";
$sc=mysqli_query($conn,$school);
$q=mysqli_query($conn,$sel);
$query=mysqli_query($conn,$sql);
require('fpdf.php');
$pdf=new FPDF();
$pdf->addPage('L','A5','mm');
    // $pdf->cell(30,10,'First Name',1,0,'C');
    // $pdf->cell(30,10,'Last Name',1,0,'C');
    // $pdf->cell(30,10,'Class',1,0,'C');
    // $pdf->cell(30,10,'Stream',1,0,'C');
    // $pdf->cell(30,10,'Reg.No',1,0,'C');
    // $pdf->cell(30,10,'Balance',1,1,'C');
    if($sd=mysqli_fetch_object($sc)){
    }
    if($row=mysqli_fetch_object($q)){
    }
    while($rows=mysqli_fetch_object($query)){
        $pdf->setFont('Arial','B',30);
        $pdf->Image('201630.png',175,0);$pdf->Ln();
        $pdf->cell(30,10,"".$sd->name." Secondary School");
        $pdf->Ln();
        $pdf->setFont('Arial','B',12);
        $pdf->cell(30,10,"Phone:".$sd->phone." ");
        $pdf->Ln();
        $pdf->cell(30,10,"P.O Box:".$sd->po." ");
        $pdf->Ln();
        $pdf->cell(30,0,'_________________________________________________________________________');
        $pdf->Ln();
         $pdf->setFont('Arial','',12);
        $pdf->cell(30,10,"\t\t\t\t\t\t\tDear ".$rows->parent_name.", The Student ".$rows->fname." ".$rows->tname." Class ".$rows->class." ".$rows->stream." Registration Number ".$rows->reg_no.".");$pdf->Ln(10);
        $pdf->cell(30,10,"\t\t\t\t\t\t\t Has a  fee Balance of ".$rows->balance." and Has to be Payed  on Full When they Resume School.");$pdf->Ln();
        $pdf->cell(30,10,"\t\t\t\t\t\t\tThe School breaks today ".date('Y/m/d')." for a mid Term Holiday and Shall resume  on ".$row->cdate);$pdf->Ln();
        $pdf->cell(30,10,"\t\t\t\t\t\t\tThanks For your Continued Support");$pdf->Ln();
        $pdf->cell(30,10,"\t\t\t\t\t\t\tYours Faithful");$pdf->Ln();
        $pdf->cell(30,10,"\t\t\t\t\t\t\t".$sd->head);$pdf->Ln();
        $pdf->cell(30,10,"\t\t\t\t\t\t\tPrincipal\t".$sd->name." Secondary School ");$pdf->Ln();
        $pdf->cell(30,10,"\t\t\t\t\t\t\tSign________________ ");$pdf->Ln();
        }
$pdf->output();


 ?>
