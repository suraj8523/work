<?php
error_reporting(0);
$connect=mysqli_connect('localhost','root','123456','myprograming');
if (isset($_POST['submit'])) {
$username=$_POST['username'];
$email=$_POST['email'];
$language=$_POST['language'];
$xyz=implode(",",$language);
//echo $xyz;
$sql="INSERT INTO `reg1`  VALUES ('$username','$email','$xyz')";
$query=mysqli_query($connect,$sql);
if ($query) {
echo "Data Insrted Successfully";
}else{
echo "Data Not Insrted";
}
}?>
 <!DOCTYPE html>
<html>
<body>
<h1>how to UPDATE multiple selected checkbox values in database in php</h1>
<form action="#" method="POST">
<table border="2">
<tr>
<td>Name:</td>
<td><input type="text" name="username"></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="email" name="email"></td>
</tr>
<tr>
<td>language:</td>
<td><input type="checkbox" value="Gujrati" name="language[]">Gujrati <br>
<input type="checkbox" value="Hindi" name="language[]">Hindi <br>
<input type="checkbox" value="English" name="language[]">English <br>
<input type="checkbox" value="Marathi" name="language[]">Marathi</td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit"></td>
</tr>
</table>
</form>
<h1>SHOW DATA HERE</h1>
<?php
$connect=mysqli_connect('localhost','root','123456','myprograming');
$sql2="SELECT * FROM reg1";
$query2=mysqli_query($connect,$sql2);
?>
<table border="2">
<tr>
<th>id</th>
<th>username</th>
<th>email</th>
<th>lang</th>
<th>language</th>
</tr>
	<?php
while ($row=mysqli_fetch_assoc($query2)) {
	?>
<tr>
	<td><?php echo $row['id'] ?></td>
	<td><?php echo $row['username'] ?></td>
	<td><?php echo $row['email'] ?></td>
	<td><?php echo $row['language'] ?></td>
	<td><a href="update1.php?id=<?php echo $row['id'] ?>"> Update </a></td>
</tr>
	<?php
}
?>
</table>
</body>
</html>