<?php

$pwd = $_POST['password'];
//获取id
session_start();
$id = $_SESSION['userInfo']['id'];
$sql = "update users set password='$pwd' where id = '$id'";

include '../tools/mySql.php';
$arr = excute_zsg($sql);

if (count($arr) > 0) {
    echo 'ok';
} else {
    echo 'fail';
}