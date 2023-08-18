<?php

$servername = "localhost";

$username = "root"; 

$password = "123456"; 

$dbname = "myDBD"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

// // Create database
// $sql = "CREATE DATABASE myDBD";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $conn->error;
// }

// $conn->close();
// 

?>