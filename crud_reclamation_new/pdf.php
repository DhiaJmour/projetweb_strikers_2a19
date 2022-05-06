<?php

require('fpdf184/fpdf.php');
  
// Instantiate and use the FPDF class 
$pdf = new FPDF();
  
//Add a new page
$pdf->AddPage();
  
// Set the font for the text
$pdf->SetFont('Arial', 'B', 18);
  
// Prints a cell with given text 
$pdf->MultiCell(60,20,"Name : \n ".$_GET['name']." \nEmail : \n ".$_GET['email']." \nTexte : \n ".$_GET['texte']." \nCode : \n ".$_GET['code']);
  
// return the generated output
$pdf->Output();

?>