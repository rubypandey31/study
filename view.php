<?php
$con = mysqli_connect("localhost", "root", "root", "ruby");
$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM user2 where id=$id");
while ($row = mysqli_fetch_row($result)) {
    $name = $row[1];
    $gender = $row[2];
    $email = $row[3];
    $password = $row[4];
    $mobile_no = $row[5];
}
 mysqli_query($con, "view user2 set name = '$name', email = '$email',gender = '$gender', password = '$password', mobile_no = $mobile_no where id = $edit_id");
?>
<html>
    <head><title> view</title>>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <table>
        <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $gender; ?></td>
        </tr>
    </table>
</html>