<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        // echo '默认首页';
        $res = db('hx190918_bofan')->where('id','=','5')->select();
        // db('hx190918_bofan')->gagination(2);
        return view('index',['name'=>$res]);
    }
    public function search(){
        $Pnum = input('post.pnum');
        $Ptext = input('post.text');
        $page = Db::table('hx190918_bofan')->where('bofan_videoName',"LIKE","%$Ptext%")->count();
        $pageData = db('hx190918_bofan')->where('bofan_videoName',"LIKE","%$Ptext%")->page($Pnum,3)->select();   //查询第一页数据
        // var_dump($page);
        // var_dump($pageData);
        echo json_encode(['page'=>$page,'pageData'=>$pageData,'page111'=>$Pnum]);
    }
    public function searchTime(){
        $Pnum = input('post.pnum');
        $Ptext = input('post.text');
        $page = Db::table('hx190918_bofan')->where('bofan_videoName',"LIKE","%$Ptext%")->count();
        $pageData = db('hx190918_bofan')->where('bofan_videoName',"LIKE","%$Ptext%")->page($Pnum,3)->select();   //查询第一页数据
        // var_dump($page);
        // var_dump($pageData);
        echo json_encode(['page'=>$page,'pageData'=>$pageData,'page111'=>$Pnum]);
    }
    public function login(){
        echo '我的登陆腭面';
        $res = db('hx190918_bofan')->select();
        // $res = db('hx190918_bofan')->paginate(2,5);
        $rest = Db::table('hx190918_bofan')->where('id','<>','0')->paginate(3);
        return view('login',['name'=>$rest]);
        // return view('login');
    }
    public function user(){
        $rest = Db::table('hx190918_bofan')->where('id','<>','0')->paginate(3);
        return view('user',['user'=>$rest]);
    }
    public function loginTest(){
        $res = input('post.acc');
        $pas = input('post.pas');
        $captcha = input('post.test');
        if(!captcha_check($captcha)){
            echo "<script>alert('验证码错了')</script>";
            var_dump($captcha);
            var_dump('nonononoonono');
            exit;
        };
        $user = db('hx190918_bofan')->where(['id'=>$res,'bofan_videoName'=>$pas])->find();
        if($user){
            Session::set('useracc',$user['id']);
            $aaa = Session::get('useracc');
            echo($aaa);
        }
    }
    public function AddData(){
        $acc = input('post.acc');
        $pas = input('post.pas');
        $head = input('post.head');
        $aaa = input('post.aaa');
        $data=['id'=>$acc,
            'bofan_videoName'=>$pas,
            'images'=>$head,
            'bofan_userid'=>$aaa];
        $res = db('hx190918_bofan')->insert($data);
        // $res = DB::table('hx190918_bofan')->insertAll($data);
        echo $res;
    }
    public function edit(){
        $acc = input('post.acc');
        $res = Db::table('hx190918_bofan')->update(['id'=>114,'bofan_videoName' => $acc]);
        echo $res;
    }
    public function del(){
        $acc = input('post.acc');
        $res = Db::table('hx190918_bofan')->delete([1101,1102,1103]);
        echo $res;

    }
};
