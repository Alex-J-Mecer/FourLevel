<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\phpstudy_pro\WWW\ThinkPHP\public/../application/index\view\index\login.html";i:1592397910;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
    <h1>后台管理系统</h1>
    <p>
        name<br/>
    </p>

    <?php if(is_array($name) || $name instanceof \think\Collection || $name instanceof \think\Paginator): $i = 0; $__LIST__ = $name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
    <ul style="overflow: hidden;">
        <li style="margin: 10px;float: left;"><?php echo $data['id']; ?></li>
        <li style="margin: 10px;float: left;"><?php echo $data['bofan_videoName']; ?></li>
        <li style="margin: 10px;float: left;"><?php echo $data['bofan_videoName']; ?></li>
        <li style="margin: 10px;float: left;"><?php echo $data['bofan_times']; ?></li>
        <li style="margin: 10px;float: left;"><?php echo $data['bofan_userid']; ?></li>
    </ul>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <p>

        <a href="<?php echo url('index/Index/index'); ?>">首页</a>
    </p>
    <?php echo $name->render(); ?>

    <div>
        账号：<input class="acc" type="text">
    </div>
    <div>
        密码：<input class="pas" type="text">
    </div>
    <div>
        验证码：<input class="test" type="text">
        <!-- onclick="ChangeImg(this)"  -->
        <div><img src="<?php echo captcha_src(); ?>" onclick="ChangeImg(this)" alt=""></div>
    </div>
    <div>
        <button onclick="login()">登陆</button>
    </div>
    <script>
        function ChangeImg(cli) {
            $(cli).attr('src', '<?php echo captcha_src(); ?>?' + Math.random())
        };

        function login() {
            var acc = $('.acc').val();
            var pas = $('.pas').val();
            var test = $('.test').val();

            $.ajax({
                url: "<?php echo url('index/Index/loginTest'); ?>",
                data: {
                    'acc': acc,
                    'pas': pas,
                    'test': test
                },
                type: "post",
                dataType: 'JSON',
                success: (res) => {
                    console.log(res);
                    location.href = "<?php echo url('index/Index/index'); ?>"
                }
            })
        }
    </script>
</body>

</html>