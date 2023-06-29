<?php
include_once './lib/function.php';
session_start();


unset($_SESSION['row']);
msg(1,'退出登录成功！','index.php');
?>