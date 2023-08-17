<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show data</title>
</head>

<body>

    <table border="2">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>mobile</th>
            <th>course</th>
            <th>gender</th>
            <th>hobbies</th>
            <th>image</th>
            <th>edit</th>
            <th>delete</th>
        </tr>

        <?php
        include 'form_connection.php';

        $sql = "SELECT * FROM form_details";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo nl2br("
    <tr>
        <td>  \t$row[id] \t </td>
        <td>  \t $row[name] \t </td>
        <td>  \t $row[email] \t</td>
        <td>  \t $row[mobile] \t</td>
        <td>  \t $row[course] \t</td>
        <td>  \t $row[gender] \t</td>
        <td>  \t $row[hobbies] \t</td>
        <td>  \t $row[image] \t</td>
        <td><a href='form_update.php?id=$row[id] & name=$row[name] & email=$row[email] & mobile=$row[mobile] & course=$row[course] & gender=$row[gender] & hobbies=$row[hobbies] & image=$row[image]'  target='_blank'> update </a></td>

        <td><a href='form_delete.php?id=$row[id]'>delete </a></td>
  
    </tr>
  ");
            }
        } else {
            echo "0 results";
        }
        ?>


    </table>
    <a href=""></a>
</body>

</html>