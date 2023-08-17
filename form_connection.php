<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname= "form_data1";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create database
// $sql = "CREATE DATABASE myprograming";
// if (mysqli_query($conn, $sql)) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . mysqli_error($conn);
// }


// sql to create table
// $sql = "CREATE TABLE reg (
//   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   firstname VARCHAR(30) NOT NULL,
//   lastname VARCHAR(30) NOT NULL,
//   email VARCHAR(50),
//   number VARCHAR(255),
//   address VARCHAR(255)
 
//   )";
  
//   if (mysqli_query($conn, $sql)) {
//     echo "Table reg created successfully";
//   } else {
//     echo "Error creating table: " . mysqli_error($conn);
//   }

// mysqli_close($conn);
?>