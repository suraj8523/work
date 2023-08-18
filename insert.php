<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => 123456
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "123456", "staff");

		// Check connection
		if ($conn === false) {
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}

		// Taking all 5 values from the form data(input)
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$mobile = $_REQUEST['mobile'];
		$course = $_REQUEST['course'];
		$gender = $_REQUEST['gender'];
		$hobbies = $_REQUEST['hobbies'];
		$newvalues=  implode(",", $hobbies);
		$image = $_REQUEST['image'];


		// inserting value into the table 
		$sql = "INSERT INTO college VALUES ('$name',
			'$email','$mobile','$course','$gender','$newvalues','$image')";

		if (mysqli_query($conn, $sql)) {
			echo "<h3>data stored in a database successfully."
				. " Please browse your localhost php my admin"
				. " to view the updated data</h3>";

			echo nl2br("\n$name\n $email\n "
				. "$mobile\n $course\n "
				. "$gender \n $newvalues \n "
				. " $image");
		} else {
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}

		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>