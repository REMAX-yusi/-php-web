<?php

session_start();

if (isset($_SESSION['row']) && !empty($_SESSION['row'])) {

    header('Location:index.php');
    exit;
}

include './lib/function.php';
if (!empty($_POST['username'])) {

    $con = mysqlInit('localhost', 'root', '20011231', 'new_database');

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT `id` FROM `im_user` where `username`='$username' and `password`='$password'";
    $result0 = $con->query($sql);
    $row = $result0->fetch_assoc();
    $id = $row['id'];
    setcookie("id", $id, time() + 86400);

    //后台校验
    if (!$username) {
        echo "用户名字不能为空";
        exit;
    }

    if (!$password) {

        echo "密码不能为空";
        exit;
    }


    if (!$con) {
        echo mysqli_error($co);
        exit;
    }

    $sql = "SELECT * FROM `im_user` where `username`='{$username}'";


    $obj = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($obj);

    if (is_array($result) && !empty($result)) {
        if ($password === $result['password']) {
            $_SESSION['row'] = $result;
            msg(1, '登陆成功！', 'index.php');
            /*header('Location:index.php');*/
            exit;
        } else {
            msg(2, '用户密码不匹配！', 'login.php');
            /*echo "密码用户名不匹配";*/
            exit;
        }
    } else {
        msg(2, '用户不存在！', 'login.php');
        /*echo "用户不存在!";*/
        exit;
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>用户|登陆</title>
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
                        <!-- Logo & Information Panel-->
                        <div class="col-lg-6">
                            <div class="info d-flex align-items-center">
                                <div class="content">
                                    <div class="logo">
                                        <h1>欢迎登录</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Form Panel    -->
                        <div class="col-lg-6 bg-white">
                            <div class="form d-flex align-items-center">
                                <div class="content">
                                    <form method="post" action="login.php" class="form-validate" id="loginFrom">
                                        <div class="form-group">
                                            <input id="username" type="text" name="username" required data-msg="请输入用户名" placeholder="用户名" class="input-material">
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" name="password" required data-msg="请输入密码" placeholder="密码" class="input-material">
                                        </div>
                                        <button id="login" type="submit" class="btn btn-primary">登录</button>

                                    </form>
                                    <br />
                                    <small>没有账号?</small><a href="register.php" class="signup">&nbsp;注册</a>
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