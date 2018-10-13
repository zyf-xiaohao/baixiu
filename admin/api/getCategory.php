<?php
include "../tools/mySql.php";
$sql = "select * from categories";

$data = excute_select($sql);

echo json_encode($data);