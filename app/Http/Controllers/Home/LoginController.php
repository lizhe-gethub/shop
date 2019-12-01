<?php

namespace App\Http\Controllers\Home;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Services\OSS;//导入阿里 oss类
use Hash;
use Mail;


class LoginController extends Controller
{
    public function index()
    {
        return view('home.login.index');
    }

    //登录
    public function dologin(Request $request)
    {
        //接收过来的手机号或邮箱
        $name = $request->input('loginname');
        //接收过来的密码
        $pwd = $request->input('pwd');
        //获取users所有数据
        $data = Users::all();

        $list = [];
        //遍历users表数据 拿出所有值
        foreach ($data as $ve) {
            //以phone为键名   以email为键名   组成一个新的数组   以便于in_array()方法生效
            $list['phone'][] = $ve->phone;
            $list['email'][] = $ve->email;
        }
        //dd($list);
        //判断传过来的手机号或邮箱  是否存在$list中   不在返回登录页面
        if (in_array($name, $list['phone']) || in_array($name, $list['email'])) {
            //存在则查出相应的单条数据
            $data1 = Users::where('phone', $name)->first();
            $data2 = Users::where('email', $name)->first();

            $uname1 = $data1['uname'];
            $uname2 = $data2['uname'];

            if (!empty($data1['id'])) {
                $user_id = $data1['id'];
            }
            if (!empty($data2['id'])) {
                $user_id = $data2['id'];
            }
            //dd($uname1,$uname2);
            //判断单条数据的密码   是否和传过来的相同  存在则跳回主页  不存在返回登录页面
            if (Hash::check($pwd, $data1['password']) || Hash::check($pwd, $data2['password'])) {
                session(['pn' => $uname1, 'en' => $uname2, 'homelogin' => 'on', 'user_id' => $user_id]);
                return redirect('/home/index');
            } else {
                return back()->with('lerror', '账号或密码输入错误');
            }
        } else {
            return back()->with('lerror', '账号不存在');
        }
    }

    //退出登录
    public function outhomelogin()
    {
        session(['homelogin' => null]);
        session(['en' => null]);
        session(['pn' => null]);
        session(['carts' => null]);
        session(['goods' => null]);
        return redirect('/home/index');
    }

    //验证邮箱是否未激活 和是否存在
    public function checkemailstatus(Request $request)
    {
        $loginname = $request->input('n');
        //$loginname = '2568107674@qq.com';
        $data = Users::where('email', $loginname)->first();
        if ($loginname == $data['email']) {
            if ($data['status'] == 2) {
                echo 1; //已激活
            } else {
                echo 2;//未激活
            }
        } else {
            echo 3;
        }

    }

    //验证手机号是否存在
    public function checkep(Request $request)
    {
        $p = $request->input('p');
        $data = Users::where('phone', $p)->first();
        if ($p == $data['phone']) {
            echo 2;
        } else {
            echo 1;
        }
    }

    //加载忘记密码页面
    public function forgetindex()
    {
        return view('home.forget.index');
    }

    //执行发送邮箱
    public function doforget(Request $request)
    {
        $email = $request->input('email');
        $data = Users::where('email', $email)->first();
        if (!$data) {
            echo "<script>alert('此邮箱未注册账号');location.href='/home/login'</script>";
        }
        Mail::send('home.forget.moban', ['id' => $data->id, 'token' => $data->token], function ($m) use ($email) {
            $s = $m->to($email)->subject('E-shops-重置密码');
            if ($s) {
                echo "<script>alert('邮件已发送,请尽快重置密码');location.href='https://mail.qq.com/cgi-bin/loginpage'</script>";
            }
        });
    }

    //加载重置密码页面
    public function resetpwdindex(Request $request)
    {
        $id = $request->input('id');
        $token = $request->input('token');
        $user = Users::where('id', $id)->first();
        if ($user->token == $token) {
            return view('home.forget.resetpwd', ['id' => $id]);
        } else {
            echo "<script>alert('链接失效');location.href='/home/login'</script>";
        }

    }

    public function doreset(Request $request)
    {
        $id = $request->input('id');
        $pwd = $request->input('password');
        $repwd = $request->input('repassword');

        if ($pwd != $repwd) {
            return back()->with('reseterror', '两次密码输入不一致');
        }
        $data['password'] = Hash::make($pwd);
        $data['token'] = str_random(10);
        $res = User::where('id', $id)->update($data);

        if ($res) {
            echo "<script>alert('密码修改成功');location.href='/home/login'</script>";
        } else {
            echo "<script>alert('密码修改失败,请尝试其他找回方法');location.href='/home/login'</script>";
        }

    }

}
