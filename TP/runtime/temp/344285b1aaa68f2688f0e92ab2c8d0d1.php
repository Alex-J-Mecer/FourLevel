<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\phpstudy_pro\WWW\ThinkPHP\public/../application/index\view\index\user.html";i:1592462711;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/ThinkPHP/public/static/css/IndexUser.css">
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body>
    <div id="UserApp">
        <div>
            <div>添加区域<br/>
                <input class="acc" type="text">
                <input class="pas" type="text">
                <input class="head" type="text">
                <input class="aaa" type="text">
                <button onclick="add()">添加</button>
            </div>
            <div>
                搜索区域<br/>
                <input type="text" v-model="SearchInfo"><button @click="SearchDate">搜索</button>
            </div>
            <div>
                搜索区域<br/>
                <input type="text" v-model="SearchTime"><button @click="SearchTime">时间</button>
            </div>
        </div>
        <div style="height: 30px;"></div>
        <table>
            <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        姓名
                    </th>
                    <th>
                        账号
                    </th>
                    <th>
                        密码
                    </th>
                    <th>
                        头像
                    </th>
                    <th>
                        操作
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(val,key) in pageData">
                    <td>{{val.id}}</td>
                    <td>{{val.bofan_videoName}}</td>
                    <td>{{val.bofan_times}}</td>
                    <td>{{val.bofan_userid}}</td>
                    <td>{{val.images}}</td>
                    <td>
                        <button onclick="edit(this)" url="<?php echo url('index/Index/edit'); ?>">修改</button>
                        <button @click="del($event)">删除</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <ul class="pagination">
            <li :page="Npage" @click="pageJump($event)">上一页</li>
            <li :page="Npage" v-for="val in page" @click="pageJump($event)">{{val}}</li>
            <li :page="Npage" @click="pageJump($event)">下一页</li>
        </ul>
        <div>
            修改区域，仅支持修改头像<br/>
            <input class="editarea" type="text"><button>点击进行修改</button>
        </div>
    </div>
    <script src="/ThinkPHP/public/static/js/IndexUser.js?<?php mt_rand() ?>"></script>
    <script>
        function add() {
            var acc = $('.acc').val();
            var pas = $('.pas').val();
            var head = $('.head').val();
            var aaa = $('.aaa').val();
            console.log(acc);
            console.log(pas);
            console.log(head);
            console.log(aaa);

            $.ajax({
                url: "<?php echo url('index/Index/AddData'); ?>",
                data: {
                    acc: acc,
                    pas: pas,
                    head: head,
                    aaa: aaa,
                },
                dataType: 'JSON',
                type: "POST",
                success: (res) => {
                    console.log(res);
                    alert(111)
                    window.location.reload();
                    alert(222)
                }
            })

        };

        function del(cli) {

            $.ajax({
                url: "<?php echo url('index/Index/del'); ?>",
                data: {
                    'acc': 114,
                },
                type: "post",
                dataType: 'JSON',
                success: (res) => {
                    console.log(res);
                }
            })

        }

        function edit(val, cli) {
            console.log($(cli).attr('url'));
            // $.ajax({
            //     url: "<?php echo url('index/Index/edit'); ?>",
            //     data: {
            //         'acc': 115,
            //     },
            //     type: "post",
            //     dataType: 'JSON',
            //     success: (res) => {
            //         console.log(res);
            //     }
            // })
        }
    </script>
</body>

</html>