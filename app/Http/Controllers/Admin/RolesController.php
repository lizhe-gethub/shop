<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RolesController extends Controller
{
    public static function conall()
    {
        return [
            'userscontroller' => '用户管理',
            'catescontroller' => '分类管理',
            'adminusercontroller' => '管理员管理',
            'rolescontroller' => '角色管理',
            'nodescontroller' => '权限管理',
            'articlecontroller' => '公告管理',
            'shopscontroller' => '商品管理',
            'orderscontroller' => '订单管理',
            'linkscontroller' => '友情链接管理',
            'slidecontroller' => '轮播图管理',
            'commentcontroller' => '轮播图管理',

        ];
    }

    public function index(Request $request)
    {
        $roles_data = DB::table('roles')->get();
        return view('admin.roles.index', ['roles_data' => $roles_data]);
    }

    public function create()
    {
        $nodes = DB::table('nodes')->get();
        $list = [];
        foreach ($nodes as $k => $v) {
            $temp['id'] = $v->id;
            $temp['aname'] = $v->aname;
            $temp['desc'] = $v->desc;
            $list[$v->cname][] = $temp;
        }

        return view('admin.roles.create', ['list' => $list, 'conall' => self::conall()]);
    }

    public function store(Request $request)
    {
        //开启事务
        DB::beginTransaction();
        //添加角色表
        $rname = $request->input('rname');
        $rid = DB::table('roles')->insertGetId(['rname' => $rname]);
        //添加角色关系表
        $nids = $request->input('nids');
        if ($nids != '' && $rname != '') {
            foreach ($nids as $k => $v) {
                $res = DB::table('roles_nodes')->insert(['rid' => $rid, 'nid' => $v]);
            }
        } else {
            return back()->with('error', '角色必填');
        }

        if ($rid && $res) {
            DB::commit();
            return redirect('admin/roles')->with('success', '添加角色成功');
        } else {
            DB::rollBack();
            return back()->with('error', '添加角色失败');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $roles = DB::table('roles')->where('id', $id)->first();

        $nodes = DB::table('nodes')->get();

        $list = [];
        foreach ($nodes as $k => $v) {
            $temp['id'] = $v->id;
            $temp['aname'] = $v->aname;
            $temp['desc'] = $v->desc;
            $list[$v->cname][] = $temp;
        }
        //dd($nodes,$list);
        //获取当前角色已有的权限
        $roles_nodes = DB::table('roles_nodes')->where('rid', $id)->get();
        $data = [];
        foreach ($roles_nodes as $key => $value) {
            $nid = $value->nid;
            $data[] = $nid;
        }
        //dd($roles_nodes,$data);
        return view('admin.roles.edit', ['list' => $list, 'conall' => self::conall(), 'roles' => $roles, 'nid' => $data]);
    }

    public function update(Request $request, $id)
    {
        //修改角色权限
        $rname = $request->input('rname');
        $nids = $request->input('nids');

        $res1 = DB::table('roles')->where('id', $id)->update(['rname' => $rname]);
        //获取roles_nodes表数据
        $res3 = DB::table('roles_nodes')->where('rid', $id)->delete();
        foreach ($nids as $k => $v) {
            $res2 = DB::table('roles_nodes')->insert(['rid' => $id, 'nid' => $v]);
        }
        if ($res2 && $res3) {
            return redirect('admin/roles')->with('success', '修改成功');
        } else {
            return back()->with('error', '修改失败');
        }
    }

    public function destroy($id)
    {
        $res1 = DB::table('roles')->where('id', $id)->delete();
        $data = DB::table('admin_users')->get()->toArray();
        if (in_array($id, $data)) {
            DB::table('admin_users')->where('rid', $id)->delete();
        }
        $res3 = DB::table('roles_nodes')->where('rid', $id)->delete();
        if ($res1 && $res3) {
            return redirect('admin/roles')->with('success', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }
}
