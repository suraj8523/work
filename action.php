<?php
include 'config.php';
$name = $email = $mobile = $course = $gender = $hobbies = $image =$newvalues= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = ($_REQUEST["name"]);
    $email = ($_REQUEST["email"]);
    $mobile = ($_REQUEST["mobile"]);
    $course = ($_REQUEST["course"]);
    $gender = ($_REQUEST["gender"]);
	$hobbies = $_REQUEST['hobbies'];
	$newvalues=  implode(",", $hobbies);
	$image = ($_REQUEST["image"]);

    // image path name and folder save details 
    // $filename = $_FILES['image']["name"];
    // $tempname = $_FILES["image"]["tmp_name"];
    // $folder = "uploads/" . $filename;
    // move_uploaded_file($tempname, $folder);  
    

    // upload image send into the directory
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
}
echo nl2br("
	<h3>You've entered the following details: </h3> 
	<b>Name  :</b>  \t $name \n
	<b>Email  :</b>\t $email \n
	<b>Mobile  :</b>\t $mobile \n 
	<b>Course  :</b>\t $course \n
	<b>Gender  :</b>\t $gender \n
	<b>Hobbies  :</b>\t $newvalues \n
	<b>Image  :</b>\t $target_file \n
");
