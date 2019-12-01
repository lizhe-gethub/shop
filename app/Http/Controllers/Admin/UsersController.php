<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsers;
use App\Models\Users;
use App\Models\UsersInfos;
use Hash;
use DB;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    public function index(Request $request)
    {
        $search_uname = $request->input('search_uname', '');
        $search_email = $request->input('search_email', '');

        $users = Users::where('uname', 'like', '%' . $search_uname . '%')->where('email', 'like', '%' . $search_email . '%')->paginate(3);

        return view('admin.users.index', ['users' => $users, 'params' => $request->all()]);
    }


    /* public function create()
     {
         return view('admin.users.create');
     }

     */
    /*public function store(StoreUsers $request)
    {
        DB::beginTransaction();
        //文件上传
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $file_path = $file->store(date('Ymd'));
        } else {
            $file_path = '';
        }

        $data = $request->all();
        $users = new Users;
        $users->uname = $data['uname'];
        $users->password = Hash::make($data['pwd']);
        $users->email = $data['email'];
        $users->phone = $data['phone'];
        $res_one = $users->save();

        if ($res_one) {
            $uid = $users->id;
        }

        $userinfo = new UsersInfos;
        $userinfo->uid = $uid;
        $userinfo->profile = $file_path;
        $res_two = $userinfo->save();

        if ($res_one && $res_two) {
            DB::commit();
            return redirect('admin/users')->with('success', '添加成功');
        } else {
            DB::rollBack();
            return back()->with('error', '添加失败');
        }
    }
       */

    public function show($id)
    {
        //
    }


    /*public function edit($id)
    {
        $user = Users::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }
    */

    /*public function update(Request $request, $id)
    {
        DB::beginTransaction();

        if ($request->hasFile('profile')) {
            $file_path = $request->file('profile')->store(date('Ymd'));
        } else {
            $file_path = $request->input('old_profile');
        }
        $user = Users::find($id);
        $user->uname = $request->input('uname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $res1 = $user->save();

        $userinfo = UsersInfos::where('uid', $id)->first();
        $userinfo->profile = $file_path;
        $res2 = $userinfo->save();

        if ($res1 && $res2) {
            DB::commit();
            return redirect('admin/users')->with('success', '修改成功');
        } else {
            DB::rollBack();
            return back()->with('error', '修改失败');
        }

    }
    */

    public function destroy($id)
    {
        DB::beginTransaction();

        //删除图片文件
        $data = UsersInfos::where('uid', $id)->first();
        $del_file = $data->profile;

        $path = substr($del_file, '0', '9');
        $file = substr($del_file, '9');
        if ($path . $file != "pic/pic.jpg") {
            $res_three = Storage::delete($path . $file);
        }
        //删除user表信息
        $res_one = User::destroy($id);
        $uid = $id;
        //删除users_infos表信息
        $res_two = UsersInfos::where('uid', $uid)->delete();

        if ($res_one && $res_two) {
            DB::commit();
            return redirect('admin/users')->with('success', '删除成功');
        } else {
            DB::rollBack();
            return back()->with('error', '删除失败');
        }
    }
}
