<?php

include_once './lib/function.php';
preg_match('/\d+/', $_SERVER["QUERY_STRING"], $id);
//echo $_SERVER["QUERY_STRING"];
//echo $id[0];



if (!empty($_POST['name'])) {

	$link = mysqlInit('localhost', 'root', '20011231', 'new_database');


    $sql = "SELECT * FROM `im_fans` WHERE `id` ={$id[0]}";
    $obj = mysqli_query($link, $sql);
    $result1 = mysqli_fetch_assoc($obj);
    
    $total = isset($result1['total']) ? $result1['total'] : 0;
    
    $sql = "SELECT * FROM `im_fans` WHERE `id` ={$id[0]}";
    
    
    $obj = mysqli_query($link, $sql);
    
    $fans = array();
    
    while ($result1 = mysqli_fetch_assoc($obj)) {
        $fans[] = $result1;
    }

    //番剧名称
    $name = mysqli_real_escape_string($link,trim($_POST['name']));
    
    //番剧集数
    $episode = intval($_POST['episode']);

    //番剧发行日期
    $date = mysqli_real_escape_string($link,trim($_POST['date']));

    //番剧简介
    $introduce = mysqli_real_escape_string($link,trim($_POST['introduce']));

    
    $nameLength = mb_strlen($name, 'utf-8');
    if($nameLength <= 0 || $nameLength > 30)
    {
        msg(2, '番剧名应在1-30字符之内');
    }

    if($episode <= 0 || $episode > 99999)
    {
        msg(2, '番剧集数应大于0');
    }

    $introduceLength = mb_strlen($introduce, 'utf-8');
    if($introduceLength <= 0 || $introduceLength > 400)
    {
        msg(2, '番剧简介应在1-400字符之内');
    }

    $update=array(

    		'name'=>$name,
    		'episode'=>$episode,
    		'date'=>$date,
    		'introduce'=>$introduce
            
    	);

     if ($_FILES['imge']['size']>0) {

    	 $img = imgUpload($_FILES['imge']);
    	 $update['img']=$img;
     }


    // foreach ($update as $m => $n) {
    // 	if ($fans[$m] == $n) {
    // 		unset($update[$m]);
    // 	}
    // }


    if (empty($update)) {
    	# code...
    	msg(1,'操作成功','admin.php');
    }

    $updateSql='';

    foreach ($update as $m => $n) {
    	$updateSql .="`{$m}` = '{$n}' ,";
    }

    unset($sql,$obj,$result1);
    $updateSql=rtrim($updateSql,',');

    $sql=" UPDATE `im_fans` SET {$updateSql}  WHERE `id` = {$id[0]}";

    //$sql=" UPDATE `img` FROM `im_fans` SET `img`='{$image}' WHERE `id` = {$id[0]}";
    
    if ($result1=mysqli_query($link,$sql)) {
    	
    	//影响行数mysql_affected_rows();
    		msg(1,'操作成功','admin.php');
    	
    }else{
    		msg(2,'操作失败','admin.php');

    }

	
}else{
	msg(2,'路由非法','admin.php');
}
