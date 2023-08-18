<?php
$name = $email = $mobile = $course = $gender = $hobbies = $image = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image = (isset($_REQUEST["image"]));
    $name = ($_REQUEST["name"]);
    $email = ($_REQUEST["email"]);
    $mobile = ($_REQUEST["mobile"]);
    $course = ($_REQUEST["course"]);
    $gender = ($_REQUEST["gender"]);
    $hobbies = (isset($_REQUEST['hobbies'])) ? $_REQUEST['hobbies'] : array();

    // image path name and folder save details 
    $filename = $_FILES['image']["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "uploads/" . $filename;
    move_uploaded_file($tempname, $folder);
}

echo "<h2>You've entered the following details: </h2>";
echo  " <b>Name :</b> " . $name;
echo "<br>";
echo "<br>";
echo  " <b> Email :</b> " . $email;
echo "<br>";
echo "<br>";
echo  "<b> Mobile :</b>" . $mobile;
echo "<br>";
echo "<br>";
echo " <b> Course :</b> " . $course;
echo "<br>";
echo "<br>";
echo  " <b> Gender : </b>" . $gender;
echo "<br>";
echo "<br>";
echo " <b> Image Upload :</b> " . $folder;
?>
<p><strong>Hobbies :</strong>
    <?php
    foreach ($hobbies as $hobby) {
        echo '<li>' . $hobby . '</li>';
    }
    ?>