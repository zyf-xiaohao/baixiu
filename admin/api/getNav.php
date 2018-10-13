<?php
include "../tools/mySql.php";
$sql = "select value from options where id in(9)";

//echo $sql;
$arr = excute_select($sql);
//var_dump($arr);
echo $arr[0]['value'];