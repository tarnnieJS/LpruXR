<?php

//action.php

include('database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':Username'  => $_POST['Username'],
  ':Password'  => $_POST['Password'],
  ':Fullname'  => $_POST['Fullname'],
  ':Userlevel'   => $_POST['Userlevel'],
  ':ID'    => $_POST['ID']
 );

 $query = "
 UPDATE user 
 SET Username = :Username, 
 Password = :Password, 
 Fullname = :Fullname,
 Userlevel = :Userlevel 
 WHERE ID = :ID
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM user 
 WHERE ID = '".$_POST["ID"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>