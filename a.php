<?php
include("developers.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <br><br>

  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <h3 class="text-primary"> HTML Form to Insert Data</h3>
        <p><?php echo !empty($result) ? $result : ''; ?></p>
        <!--=== HTML Form==-->
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Full Name" name="fullName" value="<?php echo $editData['fullName'] ?? ''; ?>">
          </div>

          <div class="form-group">

            <div class="form-check-inline">

              <input type="radio" class="form-check-input" name="gender" value="male" <?php echo isset($editData['gender']) && ($editData['gender'] == 'male') ? 'checked' : ''; ?>>Male
            </div>
            <div class="form-check-inline">
              <input type="radio" class="form-check-input" name="gender" value="female" <?php echo isset($editData['gender']) && ($editData['gender'] == 'female') ? 'checked' : ''; ?>>Female
            </div>
          </div>

          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email Address" name="email" value="<?php echo $editData['email'] ?? ''; ?>">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Mobile Number" name="mobile" value="<?php echo $editData['mobile'] ?? ''; ?>">
          </div>

          <div class="form-group">

            <textarea class="form-control" name="address" placeholder="Address">
         <?php echo $editData['address'] ?? ''; ?>
       </textarea>

          </div>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $editData['city'] ?? ''; ?>">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="State" name="state" value="<?php echo $editData['state'] ?? ''; ?>">
          </div>

          <button type="submit" name="<?php echo empty($editData) ? 'save' : 'update'; ?>" class="btn btn-primary">Save</button>
        </form>
        <!--=== HTML Form=== -->
      </div>
    </div>
  </div>

</body>

</html>