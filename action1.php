<?php
error_reporting(0);
$connect=mysqli_connect('localhost','root','123456','myprograming');
if (isset($_POST['submit'])) {
$username=$_POST['username'];
$email=$_POST['email'];
$language=$_POST['language'];
$xyz=implode(",",$language);
//echo $xyz;
$sql="INSERT INTO `reg1`  VALUES ('$username','$email','$xyz')";
$query=mysqli_query($connect,$sql);
if ($query) {
echo "Data Insrted Successfully";
}else{
echo "Data Not Insrted";
}
}?>