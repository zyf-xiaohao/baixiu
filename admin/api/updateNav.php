<?php
$value = $_POST['value'];

$sql = "update options set value = '$value' where id = 9 ";
include '../tools/mySql.php';
$arr = excute_zsg($sql);
if (count($arr) > 0) {
    echo 'ok';
} else {
    echo 'fail';
}