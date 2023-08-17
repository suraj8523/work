<?php
include ('form_connection.php');
$id = $_REQUEST['id'];
$sql ="DELETE FROM `form_details` WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
 ?>