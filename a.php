<!DOCTYPE html>
<html>

<head>
  <title>Form Validation</title>
</head>

<body>
  <?php
  $name = $phone = $email = $addres = $dob = $comments = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $phone = test_input($_POST["phone"]);
    $email = test_input($_POST["email"]);
    $address = test_input($_POST["address"]);
    $dob = test_input($_POST["dob"]);
    // $comments = test_input($_POST["comments"]);
    $comments = $_POST['comments'];
  }
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name"> Name</label>
    <input type="text" name="name">
    <br><br>
    <label for="phone">Phone No.</label>
    <input type="number" name="phone">
    <br><br>
    <label for="email">Email</label>
    <input type="text" name="email">
    <br><br>
    <label for="address">Address</label>
    <textarea name="address" cols="20" rows="3"></textarea>
    <br><br>
    <label for="dob">DOB</label>
    <input type="date" name="dob">
    <br><br>
    <label>Additional Comments:</label><br>
    <textarea cols="35" rows="12" name="comments" id="para1">
    
    </textarea><br>
    <button name="submit">Submit</button>
  </form>

  <?php
  echo "<h2>Your Input:</h2>";
  echo  "Name:" . $name;
  echo "<br>";
  echo "Phone No.:" . $phone;
  echo "<br>";
  echo  "Email:" . $email;
  echo "<br>";
  echo "Address:" . $address;
  echo "<br>";
  echo "DOB:" . $dob;
  echo "<br>"
  // echo $comments;
  // echo "<br>;"
 
  ?>

</body>

</html>