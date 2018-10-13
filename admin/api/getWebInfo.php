<?php
include '../tools/mySql.php';

//评论数
$data = excute_select("select * from comments where status != 'trashed'");
$commentsCount = count($data);

//待审核
$data = excute_select("select * from comments where status = 'held'");
$heldCount = count($data);

//分类
$data = excute_select("select * from categories");
$categoryCount = count($data);

//文章数
$data = excute_select("select * from posts where status != 'trashed'");
$postsCount = count($data);

//草稿数
$data = excute_select("select * from posts where status = 'drafted'");
$draftedCount = count($data);

$arr = [
    "commentsCount"=>$commentsCount,
    "heldCount"=>$heldCount,
    "categoryCount"=>$categoryCount,
    "postsCount"=>$postsCount,
    "draftedCount"=>$draftedCount
];

echo json_encode($arr);