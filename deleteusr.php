<?php


include_once './lib/function.php';

 
$link = mysqlInit('localhost', 'root', '20011231', 'new_database');
 
$sql = "DELETE FROM `im_user` WHERE `id`={$_COOKIE['id']}";

$obj = mysqli_query($link, $sql);


session_start();


unset($_SESSION['row']);
msg(1,'退出登录','index.php');

?>