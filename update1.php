<!DOCTYPE html>
<html>

<body>
<?php
$connect=mysqli_connect('localhost','root','123456','myprograming');
if ($connect) {
	echo "done";
}else{
	echo "error";
}
if (isset($_POST["update"])) {
	$id=$_POST['id'];
$username=$_POST['username'];
$email=$_POST['email'];
$language=$_POST['language'];
	$xyz=implode(",",$language);
	$sql2="UPDATE `reg1` SET `id`='$id',`username`='$username',`email`='$email',`language`='$xyz' WHERE id='$id'";
	$con=mysqli_query($connect,$sql2);
if ($con) {
 echo " <script> location.replace('index1.php'); </script>" ;
//echo "update";
}else{
echo "error";
}
}
$mid=$_GET['id'];
$sql="SELECT * FROM reg1 WHERE id='$mid' ORDER BY id DESC";
$data=mysqli_query($connect,$sql);
while ($result=mysqli_fetch_array($data)) {
$a=$result['language'];
$b=explode(",", "$a");
print_r($b);
?>
<form action="#" method="POST">
<table border="2">
<tr>
	<th><input type="text" name="id" value="<?php echo $result['id']; ?>" placeholder="name"></th>
</tr>
<tr>
<td>Name:</td>
<td><input type="text" name="username"  value="<?php echo $result['username']; ?>"></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="email" name="email"  value="<?php echo $result['email']; ?>"></td>
</tr>
<tr>
<td>language:</td>
<td><input type="checkbox" value="Gujrati" name="language[]"
<?php
	if (in_array("Gujrati", $b)) {
		echo "checked";
	}
	?>
	>Gujrati <br>
<input type="checkbox" value="Hindi" name="language[]"
<?php
	if (in_array("Hindi", $b)) {
		echo "checked";
	}
	?>
>Hindi <br>
<input type="checkbox" value="English" name="language[]"
<?php
	if (in_array("English", $b)) {
		echo "checked";
	}
	?>
>English <br>
<input type="checkbox" value="Marathi" name="language[]"
<?php
	if (in_array("Marathi", $b)) {
		echo "checked";
	}
	?>
>Marathi</td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="update"></td>
</tr>
</table>
</form>
<?php
}
?>
</body>
</html>