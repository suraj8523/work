<?php
include 'connection.php';
$firstname = $lastname = $gmail = $number = $address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstname = ($_REQUEST["firstname"]);
    $lastname = ($_REQUEST["lastname"]);
    $gmail = ($_REQUEST["gmail"]);
    $number = ($_REQUEST["number"]);
    $address = ($_REQUEST["address"]);

}

$sql = "INSERT INTO reg (firstname, lastname , gmail , number , address  )
    VALUES ('$firstname','$lastname','$gmail','$number','$address')";

if (mysqli_query($conn, $sql)) {
  echo "successfully data inserted into database";
} else {
  echo "ERROR: Hush! Sorry $sql. "
    . mysqli_error($conn);
}
// echo nl2br("
// 	<h3>You've entered the following details: </h3> 
// 	<b>Name  :</b>  \t $firstname \n
// 	<b>Email  :</b>\t $lastname \n
// 	<b>Mobile  :</b>\t $gmail\n 
// 	<b>Course  :</b>\t $number \n
// 	<b>Gender  :</b>\t $address \n

// ");
