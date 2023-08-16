<?php
		$name = $email = $mobile = $course = $gender = $hobbies = $image = "";
		//servername => localhost
		// username => root
		// password => 123456
		// database name => Demodb

		$conn = mysqli_connect("localhost", "root", "123456", "Demodb");
		// Check connection
		if ($conn === false) {
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}

		// Check connection
		if ($conn === false) {
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}


		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			// Taking all 5 values from the form data(input)
			$name = $_REQUEST['name'];
			$email = $_REQUEST['email'];
			$mobile = $_REQUEST['mobile'];
			$course = $_REQUEST['course'];
			$gender = $_REQUEST['gender'];
			$hobbies = $_REQUEST['hobbies'];
			$newvalues =  implode(",", $hobbies);
			$image = $_REQUEST['image'];
		
		
			// upload image send into the directory
			$target_dir = "images/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
		}

		// inserting value into the table 
		$sql = "INSERT INTO college(name,email,mobile,course,gender,hobbies,image)
		VALUES ('$name','$email','$mobile','$course','$gender','$newvalues','$target_file')";

		if (mysqli_query($conn, $sql)) {
			echo "<h3>data stored in a database successfully."
				. " Please browse your localhost php my admin"
				. " to view the updated data</h3>";

			echo nl2br("

				Name : \t $name \n
				Email :\t $email \n
				Mobile :\t$mobile \n
				Course :\t $course \n
				Gender :\t $gender \n
				Hobbies : \t$newvalues \n
				Image : \t$image


			");		

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
	