<!doctype html>
<html>


<body>

  <form method='post' action='' enctype='multipart/form-data'>
    <input type="file" name="file[]" id="file" multiple><br /><br />

    <input type='submit' name='submit' value='Upload'>
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $countfiles = count($_FILES['file']['name']);
   
    for ($i = 0; $i < $countfiles; $i++) {
      $filename = $_FILES['file']['name'][$i];
      ## Location
      $location = "uploads/" . $filename;
      $extension = pathinfo($location, PATHINFO_EXTENSION);
      $extension = strtolower($extension);
      ## Upload file
      move_uploaded_file($_FILES['file']['tmp_name'][$i], $location);
      echo "file name : " . $filename . "<br/>";
     
    }
  }

  ?>
</body>

</html>