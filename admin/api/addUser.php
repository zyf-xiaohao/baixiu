<?php
$email = $_POST['email'];
$slug = $_POST['slug'];
$nickname = $_POST['nickname'];
$password = $_POST['password'];

include "../tools/mySql.php";
$sql = "insert into users(email,slug,nickname,password) values('$email','$slug','$nickname','$password')";

$arr = excute_zsg($sql);

if (count($arr) > 0) {
    echo 'ok';
} else {
    echo 'fail';
}