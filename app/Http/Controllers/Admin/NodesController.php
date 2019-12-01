<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NodesController extends Controller
{
    public function index()
    {
        //分页查询
        $data = DB::table('nodes')->paginate(5);
        return view('admin.nodes.index', ['nodes' => $data]);
    }

    public function create()
    {
        return view('admin.nodes.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $cname = $request->input('cname');
        $controller = $cname . 'controller';
        $aname = $request->input('aname');
        $desc = $request->input('desc');

        $res = DB::table('nodes')->insert(['cname' => $controller, 'aname' => $aname, 'desc' => $desc]);

        if ($res) {
            return redirect('admin/nodes')->with('success', '添加成功');
        } else {
            return back()->with('error', '添加失败');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //修改控制器单条数据
        $nodes = DB::table('nodes')->where('id', $id)->first();
        return view('admin.nodes.edit', ['nodes' => $nodes]);

    }

    public function update(Request $request, $id)
    {
        //修改操作
        $res = DB::table('nodes')->where('id', $id)->update(['desc' => $request->input('desc'),
            'cname' => $request->input('cname'), 'aname' => $request->input('aname')]);

        if ($res) {
            return redirect('admin/nodes')->with('success', '修改权限成功');
        } else {
            return back()->with('error', '修改权限失败');
        }
    }

    public function destroy($id)
    {
        //删除
        $res = DB::table('nodes')->where('id', $id)->delete();

        if ($res) {
            return redirect('admin/nodes')->with('success', '删除权限成功');
        } else {
            return back()->with('error', '删除权限失败');
        }
    }
}
