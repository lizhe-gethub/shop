<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login.login');
    }

    public function dologin(Request $request)
    {
        $uname = $request->input('uname');
        $upwd = $request->input('upwd');
        $admin_user_data = DB::table('admin_users')->where('uname', $uname)->first();
        //判断输入的用户名是否和数据库一致
        if (!$admin_user_data) {
            echo "<script>alert('用户名或密码输入错误');location.href='/admin/login';</script>";
            exit;
        }
        //判断输入的密码和数据库是否一致
        if (!Hash::check($upwd, $admin_user_data->upass)) {
            echo "<script>alert('密码输入错误');location.href='/admin/login';</script>";
            exit;
        }
        //压入session
        session(['admin_login' => true]);
        session(['admin_user' => $admin_user_data]);
        //跳转
        //获取当前用户权限
        $admin_user_nodes = DB::select('select n.aname , n.cname from nodes as n,roles_nodes as rn,adminuser_roles as ur 
        where ur.uid =' . $admin_user_data->id . ' and ur.rid = rn.rid and rn.nid=n.id');
        //dd($admin_user_nodes);exit;
        $temp = [];
        foreach ($admin_user_nodes as $k => $v) {
            $temp[$v->cname][] = $v->aname;
            //初始化主页权限
            $temp['indexcontroller'][] = 'index';
            //全选控制器依赖方法添加
            if ($v->aname == 'create') {
                $temp[$v->cname][] = 'store';
            }
            if ($v->aname == 'edit') {
                $temp[$v->cname][] = 'update';
            }
            if ($v->aname == 'index') {
                $temp[$v->cname][] = 'show';
            }
        }
        //dd($temp);exit;
        session(['admin_user_nodes' => $temp]);
        return redirect('/admin')->with('success', '欢迎' . $admin_user_data->uname . '登录');

    }

    /*public function insert(){
        $data = ['uname'=>'amdin','upass'=>Hash::make('admin')];
        DB::table('admin_users')->insert($data);
    }*/
    public function outlogin()
    {
        //清空session
        session('admin_login', false);
        session(['admin_user' => null]);
        return redirect('admin/login');
    }
}
