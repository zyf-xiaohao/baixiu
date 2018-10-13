<?php
$name = $_POST['name'];
$slug = $_POST['slug'];
$id = $_POST['id'];

include "../tools/mySql.php";
$sql = "update categories set name='$name',slug='$slug' where id = '$id'";

$arr = excute_zsg($sql);

if (count($arr) > 0) {
    echo 'ok';
} else {
    echo 'fail';
}