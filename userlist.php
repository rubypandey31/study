<?php
$con = mysqli_connect("localhost", "root", "root", "ruby");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT * FROM user2");

$table = "<table border='1'>
<tr>
<th>name</th>
<th>gender</th>
<th>emal</th>
<th>password</th>
<th>mobile_no</th>
<th>update</th>
<th>Delete</th>
</tr>";

while ($data = mysqli_fetch_array($result)) {
    $id = $data['id'];
    $table .= "<tr>";
    $table .= "<td>" . $data['name'] . "</td>";
    $table .= "<td>" . $data['gender'] . "</td>";
    $table .= "<td>" . $data['email'] . "</td>";
    $table .= "<td>" . $data['password'] . "</td>";
    $table .= "<td>" . $data['mobile_no'] . "</td>";
    $table .="<td><a href='Edit.php?id=$id'>Edit</a></td>";
    $table .="<td><a href='delete.php?id=$id'>Delete</a></td>";
    $table .="<td><a href='view.php?id=$id'>View</a></td>";
    $table .= "</tr>";
  
    
}

$table .= "</table>";
echo $table;
?>
</br></br>
<div>
    <a href="logout1.php">Logout</a>
</div>