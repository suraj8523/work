<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "form_data1";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create database
// $sql = "CREATE DATABASE form_data1";
// if (mysqli_query($conn, $sql)) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . mysqli_error($conn);
// }

//CREATE TABLES
// $sql = "CREATE TABLE form_details (
// 			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// 			name VARCHAR(50),
// 			email VARCHAR(50),
// 			mobile VARCHAR(15),
// 			course VARCHAR(70),
// 			gender VARCHAR(8),
// 			hobbies VARCHAR(100),
// 			image VARCHAR(100),
// 			reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// 			)";

// 			if ($conn->query($sql) === TRUE) {
// 			  echo "Table Form_details  created successfully";
// 			} else {
// 			  echo "Error creating table: " . $conn->error;
// 			}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Taking all 5 values from the form data(input)
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];
    $course = $_REQUEST['course'];
    $gender = $_REQUEST['gender'];
    $hobbies = $_REQUEST['hobbies'];
    $newvalues =  implode(",", $hobbies);
    

    // upload image send into the directory
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
}

// INSERTING THE VALUES INTO THE DATABASE
$sql = "INSERT INTO form_details (Name, email , mobile , course , gender ,hobbies, image )
    VALUES ('$name','$email','$mobile','$course','$gender','$newvalues','$target_file')";

if (mysqli_query($conn, $sql)) {
    echo "successfully data inserted into database";
} else {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }



// SEARCHING THE DETAILS BY WHERE CLAUSE 
// $sql = "SELECT id, name FROM form_details WHERE name='ss'";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   while($row = mysqli_fetch_assoc($result)) {
//     echo "id: " . $row["id"]. " - Name: " . $row["name"];
//   }
// } else {
//   echo "0 results";
// }

// sql to delete a record
// $sql = "DELETE FROM form_details WHERE id=4";

// if ($conn->query($sql) === TRUE) {
//   echo "Record deleted successfully";
// } else {
//   echo "Error deleting record: " . $conn->error;
// }

//UPDATE THE DATA 
// $sql = "UPDATE form_details SET name='suraj Doe' WHERE id=2";

// if (mysqli_query($conn, $sql)) {
//   echo "Record updated successfully";
// } else {
//   echo "Error updating record: " . mysqli_error($conn);
// }

// ORDER BY 
// $sql = "SELECT id, name, email FROM form_details ORDER BY id";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   while($row = mysqli_fetch_assoc($result)) {
//     echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }

//SELECT DATA 
// $sql = "SELECT id, name, hobbies FROM form_details";
// $result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   while($row = mysqli_fetch_assoc($result)) {
//     echo "id: " . $row["id"]. " - Name: " . $row["name"]. " Hobbies -" . $row["hobbies"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }

mysqli_close($conn);

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
?>