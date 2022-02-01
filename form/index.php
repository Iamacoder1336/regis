<?php
$insert = false;
if(isset($_POST['name'])){
    $submit = true;
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $age= $_POST['age'];
    $rollno = $_POST['rollno'];
    $section = $_POST['section'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO `regis`.`regis` (`name`, `fname`, `age`, `rollno`, `Section`, `phone`, `dt`) VALUES ('$name', '$fname', '$age', '$rollno', ' $section', ' $phone', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert = true;
        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mobile.css">
</head>

<body>
    <!-- <img src="1.webp" class="bg" alt=""> -->
    <div class="container">
        <div class="image">
            <img src="uu.png" alt="">
        </div>
        <h1>Welcome to Uttranchal University</h1>
        <p>Enter your details and submit this form to confirm your registration</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you registration for the Next Semester</p>";
        }
        ?>
       <h3>Please Fill the Registrayion Form</h3>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Student's Name">
            <input type="text" name="fname" id="fname" placeholder="Father's Name">
            <input type="text" name="age" id="age" placeholder="Date of birth">
            <input type="text" name="rollno" id="rollno" placeholder="University Roll no.">
            <input type="text" name="section" id="section" placeholder="Section">
            <input type="phone" name="phone" id="phone" placeholder="Phone number">
            <button class="btn">Submit</button>
        </form>
    </div>
    <!-- INSERT INTO `regis` (`S.No.`, `Student's Name`, `Father's Name`, `DOB`, `University Roll no.`, `Section`, `Phone
    number`, `Date Time`) VALUES ('1', 'Ram', 'shayam', '12', '123456789', 'bs-2', '123456789', '2022-02-01
    10:34:33.000000'); -->
</body>

</html>