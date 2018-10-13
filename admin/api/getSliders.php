<?php
include "../tools/mySql.php";
$sql = "select value from options where id in(10)";

$arr = excute_select($sql);

echo $arr[0]['value'];