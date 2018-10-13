<?php
$id = $_POST['id'];
$status = $_POST['status'];

$sql = "update comments set status = '$status' where id in($id)";
include '../tools/mySql.php';
$arr = excute_zsg($sql);

if(count($arr)>0){
    echo 'ok';
}else{
    echo 'fail';
}