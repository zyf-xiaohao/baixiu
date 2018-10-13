<?php
$title = $_POST['title'];
$content = $_POST['content'];
$slug = $_POST['slug'];
$created = $_POST['created'];
$category_id = $_POST['category'];
$status = $_POST['status'];

$feature = $_FILES['feature'];//图片文件
$name = $feature['name'];
$tmp = $feature['tmp_name'];
$gbkName = iconv('utf-8', 'gbk', $name);//转换图片名格式为gbk
move_uploaded_file($tmp, "../../uploads/$gbkName");//php不识别根目录,把文件存储在目标文件中

//获取管理员信息
session_start();//开启session
//echo $_SESSION['userInfo']["id"];
//return false;
$user_id = $_SESSION['userInfo']["id"];

$sql = "insert into posts(title,content,slug,created,category_id,status,feature,user_id) values('$title','$content','$slug','$created','$category_id','$status','/uploads/$name','$user_id')";
//echo $sql;
//return false;
include '../tools/mySql.php';
$arr = excute_zsg($sql);

if(count($arr)>0){
    echo 'ok';
}else{
    echo 'fail';
}



