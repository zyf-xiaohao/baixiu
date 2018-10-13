<?php
$email = $_POST['email'];
$password = $_POST['password'];

include '../tools/mySql.php';
$sql = "select * from users where email = '$email' and password = '$password' ";
$data = excute_select($sql);

if (count($data)>0) {
    echo 'ok';

    //登陆成功记录一下登陆信息
    session_start();
    $_SESSION['userInfo']=$data[0];

}else{
    echo 'fail';
}