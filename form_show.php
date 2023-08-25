<?php

include "form_connection.php";
$sql = "SELECT * FROM form_details";
$result = mysqli_query($conn, $sql);
$limit = 5;
if (isset($_GET["page"])) {
    $page_number  = $_GET["page"];
} else {
    $page_number = 1;
}
// get the initial page number
$initial_page = ($page_number - 1) * $limit;
// get data of selected rows per page 
$getQuery = "SELECT * FROM form_details LIMIT $initial_page, $limit";
$result = mysqli_query($conn, $getQuery);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Show data</title>
</head>

<body>
    <center>
        <div align="right">
            <button><a href="form_add_user.php"> ADD USER</a></button>
            <button><a href="form_down_csv.php">CSV FILE</a></button>
            <button><a href="form_down_excel.php"> EXCEL FILE </a></button>
            <button><a href="form_down_pdf.php"> PDF FILE </a></button>
        </div>
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
            <div>
                <?php
                $getQuery = "SELECT COUNT(*) FROM form_details";
                $result = mysqli_query($conn, $getQuery);
                $row = mysqli_fetch_row($result);
                $total_rows = $row[0];
                echo "</br>";
                // get the required number of pages
                $total_pages = ceil($total_rows / $limit);
                $pageURL = "";
                if ($page_number >= 2) {
                    echo "<a href='form_show.php?page=" . ($page_number - 1) . "'> Prev </a>";
                }
                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($i == $page_number) {
                        $pageURL .= "<a href='form_show.php?page=" . $i . "'>" . $i . " </a>";
                    } else {
                        $pageURL .= "<a href='form_show.php?page=" . $i . "'>" . $i . " </a>";
                    }
                };
                echo $pageURL;
                if ($page_number < $total_pages) {
                    echo "<a href='form_show.php?page=" . ($page_number + 1) . "'>  Next </a>";
                }
                ?>
            </div>
            <div align="right">
                <input id="page" type="number" min="1" max="<?php echo $total_pages ?>" placeholder="<?php echo $page_number . "/" . $total_pages; ?>" required>
                <button onClick="go2Page();">Go</button>
            </div>


        </div>
    </center>

    <script>
        function go2Page() {
            var page = document.getElementById("page").value;
            page = ((page > <?php echo $total_pages; ?>) ? <?php echo $total_pages; ?> : ((page < 1) ? 1 : page));
            window.location.href = 'form_show.php?page=' + page;
        }
    </script>


</body>

</html>