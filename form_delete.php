<?php

include ('form_connection.php');
$id = $_REQUEST['id'];
$sql ="DELETE FROM `form_details` WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
  echo " <script> location.replace('form_show.php'); </script>" ;

} else {
  echo "Error deleting record: " . $conn->error;
}
?>