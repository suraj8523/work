<!DOCTYPE html>
<html>

<head>
    <title>update</title>
</head>

<body>
    <form action="#" method="post">
        <input type="text" name="id" placeholder="id" value="<?php echo $_GET['id']; ?>"><br><br>
        <input type="text" name="firstname" placeholder="firstname" value="<?php echo $_GET['firstname']; ?>"><br><br>
        <input type="text" name="lastname" placeholder="lastname" value="<?php echo $_GET['lastname']; ?>"><br><br>
        <input type="gmail" name="gmail" placeholder="gmail" value="<?php echo $_GET['gmail']; ?>"><br><br>
        <input type="text" name="number" placeholder="number" value="<?php echo $_GET['number']; ?>"><br><br>
        <input type="text" name="address" placeholder="address" value="<?php echo $_GET['address']; ?>"><br><br>
        <input type="submit" name="submit" value="update">
    </form>
    <?php
    include 'connection.php';
    $firstname = $lastname = $gmail = $number = $address = $id = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = ($_REQUEST['id']);
        $firstname = ($_REQUEST["firstname"]);
        $lastname = ($_REQUEST["lastname"]);
        $gmail = ($_REQUEST["gmail"]);
        $number = ($_REQUEST["number"]);
        $address = ($_REQUEST["address"]);
    }
   


    $sql = "UPDATE reg SET firstname='$firstname' , lastname='$lastname', gmail='$gmail' , number='$number', address='$address'   WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    echo nl2br("
	<h3>You've entered the following details: </h3> 
    <b> Id  : </b> \t $id \n
	<b>Name  :</b>  \t $firstname \n
	<b>Email  :</b>\t $lastname \n
	<b>Mobile  :</b>\t $gmail\n 
	<b>Course  :</b>\t $number \n
	<b>Gender  :</b>\t $address \n

");

    ?>
</body>

</html>