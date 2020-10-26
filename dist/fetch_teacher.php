<?php

//fetch.php

include('database_connection.php');

$column = array("ID", "Username", "Password" , "Fullname", "Userlevel");

$query = "SELECT * FROM user ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE Username LIKE "%'.$_POST["search"]["value"].'%" 
 OR Password LIKE "%'.$_POST["search"]["value"].'%" 
 OR Fullname LIKE "%'.$_POST["search"]["value"].'%" 
 OR Userlevel LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY ID DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
// echo $query ;
// exit;
$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['ID'];
 $sub_array[] = $row['Username'];
 $sub_array[] = $row['Password'];
 $sub_array[] = $row['Fullname'];
 $sub_array[] = $row['Userlevel'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM user";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>