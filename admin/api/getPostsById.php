<?php
$postId = $_GET['id'];
include "../tools/mySql.php";
$sql="select * from posts where id = '$postId'";

$data = excute_select($sql);

echo json_encode($data[0]);