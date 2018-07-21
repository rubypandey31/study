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
$email_error = $password_error = "";
if (count($_POST) > 0) {
    $database_flag = 0;
    $email_id = $_POST['email'];
    if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
        $email_error = 'please enter id';
        $database_flag = 1;
    }
    $password = $_POST['password'];

    if ($password == "") {
        $password_error = 'enter password';
        $database_flag = 1;
    }
    if ($database_flag == 0) {
        $query = mysqli_query($con, "select * from user2 where email= '$email_id' and password = '$password'");
        $result = mysqli_fetch_row($query);
        if (count($result) > 0) {
            $_SESSION['email'] = $result[3];
            header('Location: start.php');
        } else {
            echo 'Please enter correct user name and password';
        }
    }
}
?>
<html>
    <head> <title>LOGIN FORM </title>
        <style>
            span{
                color:red
            }
        </style>

    </head>
    <body>
        <h1> LOGIN FORM </h1>
        <form method="post">

            <label> Email</label>
            <input type="text" name="email">
            <span>* <?php echo $email_error; ?></span>

            </br></br>
            <label> Password </label>
            <input type="password" name="password">
            <span>* <?php echo $password_error; ?></span>
            </br></br>
            <input type="submit" name="submit" value="submit">
            
        </form>
        <div><a href="register.php">Registration</a></div>
       
        
        
        </br>
        
    </body>
</html>