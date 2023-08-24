<!DOCTYPE html>
<html lang="en">

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
        select,
        button {
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

        input[type="reset"],
        button {
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
    <form>
        <h2>Registration Form</h2>
        <div class="row">
            <label>Full Name:</label>
            <input type="text" name="name">
        </div>
        <div class="row">
            <label>Email Address:</label>
            <input type="text" name="email">
        </div>
        <div class="row">
            <label>Mobile Number:</label>
            <input type="text" name="mobile" maxlength="10">
        </div>
        <div class="row">
            <label>course:</label>
            <select name="course">
                <option>Select</option>
                <option value="html">HTML</option>
                <option value="css">CSS</option>
                <option value="python">PYTHON</option>
                <option value="java">JAVA</option>
                <option value="javascript">JAVASCRIPT</option>
            </select>
        </div>
        <div class="row">
            <label>Gender:</label>
            <div class="form-inline">
                <label><input type="radio" name="gender" value="male"> Male</label>
                <label><input type="radio" name="gender" value="female"> Female</label>
            </div>
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
        </div>
        <div class="row">
            <label>Image Upload:</label>
            <input type="file" id="file" name="image" />
        </div>

        <div class="row">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </div>
    </form>

</body>

</html>