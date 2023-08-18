<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $filename=htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
      } 
  
}
$folder = "uploads/" . $filename;
echo "<b> Image Upload  :</b> ".$folder;

?>