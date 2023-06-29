<?php

include_once './lib/function.php';
if (!empty($_POST['username'])) {
    //mysql_real_escape_string()进行 过滤 数据的提交
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $usersex = trim($_POST['usersex']);
    $usermail = trim($_POST['usermail']);
    $userQQ = trim($_POST['userQQ']);
    $repassword = trim($_POST['repassword']);
    //后台校验
    if(strpos($usermail,'@')==false && strpos($usermail,'.com')==false){
        echo "邮箱格式错误 <br />";
        exit;
    }

    if(strlen($userQQ) != 10){
        echo "QQ号应为10位数 <br />";
        exit;
    }
    if ($password != $repassword) {
        echo "两次密码不一致";
        exit;
    }
    //数据库连接
    $link = mysqlInit('localhost', 'root', '20011231', 'new_database');




    //先判断用户是否存在

    $sql = "SELECT COUNT(  `id` ) as total FROM  `im_user` WHERE  `username` =  '{$username}'";
    $obj = mysqli_query($link, $sql);

    $result = mysqli_fetch_assoc($obj);

    if (isset($result['total']) && $result['total'] > 0) {
        msg(2, '用户已经存在', 'register.php');
        exit;
    }

    /*$password=createPassword($password);*/



    unset($obj, $result, $sql);


    $time = $_SERVER['REQUEST_TIME'];
    $sql = "INSERT `im_user`(`username`,`password`,`create_time`,`sex`,`mail`,`QQ`) 
        values('{$username}','{$password}','{$_SERVER['REQUEST_TIME']}','{$usersex}','{$usermail}','{$userQQ}')";
    $obj = mysqli_query($link, $sql);

    if ($obj) {
        $userId = mysqli_insert_id($link);
        msg(1, '注册成功！', 'login.php');
        exit;
    } else {
        echo mysqli_error($con);
        exit;
    }
}


?>




<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>用户|注册</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="./static/pkg/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./static/css/index.css">
    <link rel="stylesheet" href="./static/css/login.css" id="theme-stylesheet">
    <script src="./static/js/front.js"></script>
    <script src="./static/pkg/popperjs/popper.min.js"></script>
    <script src="./static/pkg/jquery-3.7.0/jquery-3.7.0.min.js"></script>
    <script src="./static/pkg/bootstrap/js/bootstrap.min.js"></script>
    <!--表单验证-->
    <script src="./static/js/jquery.validate.min.js"></script>
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
                        <!-- Logo & Information Panel-->
                        <div class="col-lg-6">
                            <div class="info d-flex align-items-center">
                                <div class="content">
                                    <div class="logo">
                                        <h1>欢迎注册</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Form Panel    -->
                        <div class="col-lg-6 bg-white">
                            <div class="form d-flex align-items-center">
                                <div class="content">
                                    <form method="post" action="register.php" class="form-validate" id="registerFrom">
                                        <div class="form-group">
                                            <input id="username" type="text" name="username" required data-msg="请输入用户名" placeholder="用户名" class="input-material">
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" name="password" required data-msg="请输入密码" placeholder="密码" class="input-material">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="usersex" id="usersex">
                                                <option value="1">男</option>
                                                <option value="2">女</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input id="usermail" type="text" name="usermail" required data-msg="请输入邮箱" placeholder="邮箱" class="input-material">
                                        </div>
                                        <div class="form-group">
                                            <input id="userQQ" type="text" name="userQQ" required data-msg="请输入QQ号" placeholder="QQ号" class="input-material">
                                        </div>
                                        <div class="form-group">
                                            <input id="repassword" type="password" name="repassword" required data-msg="请确认密码" placeholder="确认密码" class="input-material">
                                        </div>
                                        <button id="register" type="submit" class="btn btn-primary">注册</button>

                                        <br />
                                        <small>已有账号?</small><a href="login.php" class="signup">&nbsp;登陆</a>
                                    </form>

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