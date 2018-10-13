<?php
$id = $_POST['id'];

$sql = "update posts set status = 'trashed' where id in($id)";
include '../tools/mySql.php';
$arr = excute_zsg($sql);

if(count($arr)>0){
    echo 'ok';
}else{
    echo 'fail';
}