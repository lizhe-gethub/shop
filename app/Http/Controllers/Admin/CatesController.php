<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;

class CatesController extends Controller
{
    public static function getCateData()
    {
        $cates = Cates::select('*', DB::raw("concat(path,',',id) as paths"))->orderby('paths', 'asc')->paginate(100);

        foreach ($cates as $k => $v) {
            $n = substr_count($v->path, ',');
            //统计字符串中某个字符串出现的次数
            $cates[$k]->cname = str_repeat('|----', $n) . $v->cname;
        }
        return $cates;
    }

    public function index()
    {
        return view('admin.cates.index', ['cates' => self::getCateData()]);
    }

    public function create(Request $request)
    {
        $id = $request->input('id', 0);
        return view('admin.cates.create', ['id' => $id, 'cates' => self::getCateData()]);
    }

    public function store(Request $request)
    {
        $pid = $request->input('pid', '0');
        if ($request->input('cname') != '') {
            if ($pid == 0) {
                $path = 0;
            } else {
                $parent_data = Cates::find($pid);
                $path = $parent_data->path . ',' . $parent_data->id;
            }
            $cate = new Cates;
            $cate->cname = $request->input('cname');
            $cate->pid = $pid;
            $cate->path = $path;

            $res1 = $cate->save();
        } else {
            return back()->with('error', '分类必填');
        }
        if ($res1) {
            return redirect('admin/cates')->with('success', '添加分类成功');
        } else {
            return back()->with('error', '添加分类失败');
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $cates = DB::table('cates')->where('id', $id)->first();
        return view('admin.cates.edit', ['cates' => $cates]);
    }

    public function update(Request $request, $id)
    {
        $data['cname'] = $request->input('cname');
        $res = DB::table('cates')->where('id', $id)->update($data);
        if ($res) {
            return redirect('admin/cates')->with('success', '修改成功');
        } else {
            return back()->with('error', '修改失败');
        }

    }

    public function destroy($id)
    {

    }
}
