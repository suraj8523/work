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
            <th>firstname</th>
            <th>lastname</th>
            <th>gmail</th>
            <th>number</th>
            <th>address</th>
            <th>edit</th>
            <th>delete</th>
        </tr>

        <?php
        include 'connection.php';

        $sql = "SELECT * FROM reg";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo nl2br("
    <tr>
        <td>  \t$row[id] \t </td>
        <td>    \t $row[firstname] \t </td>
        <td>     \t $row[lastname] \t</td>
        <td>   \t $row[gmail] \t</td>
        <td>    \t $row[number] \t</td>
        <td>    \t $row[address] \t</td>
        <td><a href='update.php?id=$row[id] & firstname=$row[firstname] & lastname=$row[lastname] & gmail=$row[gmail] & number=$row[number] &address=$row[address]'> update </a></td>
        <td><a href='delete.php?id=$row[id]'>delete </a></td>
  
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