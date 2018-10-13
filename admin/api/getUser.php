<?php
include "../tools/mySql.php";
$sql = "select * from users";

$data = excute_select($sql);

echo json_encode($data);