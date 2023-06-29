<?php

include_once './lib/function.php';

$link = mysqlInit('localhost', 'root', '20011231', 'new_database');

preg_match('/\d+/', $_SERVER["QUERY_STRING"], $id);
//echo $_SERVER["QUERY_STRING"];
//echo $id[0];

$sql = "SELECT * FROM `im_fans` WHERE `id` ={$id[0]}";
$obj = mysqli_query($link, $sql);
$result = mysqli_fetch_assoc($obj);

$sql = "SELECT * FROM `im_fans` WHERE `id` ={$id[0]}";

$obj = mysqli_query($link, $sql);
$fans = array();

while ($result = mysqli_fetch_assoc($obj)) {
    $fans[] = $result;
}

foreach ($fans as $v) {
}

$id = $v['id'];
$name = $v['name'];
$img = $v['img'];

$sql = " INSERT INTO `im_collect`(`id`,`name`,`img`) 
    VALUES ('{$id}','{$name}','{$img}')";

if ($result1 = mysqli_query($link, $sql)) {

    //影响行数mysql_affected_rows();
    msg(1, '收藏成功', 'index.php');
} else {
    msg(2, '收藏失败，您已经收藏了该番剧', 'index.php');
}
