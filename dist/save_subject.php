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

$sql = "INSERT INTO subject (id,subject_id, subject_name,term)
VALUES (NULL, '$_POST[subject_id]', '$_POST[subject_name]', '$_POST[term]')";

if (mysqli_query($conn, $sql)) {
    echo "<meta http-equiv='refresh' content='2;url=add_subject.php' />";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>