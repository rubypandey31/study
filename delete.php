<?php
$con = mysqli_connect("localhost", "root", "root", "ruby");
$id=$_GET['id'];
   
   
        $result = "DELETE FROM user2 WHERE id='$id'";
        
    

if(mysqli_query($con, $result)){
    echo "Records were deleted successfully.";
}
?>