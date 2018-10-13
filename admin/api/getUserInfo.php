<?php
session_start();//开启session

$userInfo = $_SESSION['userInfo'];

echo json_encode($userInfo);