<?php
session_start();//开启session

if (isset($_SESSION['userInfo'])) {//判断是否有session值
    echo 'ok';
}else{
    echo 'fail';
}