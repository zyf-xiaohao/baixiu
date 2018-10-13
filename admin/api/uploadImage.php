<?php
$icon = $_FILES['icon'];

$name = $icon['name'];
$tmp = $icon['tmp_name'];
$gbkName = iconv('utf-8', 'gbk', $name);//转换图片名格式为gbk
move_uploaded_file($tmp, "../../uploads/$gbkName");//php不识别根目录,把文件存储在目标文件中

echo "/uploads/$name";