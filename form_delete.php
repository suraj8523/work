<?php
header('location: form_show.php');
include ('form_connection.php');
$id = $_REQUEST['id'];
$sql ="DELETE FROM `form_details` WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
  echo "record Deleted successfully";
}
