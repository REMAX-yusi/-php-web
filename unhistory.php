<?php

include_once './lib/function.php';

$link = mysqlInit('localhost', 'root', '20011231', 'new_database');

preg_match('/\d+/', $_SERVER["QUERY_STRING"], $id);
//echo $_SERVER["QUERY_STRING"];
//echo $id[0];

$sql = "DELETE FROM `im_history` WHERE `id` ={$id[0]}";

$result1 = mysqli_query($link, $sql);
header('Location: ./historyedit.php');


?>