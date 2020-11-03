<?php

//fetch.php

include('database_connection.php');

$column = array("r_id", "s_group", "term" , "subject_id", "T_ID" );

$query = "SELECT * FROM register ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE term LIKE "%'.$_POST["search"]["value"].'%" 
 OR subject_id LIKE "%'.$_POST["search"]["value"].'%" 
 OR s_group LIKE "%'.$_POST["search"]["value"].'%" 
 OR T_ID LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY r_id DESC ';
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
 $sub_array[] = $row['r_id'];
 $sub_array[] = $row['term'];
 $sub_array[] = $row['s_group'];
 $sub_array[] = $row['subject_id'];
 $sub_array[] = $row['T_ID'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM register";
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