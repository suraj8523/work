<?php

// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','123456');
define('DB_NAME','form_data1');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

//require_once("form_connection.php");
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
// code for print Heading of tables
$pdf->SetFont('Arial','B',12);
$ret ="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='form_data1' AND `TABLE_NAME`='form_details'";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$header=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($header as $heading) {
foreach($heading as $column_heading)
$pdf->Cell(23,15,$column_heading,1);
// if($column_heading== "image")
// {
//     $pdf->Cell(50,10,$column_heading,1);
// }
// else{
//     $pdf->Cell(20,10,$column_heading,1);
// }

}}
//code for print data
$sql = "SELECT * from  form_details ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row) {
$pdf->SetFont('Arial','',8);
$pdf->Ln();
foreach($row as $column)

$pdf->Cell(23,15,$column,1);
} }
$pdf->Output();
?>