<?php

include_once './lib/function.php';

preg_match('/\d+/', $_SERVER["QUERY_STRING"], $id);

$link = mysqlInit('localhost', 'root', '20011231', 'new_database');


$sql= "DELETE FROM `im_fans` where `id` ={$id[0]} LIMIT 1";

if ($result=mysqli_query($link,$sql)) {
	msg(1,'操作成功','admin.php');
}else{
	msg(2,'操作失败','admin.php');

}


?>