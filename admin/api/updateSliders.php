<?php
$sliders = $_POST['sliders'];

$sql = "update options set value = '$sliders' where id = 10 ";
include '../tools/mySql.php';
$arr = excute_zsg($sql);
if (count($arr) > 0) {
    echo 'ok';
} else {
    echo 'fail';
}