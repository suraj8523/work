<?php
include ('connection.php');
$id = $_REQUEST['id'];
$sql ="DELETE FROM `reg` WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
 ?>