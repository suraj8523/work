<?php 
// Load the database configuration file 
include_once 'form_connection.php'; 
 
// Filter the excel data 
// function filterData(&$str){ 
//     $str = preg_replace("/\t/", "\\t", $str); 
//     $str = preg_replace("/\r?\n/", "\\n", $str); 
//     if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
// } 
 
// Excel file name for download 
$fileName = "form_data_excel" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('ID', 'NAME', 'EMAIL', 'MOBILE', 'COURSE', 'GENDER', 'HOBBIES', 'IMAGE'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM form_details ORDER BY id ASC"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['name'], $row['email'], $row['mobile'], $row['course'], $row['gender'], $row['hobbies'], $row['image']); 
        //array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;