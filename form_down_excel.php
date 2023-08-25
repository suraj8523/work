<?php 

 
include "form_connection.php";
$sql = "SELECT * FROM `form_details`";  
$setRec = mysqli_query($conn, $sql);  
//$columnHeader = '';  
$columnHeader = "Id" . "\t" . "Name" . "\t" . "Email" . "\t"."Mobile" . "\t". "Course" ."\t" ."Gender". "\t" ."Hobbies" ."\t"."Image";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=form_details.xls"); 
echo ucwords($columnHeader) . "\n" . $setData . "\n";

// // Load the database configuration file 
// include_once 'form_connection.php'; 
// //file download
// $fileName = "form_data_excel" . date('Y-m-d') . ".xls"; 
 
// // Column names 
// $fields = array('ID', 'NAME', 'EMAIL', 'MOBILE', 'COURSE', 'GENDER', 'HOBBIES', 'IMAGE'); 
 
// // Display column names as first row 
// $excelData = implode("\t", array_values($fields)) . "\n"; 
 
// // Fetch records from database 
// $query = $conn->query("SELECT * FROM form_details ORDER BY id ASC"); 
// if($query->num_rows > 0){ 
//     // Output each row of the data 
//     while($row = $query->fetch_assoc()){ 
//         $lineData = array($row['id'], $row['name'], $row['email'], $row['mobile'], $row['course'], $row['gender'], $row['hobbies'], $row['image']); 
//        // array_walk($lineData, 'filterData'); 
//         $excelData .= implode("\t", array_values($lineData)) . "\n"; 
//     } 
// }else{ 
//     $excelData .= 'No records found...'. "\n"; 
// } 
 
// // Headers for download 
// header("Content-Type: application/vnd.ms-excel"); 
// header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// // Render excel data 
// echo $excelData; 
 
// exit;

