<?php
$id = $_POST['id'];

include "../tools/mySql.php";
$sql = "delete from categories where id in($id)";

$arr = excute_zsg($sql);
if (count($arr) > 0) {
    echo 'ok';
} else {
    echo 'fail';
}