<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Services\OSS;//导入阿里 oss类

class AdminuserController extends Controller
{
    public function index()
    {
        //查询管理员表数据
        $admin_users = DB::table('admin_users')->get();
        return view('admin.adminuser.index', ['users' => $admin_users]);
    }

    public function create()
    {
        //查询角色表数据
        $roles_data = DB::table('roles')->get();
        return view('admin.adminuser.create', ['roles' => $roles_data]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        //接收数据
        $uname = $request->input('uname');
        $upass = $request->input('upass');
        $repass = $request->input('repass');
        $rid = $request->input('rid');
        //dd($rid);exit;
        //判断两次密码是否一致
        if ($upass != $repass) {
            return back()->with('error', '两次密码输入不一致');
        }
        //文件上传
        if ($request->hasFile("profile")) {
            //获取上传文件资源
            $file = $request->file('profile');
            //获取上传零时资源目录
            $filepath = $file->getRealPath();
            //新文件名
            $name = time() + rand();
            //获取上传文件后缀
            $ext = $request->file("profile")->getClientOriginalExtension();
            //拼接上传文件名
            $newfile = $name . "." . $ext;
            //上传到阿里oss
            $path = env('ALIOSSURL') . $newfile;
            OSS::upload($newfile, $filepath);
        }
        //将数据压入数据库
        $temp['uname'] = $uname;
        $temp['upass'] = Hash::make($upass);
        $temp['profile'] = $path;
        $uid = DB::table('admin_users')->insertGetId($temp);
        //将俩个id压入数据库
        $data['rid'] = $rid;
        $data['uid'] = $uid;
        $res = DB::table('adminuser_roles')->insert($data);

        if ($res && $uid) {
            DB::commit();
            return redirect('admin/adminuser')->with('success', '添加管理员成功');
        } else {
            DB::rollBack();
            return back()->with('error', '添加管理员失败');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //查询管理员表
        $adminuser = DB::table('admin_users')->where('id', $id)->first();
        //查询角色表
        $roles = DB::table('roles')->get();
        $adminuser_roles = DB::table('adminuser_roles')->where('uid', $id)->first();
        //dump($roles,$adminuser_roles);exit;
        return view('admin.adminuser.edit', ['adminuser' => $adminuser, 'roles' => $roles, 'aduser' => $adminuser_roles]);
    }

    public function update(Request $request, $id)
    {
        //接收数据
        $uname = $request->input('uname');
        $upass = $request->input('upass');
        $rid = $request->input('rid');
        //修改图片
        if ($request->hasFile("profile")) {
            //获取上传文件资源
            $file = $request->file('profile');
            //获取上传零时资源目录
            $filepath = $file->getRealPath();
            //新文件名
            $name = time() + rand();
            //获取上传文件后缀
            $ext = $request->file("profile")->getClientOriginalExtension();
            //拼接上传文件名
            $newfile = $name . "." . $ext;
            //上传到阿里oss
            OSS::upload($newfile, $filepath);
            $profile = env('ALIOSSURL') . $newfile;
        } else {
            $profile = $request->input('old_file');
        }
        //dump($rid);exit;
        //修改管理员表信息
        $res1 = DB::table('admin_users')->where('id', $id)->update(['uname' => $uname, 'upass' => Hash::make($upass), 'profile' => $profile]);
        //修改管理员和角色的中间表
        $res2 = DB::table('adminuser_roles')->where('uid', $id)->update(['rid' => $rid]);

        if ($res1) {
            return redirect('admin/adminuser')->with('success', '修改成功');
        } else {
            return back()->with('error', '修改失败');
        }


    }

    public function destroy($id)
    {
        //删除阿里oss文件
        $data = DB::table('admin_users')->where('id', $id)->first();
        $filename = str_replace("https://myeshop.oss-cn-beijing.aliyuncs.com/", '', $data->profile);
        //删除阿里云 里的文件名(不包含前面的链接)
        OSS::deleteObject($filename);
        //删除管理员表数据
        $res = DB::table('admin_users')->where('id', $id)->delete();
        //删除管理员和角色的中间表
        $res1 = DB::table('adminuser_roles')->where('uid', $id)->delete();
        if ($res1 && $res) {
            return redirect('admin/adminuser')->with('success', '管理员删除成功');
        } else {
            return back()->with('error', '管理员删除失败');
        }
    }
}
