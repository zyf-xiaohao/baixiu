<?php
$pageIndex = $_GET['pageIndex'];//页码
$pageSize = $_GET['pageSize'];//页容量

$start = ($pageIndex-1)*$pageSize;//起始页码

include "../tools/mySql.php";

$sql="select c.id,c.author,c.created,c.content,c.status,p.title from comments c             
inner join posts p
on
c.post_id=p.id
where c.status != 'trashed'
order by c.id asc limit $start,$pageSize";

$data = excute_select($sql);//每页内容

$commentsCount = count(excute_select("select * from comments where status != 'trashed'"));//评论数
$commentsPage = ceil($commentsCount/$pageSize);//总页数

$arr = [
    "data"=>$data,//每页的内容
    "commentsPage"=>$commentsPage//总共有多少页
];

echo json_encode($arr);