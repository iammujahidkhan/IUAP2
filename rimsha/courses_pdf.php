<?php
include "config.php";
include_once('libs/fpdf.php');
 class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Employee List',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$pdf=new FPDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('times','B',10);
$pdf->Cell(14,5,"P#ID");
$pdf->Cell(60,5,"Title");
$pdf->Cell(50,5,"University");
$pdf->Cell(13,5,"Upload By");
$pdf->Ln();
$pdf->Cell(450,5,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();

$query= $class->fetchdata("SELECT * FROM `programs` where status = 1");
while($rows=$query->fetch(PDO::FETCH_ASSOC))
{
	$queryBY= $class->fetchdata("SELECT * FROM `users` where id = '$rows[user_id]'");
	$Users=$queryBY->fetch(PDO::FETCH_ASSOC);
            $id = $rows['id'];
            $title = $rows['title'];
            $uni_name = $Users['uni_name'];
            $status = $rows['status'];
            $role = $Users['name'];
			$pdf->Cell(15,7,$id);
            $pdf->Cell(60,7,$title);
            $pdf->Cell(50,7,$uni_name);
            $pdf->Cell(24,7,$role); 
            $pdf->Ln(); 
}
$pdf->Output();
?>