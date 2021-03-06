<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\phpstudy_pro\WWW\ThinkPHP\public/../application/index\view\index\index.html";i:1592359456;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>layout 后台大布局 - Layui</title>
    <link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin" id="IndexApp">
        <div class="layui-header">
            <div class="layui-logo">layui 后台布局</div>
            <!-- 头部区域（可配合layui已有的水平导航） -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item"><a href="">控制台</a></li>
                <li class="layui-nav-item"><a href="">商品管理</a></li>
                <li class="layui-nav-item"><a href="">用户</a></li>
                <li class="layui-nav-item">
                    <a href="javascript:;">其它系统</a>
                    <dl class="layui-nav-child">
                        <dd><a href="">邮件管理</a></dd>
                        <dd><a href="">消息管理</a></dd>
                        <dd><a href="">授权管理</a></dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <img src="" class="layui-nav-img"> <?php echo $name['0']['bofan_videoName']; ?><?php echo $name['0']['images']; ?>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="">基本资料</a></dd>
                        <dd><a href="">安全设置</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">退了</a></li>
            </ul>
        </div>
        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree" lay-filter="test">
                    <li class="layui-nav-item layui-nav-itemed">
                        <a class="" href="javascript:;" @click="changeUrl('<?php echo url('index/index/user'); ?>')">用户管理</a>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">问卷管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="javascript:;" @click="changeUrl('<?php echo url('index/Question/send'); ?>')">发布问卷</a></dd>
                            <dd><a href="javascript:;" @click="changeUrl('<?php echo url('index/Question/edit'); ?>')">问卷编辑</a></dd>
                            <dd><a href="javascript:;" @click="changeUrl('<?php echo url('index/Question/answer'); ?>')">问卷答题</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item"><a href="">云市场</a></li>
                    <li class="layui-nav-item"><a href="">发布商品</a></li>
                </ul>
            </div>
        </div>

        <div class="layui-body">
            <iframe :src="JumpUrl" frameborder="0" style="width: 100%;height: 100%;overflow: scroll;"></iframe>
        </div>

        <div class="layui-footer">
            <!-- 底部固定区域 -->© layui.com - 底部固定区域
        </div>
    </div>
    <script src="https://www.layuicdn.com/layui/layui.js"></script>
    <script>
        //JavaScript代码区域
        layui.use('element', function() {
            var element = layui.element;

        });
    </script>
    <script src="/ThinkPHP/public/static/js/index.js"></script>
</body>

</html>