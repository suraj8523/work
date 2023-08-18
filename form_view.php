<?php

include "form_connection.php";

$sql = "SELECT * FROM form_details";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>users</h2>

        <table class="table">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Mobile</th>

                    <th>Course</th>

                    <th>Gender</th>

                    <th>Hobbies</th>

                    <th>Image</th>

                </tr>

            </thead>

            <tbody>

                <?php

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                ?>

                        <tr>

                            <td><?php echo $row['id']; ?></td>

                            <td><?php echo $row['name']; ?></td>

                            <td><?php echo $row['email']; ?></td>

                            <td><?php echo $row['mobile']; ?></td>

                            <td><?php echo $row['course']; ?></td>

                            <td><?php echo $row['gender']; ?></td>

                            <td><?php echo $row['hobbies']; ?></td>

                            <td><?php echo $row['image']; ?></td>

                            <td><a class="btn btn-info" href="form_update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                        </tr>

                <?php       }
                }

                ?>

            </tbody>

        </table>

    </div>

</body>

</html>