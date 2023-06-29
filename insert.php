<?php

include_once './lib/function.php';

if (!empty($_POST['name'])) {

	$link = mysqlInit('localhost', 'root', '20011231', 'new_database');

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


     if ($_FILES['imge']['size']>0) {

    	 $img = imgUpload($_FILES['imge']);
     }



    $sql=" INSERT INTO `im_fans`(`name`, `episode`, `date`, `introduce`, `img`) 
    VALUES ('{$name}','{$episode}','{$date}','{$introduce}','{$img}')";

    
    if ($result1=mysqli_query($link,$sql)) {
    	
    	//影响行数mysql_affected_rows();
    		msg(1,'操作成功','admin.php');
    	
    }else{
    		msg(2,'操作失败','admin.php');

    }

	
}


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>管理员|编辑</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="./static/pkg/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./static/css/index.css">
    <link rel="stylesheet" href="./static/css/login.css" id="theme-stylesheet">
    <script src="./static/js/front.js"></script>
    <script src="./static/pkg/popperjs/popper.min.js"></script>
    <script src="./static/pkg/jquery-3.7.0/jquery-3.7.0.min.js"></script>
    <script src="./static/pkg/bootstrap/js/bootstrap.min.js"></script>
    <script src="./static/js/jquery.validate.min.js"></script><!--表单验证-->
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</head>

<body>
    <!-- 导航条 -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img src="./static/img/img/logo.png" width=4%>
            <a class="navbar-brand" href="./index.php">APPLE动漫网</a>

    </nav>
    <!-- 主容器 -->
    <div class="container">
        <div class="page login-page">
            <div class="container d-flex align-items-center">
                <div class="form-holder has-shadow">
                    <div class="row">
                        <!-- Form Panel    -->
                        <div class="col-lg-6 bg-white">
                            <div class="form d-flex align-items-center">
                                <div class="content">
                                    <form method="post" action="insert.php" class="form-validate" enctype="multipart/form-data" id="registerFrom">

                                        <div class="form-group">
                                            <input id="name" type="text" name="name" required data-msg="请输入番剧名称" placeholder="番剧名称" class="input-material">
                                        </div>
                                        <div class="form-group">
                                            <input id="episode" type="text" name="episode" required data-msg="请输入番剧集数" placeholder="番剧集数" class="input-material">
                                        </div>
                                        <div class="form-group">
                                            <input id="date" type="text" name="date" required data-msg="请输入番剧发行日期" placeholder="番剧发行日期" class="input-material">
                                        </div>
                                        <div class="form-group">
                                            <textarea id="introduce" name="introduce" placeholder="番剧简介" class="input-material" style="width: 470px;height: 150px;"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label id="for-img">番剧图片</label><br />
                                            <input id="imge" type="file" name="imge" onchange="imgPreview(this)">
                                        </div>
                                        <button id="login" type="submit" class="btn btn-primary">确认</button>

                                    </form>
                                    <br />
                                    <a href="admin.php" class="back">&nbsp;返回</a>


                                </div>

                            </div>
                        </div>
                        <!-- Logo & Information Panel-->
                        <div class="col-lg-6">
                            <div class="info d-flex align-items-center">
                                <div class="content">
                                    <div class="logo">
                                        <h1>新增番剧</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- 页脚 -->
    <footer>
        <div class="alert alert-primary" role="alert">
            <p>test APPLE 动漫网</p>
        </div>
    </footer>
    </div>



</body>

</html>