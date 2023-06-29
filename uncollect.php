<?php

include_once './lib/function.php';

$link = mysqlInit('localhost', 'root', '20011231', 'new_database');

preg_match('/\d+/', $_SERVER["QUERY_STRING"], $id);
//echo $_SERVER["QUERY_STRING"];
//echo $id[0];

$sql = "DELETE FROM `im_collect` WHERE `id` ={$id[0]}";

if ($result1 = mysqli_query($link, $sql)) {
    	
        msg(1,'取消收藏成功','index.php');
    
}else{
        msg(2,'取消收藏失败，您并没有收藏该番剧','index.php');

}

?>
