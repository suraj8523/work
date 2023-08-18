<?php
if (isset($_FILES['image'])) {
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "image/" . $file_name);
        echo "Success";
    } 
}
?>
<html>

<body>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Image upload</label>
        <input type="file" name="image" />
        <input type="submit" />
    </form>

</body>

</html>