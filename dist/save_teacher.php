<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lprux";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO user (
 ID,
 Username,
 Password,
 name_title,
 Fullname,
 Userlevel,
 t_email, 
 branch, 
 faculty,
 T_ID)
VALUES (NULL,
  '$_POST[Username]',
  '$_POST[Password]',
  '$_POST[name_title]',
  '$_POST[Fullname]', 
  '$_POST[Userlevel]', 
  '$_POST[t_email]', 
  '$_POST[branch]', 
  '$_POST[faculty]',  
  '$_POST[T_ID]')";

if (mysqli_query($conn, $sql)) {
    echo "<meta http-equiv='refresh' content='2;url=add_teacher.php' />";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
