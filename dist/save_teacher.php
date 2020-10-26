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

$sql = "INSERT INTO user (ID, Username, Password, Fullname, Userlevel)
VALUES (NULL, '$_POST[Username]', '$_POST[Password]', '$_POST[Fullname]', '$_POST[Userlevel]')";

if (mysqli_query($conn, $sql)) {
    echo "<meta http-equiv='refresh' content='2;url=add_teacher.php' />";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>