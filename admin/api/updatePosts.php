<?php
$postId = $_POST['postId'];//获取修改文章id
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

$sql = "update posts set 
                     title='$title',
                     content='$content',
                     slug='$slug',
                     created='$created',
                     category_id='$category_id',
                     status='$status'";
if ($name != '') {
    $sql .= " ,feature='/uploads/$name'";
}

$sql .= " where id = '$postId'";

include '../tools/mySql.php';
$arr = excute_zsg($sql);

if (count($arr) > 0) {
    echo 'ok';
} else {
    echo 'fail';
}