<?php
session_start();
if (!empty($_SESSION['email'])) {
    header('Location: start.php');
}
ini_set('display_errors', 1);
error_reporting(E_ALL);
$con = mysqli_connect("localhost", "root", "root", "ruby");
//check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$name_error = $gender_error = $email_error = $password_error = $mobile_no_error = "";

if (count($_POST) > 0) {
    
    $database_flag = 0;
    $name = $_POST["name"];
    if ($name == "") {
        $name_error = " please enter name";
        $database_flag = 1;
    }
    $gender = $_POST["gender"];
    if ($gender == "") {
        $gender_error = "please select gender";
        $database_flag = 1;
    }
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please enter correct email.";
        $database_flag = 1;
    }else{
        $sql = "SELECT * FROM user2 WHERE email='$email'";
  	$res = mysqli_query($con, $sql);
        if(mysqli_num_rows($res) > 0){
            $email_error = "This id is already exists.";
            $database_flag = 1;
        }
    }
    $password = $_POST["password"];
    if ($password == "") {
        $password_error = "enter password";
        $database_flag = 1;
    }
    $mobile_no = $_POST["mobile_no"];
    if ($mobile_no == "") {
        $mobile_no_error = "enter password";
        $database_flag = 1;
    }
   
        mysqli_query($con, "insert into user2(name,email,gender, password,mobile_no) values ('$name','$email', '$gender', '$password',$mobile_no)");
    }

?>
<html>
    <head> <title> register</title>
    </head
    <body>
        <h1> Register Here</h1>

        <form method="post">
            <label> Name </label>
            <input type="text" name="name">
            <span> <?php echo $name_error; ?></span>

            </br></br>
            <label> Gender </label>
            </br>
            <input type="radio" name="gender" value="male"> Male </br>
            <input type="radio" name="gender" value="female"> Female </br>
            <input type="radio" name="gender" value="other"> other </br>
            <span> <?php echo $gender_error; ?></span>

            </br></br>
            <label> Email </label> </br>
            <input type="text" name="email">  </br>
            <span> <?php echo $email_error; ?></span>

            </br></br>
            <label>Password </label> </br>
            <input type="text" name="password" ><br>
            <span> <?php echo $password_error; ?> </span>


            </br></br>
            <label>Mobile no </label> </br>
            <input type="number" name="mobile_no" ><br>
            <span> <?php echo $mobile_no_error; ?></span>
            </br>
            <input type="submit" value="submit"><br>
             <div class="login-link"><a href="login1.php">Login</a></div>
        </form>
    </body>
</html>