<?php
$pageIndex = $_GET['pageIndex'];//页码
$pageSize = $_GET['pageSize'];//页容量
$category = $_GET['category'];//要筛选的分类名
$status = $_GET['status'];//要筛选的状态

$start = ($pageIndex - 1) * $pageSize;//起始页码

include "../tools/mySql.php";

$sql = "select p.id,p.title,u.nickname,c.name,p.created,p.status from posts p             
inner join categories c 
on
p.category_id=c.id
inner join users u 
on
p.user_id=u.id
where p.status != 'trashed'";

if ($category != '所有分类') {
    $sql .= " and c.name = '$category'";
}

if ($status != '所有状态') {
    $str = $status == '草稿' ? 'drafted' : 'published';
    $sql .= " and p.status = '$str'";
}

$allSql = $sql;

$sql .= "order by p.id desc limit $start,$pageSize";

$data = excute_select($sql);//每页内容

$postsCount = count(excute_select($allSql));//文章数
$postsPage = ceil($postsCount / $pageSize);//总页数
//echo $postsPage;return;
$arr = [
    "data" => $data,//每页的内容
    "postsPage" => $postsPage//总共有多少页
];

echo json_encode($arr);