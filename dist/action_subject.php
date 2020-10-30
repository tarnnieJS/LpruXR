<?php

//action.php

include('database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':subject_id'  => $_POST['subject_id'],
  ':subject_name'  => $_POST['subject_name'],
  ':id'    => $_POST['id']
 );

 $query = "
 UPDATE subject 
 SET subject_id = :subject_id, 
 subject_name = :subject_name,  
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM subject 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>