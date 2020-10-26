<?php

//action.php

include('database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':student_id'  => $_POST['student_id'],
  ':sect'  => $_POST['sect'],
  ':student_name'  => $_POST['student_name'],
  ':birthday'   => $_POST['address'],
  ':email'   => $_POST['email'],
  ':status'   => $_POST['status'],
  ':id'    => $_POST['id']
 );

 $query = "
 UPDATE user 
 SET student_id = :student_id, 
 sect = :sect, 
 student_name = :student_name,
 birthday = :birthday 
 address = :address 
 email = :email
 status = :status  
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM student 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>