<?php
$email = $_POST['email'];
$slug = $_POST['slug'];
$nickname = $_POST['nickname'];
$password = $_POST['password'];
$id = $_POST['id'];

include "../tools/mySql.php";
$sql = "update users set email='$email',slug='$slug',nickname='$nickname',password='$password' where id = '$id'";
// echo $sql;
// return false;

$arr = excute_zsg($sql);

if (count($arr) > 0) {
    echo 'ok';
} else {
    echo 'fail';
}