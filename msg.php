<?php

//url type参数处理 1:操作成功 2:操作失败
$type = isset($_GET['type']) && in_array(intval($_GET['type']), array(1, 2)) ? intval($_GET['type']) : 1;

$title = $type == 1 ? '操作成功' : '操作失败';

$msg = isset($_GET['msg']) ? trim($_GET['msg']) : '操作成功';

$url = isset($_GET['url']) ? trim($_GET['url']) : '';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>APPLE|TIPS</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="./static/pkg/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./static/css/index.css">
    <link rel="stylesheet" href="./static/css/login.css">
    <link rel="stylesheet" href="./static/css/dome.css">
    <script src="./static/js/jquery-1.10.2.min.js"></script>
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
    <div class="content">
        <div class="center">
            <div class="image_center">
                <?php if ($type == 1) : ?>
                    <span class="smile_face">:)</span>
                <?php else : ?>
                    <span class="smile_face">:(</span>
                <?php endif; ?>

            </div>
            <div class="code">
                <?php echo $msg ?>
            </div>
            <div class="jump">
                页面将在 <strong id="time" style="color: #009f95">3</strong> 秒 后跳转
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


<script>
    $(function() {
        var time = 3;
        var url = "<?php echo $url ?>" || null; //js读取php变量
        setInterval(function() {
            if (time > 1) {
                time--;
                console.log(time);
                $('#time').html(time);
            } else {
                $('#time').html(0);
                if (url) {
                    location.href = url;
                } else {
                    history.go(-1);
                }

            }
        }, 1000);

    })
</script>

</html>