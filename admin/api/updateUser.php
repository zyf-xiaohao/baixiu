<?php
$slug = $_POST['slug'];
$nickname = $_POST['nickname'];
$bio = $_POST['bio'];
$email = $_POST['email'];

$avatar = $_FILES['avatar'];//图片文件
$name = $avatar['name'];
$tmp = $avatar['tmp_name'];
$gbkName = iconv('utf-8', 'gbk', $name);//转换图片名格式为gbk
move_uploaded_file($tmp, "../../uploads/$gbkName");//php不识别根目录,把文件存储在目标文件中

$sql = "update users set 
nickname='$nickname',
slug='$slug',
bio='$bio'";
if ($name != '') {
    $sql .= " ,avatar='/uploads/$name'";
}

$sql .= " where email = '$email'";

include '../tools/mySql.php';
$arr = excute_zsg($sql);

if (count($arr) > 0) {
    //修改session,使修改文档后的刷新可以使更新的信息显示在界面上
    session_start();
    $_SESSION['userInfo']['nickname'] = $nickname;
    $_SESSION['userInfo']['slug'] = $slug;
    $_SESSION['userInfo']['bio'] = $bio;
    if ($name != '')
        $_SESSION['userInfo']['avatar'] = "/uploads/$name";

    //var_dump($_SESSION['userInfo']);
    //return false;
    echo 'ok';
} else {
    echo 'fail';
}
 