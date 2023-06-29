<?php

include_once "./lib/function.php";

if (!empty($_POST['search'])) {

    $search = trim($_POST['search']);
    //数据库连接
    $link = mysqlInit('localhost', 'root', '20011231', 'new_database');

    $sql = "SELECT * FROM `im_fans` WHERE  `name` like  '%{$search}%'";

    $obj = mysqli_query($link, $sql);
    $result = mysqli_fetch_assoc($obj);

    $fans = array();


    $fans[] = $result;
    if (empty($result)) {
        msg(2, "查找失败");
        exit;
    }
} else {
    msg(2, "请输入要查找的番剧");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>搜索结果</title>
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
            <a class="navbar-brand" aria-current="page" href="./index.php">APPLE动漫网</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">返回</a>
                    </li>
                </ul>
                <form class="d-flex" action="search.php" method="post" role="search">
                    <input name="search" id="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- 主容器 -->
    <div class="container">


        <!-- 主视窗 -->
        <div class="container text-center">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                <?php foreach ($fans as $v) : ?>
                    <li>
                        <div class="col">
                            <div class="card card-item" style="width: 18rem;">
                                <a href="detail.php?id=<?php echo $v['id'] ?>">
                                    <img class="card-img-top" src="<?php echo $v['img'] ?>" alt="<?php echo $v['name'] ?>">
                                </a>
                                <div class="info">
                                    <h3 class="img_title"><?php echo $v['name'] ?></h3>
                                </div>
                            </div>
                        </div>
                    </li>

                <?php endforeach; ?>
            </div>
        </div>

    </div>
    <!-- 页脚 -->
    <footer>
        <div class="alert alert-primary" role="alert">
            <p>test APPLE 动漫网</p>
        </div>
    </footer>


</body>

</html>