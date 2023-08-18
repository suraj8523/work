<?php

include "form1_config.php";

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    
    $name = $_POST['name'];    

    $email  = $_POST['email'];

    $mobile = $_POST['mobile'];

    $course = $_POST['course'];

    $gender = $_POST['gender'];

    $hobbies = $_POST['hobbies'];
    $newvalues =  implode(",", $hobbies);
   
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "UPDATE `form_data` SET
     `name`='$name',
     `email`='$email',
     `mobile`='$mobile',
     `course`='$course',
     `gender`='$gender',
     `hobbies='$newvalues',
     `image`='$target_file'
      WHERE `id`='$id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record updated successfully.";
    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `form_data` WHERE `id`='$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $id = $row['id'];

            $name = $row['name'];

            $email = $row['email'];

            $mobile = $row['mobile'];

            $course  = $row['course'];

            $gender = $row['gender'];

            $hobbies = $row['hobbies'];

            $image = $row['image'];

            
        }
    
  
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Form validation</title>
    <style>
        body {
            font-size: 14px;
            background: #f9f9f9;
            font-family: 'Times New Roman', Times, serif;
        }

        h2 {
            text-align: center;
            text-decoration: underline;
        }

        form {
            width: 800px;
            padding: 15px 40px 40px;
            margin: 50px auto 0;
        }

        input,
        select ,button{
            border: 1px solid #ccc;
            padding: 5px;
            display: inline-block;
            width: 100%;
            box-sizing: border-box;
            border-radius: 2px;
        }

        .row {
            padding-bottom: 10px;
        }

        .form-inline {
            border: 1px solid #ccc;
            padding: 8px 10px 4px;
            border-radius: 2px;
        }

        .form-inline label,
        .form-inline input {
            display: inline-block;
            width: auto;
            padding-right: 15px;
        }

        .error {
            color: red;
            font-size: 90%;
        }

        input[type="submit"] {
            font-size: 110%;
            background: #484e3e;
            margin-top: 10px;
            cursor: pointer;
            color: white;
            font-weight: bold;
        }

        input[type="reset"] ,button{
            font-size: 110%;
            background: #797c7e;
            margin-top: 10px;
            cursor: pointer;
            color: white;
            font-weight: bold;
        }
    </style>

</head>

<body>


    <script>

        function printError(elemId, hintMsg) {
            document.getElementById(elemId).innerHTML = hintMsg;
        }

        // function fileValidation() {
        //     var fileInput = document.getElementById('file');
        //     var filePath = fileInput.value;
        //     var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        //     if (!allowedExtensions.exec(filePath)) {
        //         alert('Invalid file type');
        //         fileInput.value = '';
        //         return false;
        //     }

        // }

        function validateForm() {

            var name = document.contactForm.name.value;
            var email = document.contactForm.email.value;
            var mobile = document.contactForm.mobile.value;
            var course = document.contactForm.course.value;
            var gender = document.contactForm.gender.value;

            // variable declartion for Error printing 
            var nameErr = emailErr = mobileErr = courseErr = hobbiesErr = genderErr = imageErr = true;

            //Hobbies Validation
            var checkboxes = document.getElementsByName("hobbies[]");
            var hobbies = [];
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    hobbies.push(checkboxes[i].value + ",");
                }
            }
            // Image Validation
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                filePath = fileInput.value = '';
            }

            // Name Validation
            if (name == "") {
                printError("nameErr", "Please enter your name");
            } else {
                var regex = /^[a-zA-Z\s]+$/;
                if (regex.test(name) === false) {
                    printError("nameErr", "Please enter a valid name");
                } else {
                    printError("nameErr", "");
                    nameErr = false;
                }
            }

            // Email Validation
            if (email == "") {
                printError("emailErr", "Please enter your email address");
            } else {
                var regex = /^\S+@\S+\.\S+$/;
                if (regex.test(email) === false) {
                    printError("emailErr", "Please enter a valid email address");
                } else {
                    printError("emailErr", "");
                    emailErr = false;
                }
            }

            // Mobile validation 
            if (mobile == "") {
                printError("mobileErr", "Please enter your mobile number");
            } else {
                var regex = /^[1-9]\d{9}$/;
                if (regex.test(mobile) === false) {
                    printError("mobileErr", "Please enter a valid 10 digit mobile number");
                } else {
                    printError("mobileErr", "");
                    mobileErr = false;
                }
            }

            // Course Validation
            if (course == "Select") {
                printError("courseErr", "Please select your course");
            } else {
                printError("courseErr", "");
                courseErr = false;
            }

            // Gender validation 
            if (gender == "") {
                printError("genderErr", "Please select your gender");
            } else {
                printError("genderErr", "");
                genderErr = false;
            }

            // hobbies validation 
            if (hobbies == "") {
                printError("hobbiesErr", "Please select you hobbies");
            } else {
                printError("hobbiesErr", "");
                hobbiesErr = false;
            }

            // Image validation
            if (filePath == "") {
                printError("imageErr", "please select .jpg,.jpeg,.png file to execute");
            } else {
                printError("imageErr", "");
                imageErr = false;
            }
            // printing the data into txt file
            if ((nameErr || emailErr || mobileErr || courseErr || genderErr || hobbiesErr || imageErr) == true) {
                return false;      
            };        
            // } else {
            //     var dataPreview = "You've entered the following details: \n\n " +
            //         "Full Name: " + name + "\n" +
            //         "Email Address: " + email + "\n" +
            //         "Mobile Number: " + mobile + "\n" +
            //         "Hobbies : " + hobbies + "\n" +
            //         "course: " + course + "\n" +
            //         "Gender: " + gender + "\n" +
            //         "Image Path:" + filePath + "\n";

            //     // download the file in txt mode 
            //     const link = document.createElement("a");
            //     const file = new Blob([dataPreview], { type: 'text/plain' });
            //     link.href = URL.createObjectURL(file);
            //     link.download = "Registration_details.txt";
            //     link.click();
            //     URL.revokeObjectURL(link.href);
            // };
        };

    </script>




    <form name="contactForm" onsubmit="return validateForm()" method="POST" action=" " enctype="multipart/form-data">
        <h2>Registration Form</h2>

        <div class="row">
            <label>ID:</label>
            <input type="text" name="id" value="<?php echo $id; ?>">
            
        </div>
        <div class="row">
            <label>Full Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <div class="error" id="nameErr"></div>
        </div>
        <div class="row">
            <label>Email Address:</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <div class="error" id="emailErr"></div>
        </div>
        <div class="row">
            <label>Mobile Number:</label>
            <input type="text" name="mobile" maxlength="10" value="<?php echo $mobile; ?>">
            <div class="error" id="mobileErr"></div>
        </div>
        <div class="row">
            <label>course:</label>
            <select name="course" value="<?php echo $course; ?>">
                <option>Select</option>
                <option>HTML</option>
                <option>CSS</option>
                <option>PYTHON</option>
                <option>JAVA</option>
                <option>JAVASCRIPT</option>
            </select>
            <div class="error" id="courseErr"></div>
        </div>
        <div class="row">
            <label>Gender:</label>
            <div class="form-inline">
                <label><input type="radio" name="gender" value="Male"  <?php if ($gender == 'Male') {
                                                                    echo "checked";
                                                                } ?>> Male</label>
                <label><input type="radio" name="gender" value="Female" <?php if ($gender == 'Female') {
                                                                        echo "checked";
                                                                    } ?>> Female</label>
                
            </div>
            <div class="error" id="genderErr"></div>
        </div>
        <div class="row">
            <label>Hobbies:</label>
            <div class="form-inline">
                <label><input type="checkbox" name="hobbies[]" value="Travelling"> Travelling</label>
                <label><input type="checkbox" name="hobbies[]" value="Riding">Riding</label>
                <label><input type="checkbox" name="hobbies[]" value="Gaming">Gaming</label>
                <label><input type="checkbox" name="hobbies[]" value="Dancing">Dancing</label>
                <label><input type="checkbox" name="hobbies[]" value="Movies">Movies</label>
                <label><input type="checkbox" name="hobbies[]" value="Reading">Reading</label>
            </div>
            <div class="error" id="hobbiesErr"></div>
        </div>
        <div class="row">
            <label>Image Upload:</label>
            <input type="file" id="file" name="image" value="<?php echo $target_file; ?>"/>
            <div class="error" id="imageErr"></div>
        </div>

        <div class="row">
            <input type="submit"  name="update" value="update">
            <input type="reset" value="Reset">
            <!-- <button><a href="form_show.php">show data</a></button> -->
        </div>
    </form>
   
</body>

</html>

<?php

    } else {

        header('Location: form_view.php');
    }
}

?>
