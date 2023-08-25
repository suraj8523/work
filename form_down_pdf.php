<?php
require('fpdf/fpdf.php');
include "form_connection.php";


// Select data from MySQL database
$select = "SELECT * FROM `form_details`";
$result = $conn->query($select);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
  $id= 'Id';
  $name='Name';
  $email='Email';
  $mobile='Mobile';
  $course='Course';
  $gender='Gender';
  $hobbies='Hobbies';
  $image='Image';

  $pdf->Cell(10,10,$id,1);
  $pdf->Cell(17,10,$name,1);
  $pdf->Cell(33,10,$email,1);
  $pdf->Cell(20,10,$mobile,1);
  $pdf->Cell(15,10,$course,1);
  $pdf->Cell(15,10,$gender,1);
  $pdf->Cell(33,10,$hobbies,1);
  $pdf->Cell(40,10,$image,1);
  $pdf->Ln();
  
while($row = $result->fetch_object()){
  $pdf->SetFont('Arial','',9);
  $id = $row->id;
  $name = $row->name;
  $email = $row->email;
  $mobile = $row->mobile;
  $course = $row->course;
  $gender =$row->gender;
  $hobbies = $row->hobbies;
  $image = $row->image;

  $pdf->Cell(10,10,$id,1);
  $pdf->Cell(17,10,$name,1);
  $pdf->Cell(33,10,$email,1);
  $pdf->Cell(20,10,$mobile,1);
  $pdf->Cell(15,10,$course,1);
  $pdf->Cell(15,10,$gender,1);
  $pdf->Cell(33,10,$hobbies,1);
  $pdf->Cell(40,10,$image,1);

 
  $pdf->Ln();
}$pdf->Output();
