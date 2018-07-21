<?php
$con = mysqli_connect("localhost", "root", "root", "ruby");
$edit_id = $_GET['id'];
$name = $_GET['name'];

$result = mysqli_query($con, "SELECT * FROM user2 where id=$edit_id");
while ($row = mysqli_fetch_row($result)) {
    
    $name = $row[1];
    $gender = $row[2];
    $email = $row[3];
    $password = $row[4];
    $mobile_no = $row[5];
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
   
//        mysqli_query($con, "insert into user2(name,email,gender, password,mobile_no) values ('$name','$email', '$gender', '$password',$mobile_no)");
        mysqli_query($con, "update user2 set name = '$name', email = '$email',gender = '$gender', password = '$password', mobile_no = $mobile_no where id = $edit_id");
    }

?>
<html>
    <head> <title> Edit</title>
    </head>
    <body>
        <h1> Edit</h1>
        <form method="post">
            <label> Name </label>
            <input type="text" name="name" value="<?php echo $name; ?>" name="name">
            </br></br>
            <label> Gender </label>
            </br>
            <input type="radio" name="gender" value="male" <?php echo ($gender == 'male') ? 'checked' : ''; ?>> Male </br>
            <input type="radio" name="gender" value="female" <?php echo ($gender == 'female') ? 'checked' : ''; ?>> Female </br>
            <input type="radio" name="gender" value="other" <?php echo ($gender == 'other') ? 'checked' : ''; ?>> other </br>
            </br></br>
            <label> Email </label> </br>
            <input type="text" name="email" value="<?php echo $email; ?>" name="email">
            </br></br>
            <label>Password </label> </br>
            <input type="text" name="password" value=" <?php echo $password; ?>" name="password"><br>
            </br></br>
            <label> Mobile_no </label> </br>
            <input type="text" name="mobile_no" value=" <?php echo $mobile_no; ?>" name="mobile_no"><br>
            </br>
            <input type="submit" value="update"><br>
        </form>
    </body>
</html>

