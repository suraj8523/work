<?php
include 'form_connection.php';

if (isset($_POST['search'])) {

    $id = $_POST['id'];
}
$sql = "SELECT * FROM form_details WHERE id=$id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        //echo '<script>alert("Records Found In database")</script>';

        echo nl2br(

            "<h2> Reacods founs in the database </h2>".
            "<br>".
            "Id -:" . $row['id'].
            "<br>".
            "Name--:" . $row['name'].
            "<br>".
            "Email---:" .$row['email'].
            "<br>".
            "Mobile--:".$row['mobile'].
            "<br>".
            "Course --:".$row['course'].
            "<br>".
            "Gender---:".$row['gender'].
            "<br>".
            "Hobbies--:".$row['hobbies'].
            "<br>".
            "Image--:".$row['image'].
            "<hr>"
        );
    }
} else {
    echo "0 results";
}
