<?php

include "form_connection.php";
$sql = "SELECT * FROM form_details";
$result = mysqli_query($conn, $sql);
$limit = 5;
if (!isset ($_GET['page']) ) { 
    $page_number = 1; 
} else {  
    $page_number = $_GET['page'];  
}
$total_rows = mysqli_num_rows($result);
$total_pages = ceil ($total_rows / $limit); 
$initial_page = ($page_number-1) * $limit;
$getQuery = "SELECT *FROM form_details LIMIT " . $initial_page . ',' . $limit;   
$result = mysqli_query($conn, $getQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Show data</title>
</head>
<body>
    <center>
    <!-- <div align="right">
        <button><a href="form_add_user.php"> ADD USER</a></button>
        <button><a href="form_down_csv.php">CSV FILE</a></button>
        <button><a href="form_down_excel.php"> EXCEL FILE </a></button>
        <button><a href="form_down_pdf.php"> PDF FILE </a></button>
    </div> -->
    <div>
        <h2>Student Details :</h2>
        <table border="2">
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
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php    
                        
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
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
                            <td><a href="form_update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;</td>
                            <td><a href="form_delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>

                <?php       }
                }
                ?>
            </tbody>
        </table>
        <?php
        for($page_number = 1; $page_number<= $total_pages; $page_number++) { 
            echo '<a href = "db.php?page=' . $page_number . '">' . $page_number . ' </a>'; 
        } 
        ?>
       
           

    </div>
    </center>



</body>

</html>