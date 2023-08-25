<!-- <?php

        // //create text file
        // touch("images/abc.txt");
        // // touch("images/abc.txt");
        // touch("abc.txt");

        // //create ms word .doc file
        // touch("abc.doc");

        // //create pdf file
        // touch('abc.pdf');



        // //create text file
        // fopen("abc.txt","w");

        // //create ms word .doc file
        // fopen("abc.doc","w");

        // //create pdf file
        // fopen('abc.pdf',"w");



        // //open file abc.txt
        // $myfile = fopen("abc.txt", "w");

        // $text = "Hello Suraj Raj";

        // fwrite($myfile, $text);

        // fclose($myfile);

        ?>

<html>
<head>
<title>PHP File create/write Example</title>
</head>
<body>

<FORM method="POST">

Enter String : <input type="text" name="name"> <br/>
<br/>
<input type="submit" name="Submit1" value="Write File">
</FORM>
<?php

// if(isset($_POST['Submit1']))
// {
// //open file abc.txt in append mode
// $myfile = fopen("abc.txt", "a");

// $text = $_POST["name"];

// fwrite($myfile, $text);
// if ($conn->query($sql) === TRUE) {
//     echo "record Deleted successfully";
//   }

// fclose($myfile);
// }

?>

</body>
</html>



 <?php

    // $file=fopen("abc.txt","r");

    // $readfile=fgets($file);
    // echo $readfile;

    // fclose($file);

    ?> -->


<!-- <html>
<head>
<title>PHP fgets() Example</title>
</head> 
<body>
<FORM method="POST">
Enter String1 : <input type="text" name="str"> <br/> 
Enter String2 : <input type="text" name="str1"> <br/> <br/>
<input type="submit" name="Submit1" value="Create File">
<input type="submit" name="Submit2" value="Read File - gets()">
</FORM> -->
<?php
// if(isset($_POST['Submit1']))
// {
// //open file abc.txt in append mode
// $myfile = fopen("abc.txt", "a");

// $text = $_POST["str"]. PHP_EOL . $_POST["str1"];
// fwrite($myfile, $text);

// fclose($myfile); 
// echo "file created !!";
// }
// if(isset($_POST['Submit2']))
// {
// $file=fopen("abc.txt","r");

// $readfile=fgetc($file);
// echo $readfile;

// fclose($file);
// }
?>


<?php

// $file = fopen("abc.txt","r");

// while(!feof($file))
// {
// echo fgets($file)."<br>";
// }

// fclose($file);

?>
<?php

// copy a file 
// $file=copy("abc.txt","fileabc.txt");;
// if($file== TRUE){
//     echo "successfully Copy your  file ";
// }else{
//     echo 'failed to Copied ';
// }



// Delete a file 
// $file=unlink("newabcd.txt");
// if($file== TRUE){
//     echo "successfully Deleted file ";
// }else{
//     echo 'failed to delete ';
// }

// //open ms word .doc file
// copy("abc.doc","newabc.doc");

// //open pdf file
// copy('abc.pdf',"newabc.pdf");

?>
<?php

// //copy text file
// copy("abc.txt","newabc.txt");

// //open ms word .doc file
// copy("abc.doc","newabc.doc");

// //open pdf file
// copy('abc.pdf',"newabc.pdf");

// 
?>
<?php

// //copy text file
// $copy=copy("abc.txt","newabc.txt");
// if($copy== TRUE){
//     echo"Successfully copied";
// }else{
//     echo'Failed to coppy';
// }

// //open ms word .doc file
// $copy=copy("abc.doc","newabc.doc");
// if($copy== TRUE){
//     echo"Successfully copied";
// }else{
//     echo'Failed to coppy';
// }

// //open pdf file
// $copy=copy('abc.pdf',"newabc.pdf");
// if($copy== TRUE){
//     echo"Successfully copied";
// }else{
//     echo'Failed to coppy';
// }

?>
<?php

// //check file existence
// if(file_exists("abc.txt"))
// {
// echo "file available";
// }
// else
// {
// echo "file not available";
// }

?>
<?php

// echo realpath("abc.txt");


// echo filesize("abc.txt");

?>
<!-- <HTML>
<head>
<title>Create Directory in PHP</title>
</head>
<body>
<FORM method="POST">
Enter Directory Name : <input type="text" name="str"> <br/> <br/>
<input type="submit" name="Submit1" value="Create Directory">
</FORM>

<?php
// if(isset($_POST["Submit1"]))
// {
// $file=mkdir($_POST["str"]);
// if($file== TRUE){
// echo "Directory Created.";
// }else{
//     echo 'Error Creating directory.';
// }
// }
?>
</body>
</HTML> -->

<!-- <HTML>
<head>
<title>Create Directory in PHP</title>
</head>
<body>
<FORM method="POST">
Enter Directory Name : <input type="text" name="str"> <br/> <br/>
<input type="submit" name="Submit1" value="Create Directory">
</FORM>

<?php
// if(isset($_POST["Submit1"]))
// {
// mkdir($_POST["str"]);
// echo "Directory Created.";
// }

?>
?>
</body>
</HTML> -->

<!-- <HTML>
<head>
<title>Remove Directory in PHP</title>
</head>
<body>
<FORM method="POST">
 Enter Directory Name : <input type="text" name="str"> <br/> <br/>
<input type="submit" name="Submit1" value="Remove Directory">
</FORM>

<?php
// if(isset($_POST["Submit1"]))
// {
//  rmdir($_POST["str"]);
//  echo "Directory Removed.";
// }
?>
</body>
</HTML> -->
<!-- 
<HTML>
<head>
<title>Read Diretory in PHP</title>
</head>
<body>
<FORM method="POST">
Enter Directory Name : <input type="text" name="str"> <br/> <br/>
<input type="submit" name="Submit1" value="Read Files">
</FORM>

<?php
// if(isset($_POST["Submit1"]))
// {
// $dir=opendir($_POST["str"]);
// while($file=readdir($dir))
// {
// echo $file ."<br/>";
// }
// }
?>
</body>
</HTML> -->


<form method="post">
    Enter Number :
    <input type="text" name="name"><br />
    <input type="submit" value="Check" name="Submit1"> <br />

</form>

<?php
if (isset($_POST['Submit1'])) {
    //create function to check no. is odd or even
    function inputnumber($num)
    {
        if ($num % 2 != 0) {
            throw new Exception("Error !! The number is odd");
        }
        return true;
    }

    try {
        inputnumber($_POST["name"]);
        echo 'The number is even';
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

</body>

</html>