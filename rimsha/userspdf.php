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
$pdf->Cell(14,5,"User ID");
$pdf->Cell(45,5,"User Name");
$pdf->Cell(50,5,"Email");
$pdf->Cell(13,5,"Status");
$pdf->Cell(24,5,"Role");
$pdf->Cell(50,5,"Joined Date");
$pdf->Ln();
$pdf->Cell(450,5,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();

$query= $class->fetchdata("select * from users");
while($rows=$query->fetch(PDO::FETCH_ASSOC))
{
            $studid = $rows['id'];
            $name = $rows['name'];
            $email = $rows['email'];
            $status = $rows['status'];
            $role = $rows['role'];
			$created_date = $rows['created_date'];
			$pdf->Cell(15,7,$studid);
            $pdf->Cell(45,7,$name);
            $pdf->Cell(50,7,$email);
            $pdf->Cell(13,7,$status);
            $pdf->Cell(24,7,$role); 
			$pdf->Cell(50,7,$created_date); 
            $pdf->Ln(); 
}
$pdf->Output();
?>