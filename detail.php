<?php

include_once './lib/function.php';

$link = mysqlInit('localhost', 'root', '20011231', 'new_database');

preg_match('/\d+/', $_SERVER["QUERY_STRING"], $id);
//echo $_SERVER["QUERY_STRING"];
//echo $id[0];
$sql = "SELECT * FROM `im_fans` WHERE `id` ={$id[0]}";
$obj = mysqli_query($link, $sql);
$result = mysqli_fetch_assoc($obj);

$total = isset($result['total']) ? $result['total'] : 0;

$sql = "SELECT * FROM `im_fans` WHERE `id` ={$id[0]}";


$obj = mysqli_query($link, $sql);

$fans = array();

while ($result = mysqli_fetch_assoc($obj)) {
    $fans[] = $result;
}

foreach ($fans as $v) {
}

for ($i = 1; $i <= $v['episode']; $i++) {
    $arr[$i] = $i;
}
$imge = $v['img'];
$url = dirname("$imge") . '/';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>番剧信息</title>
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
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-6 column">
                    <h1>
                        <?php echo $v['name'] ?>
                    </h1>
                    <p class="text-left">
                        开播时间：<?php echo $v['date'] ?>
                    </p>
                    <p>
                        集数：<?php echo $v['episode'] ?>
                    </p>
                    <dl>
                        <dt>
                            简介：
                        </dt>
                        <dd>
                            <?php echo $v['introduce'] ?>
                        </dd>
                    </dl>
                    <div class="tabbable" id="tabs-779253">

                        <form method="post" action="collect.php?id=<?php echo $id[0] ?>" class="form-validate">
                            <button type="submit" class="btn btn-default">收藏</button>
                        </form>
                        <br />
                        <form method="post" action="uncollect.php?id=<?php echo $id[0] ?>" class="form-validate">
                            <button type="submit" class="btn btn-default">取消收藏</button>
                        </form>

                        <ul class="nav nav-tabs">
                            <li class="active">
                                <p href="#panel-643107" data-toggle="tab" style="margin: 30px auto 0 auto;">观看</p>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="panel-643107">
                                <?php foreach ($arr as $a) : ?>
                                    <a href="<?php echo $url, $a ?>.mp4"><span>第<?php echo $a ?>话</span></a><br />
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 column">
                    <a href="./history.php?id=<?php echo $id[0] ?>"><img id="pic" src="<?php echo $v['img'] ?>" alt="加载错误" style="width: 450px; height: 650px;" /></a>
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




</body>

</html>