<?php
$name = $_POST['name'];
$slug = $_POST['slug'];

include "../tools/mySql.php";
$sql = "insert into categories(name,slug) values('$name','$slug')";

$arr = excute_zsg($sql);

if (count($arr) > 0) {
    echo 'ok';
} else {
    echo 'fail';
}