<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-right has-aside-mobile-transition  has-aside-expanded">
<?php 
include("dist/teacher/connect.core.php");
$getdata = new clear_db();
$connect = $getdata->connect();

?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LpruX - Tracking</title>
  <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="dist/css/main.css">
</head>

  <script type="text/javascript" src="src/js/main.js"></script>
  <script src="https://use.fontawesome.com/f4be251414.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>

<body>

    <?php include("src/menu/slide_menu.php");?>
    <!-- End side menu -->
    <?php 
    if(isset($_GET['page'])){
        $pageid = $getdata->my_sql_query($connect,null,"pages","cases='".$_GET['page']."' AND active='yes' ");
        if(isset($pageid->links)){
            include("src/menu/header.php");
            include($pageid->links); 
        }else{
            echo "page not found.";
        }
    }else{
        include("src/follow/index.php");  
    }
    ?>
    </body>
</html>