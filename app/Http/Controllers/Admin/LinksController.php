<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Storage;

class LinksController extends Controller
{

    public function index()
    {
        $links = DB::table('links')->get();
        return view('admin.links.index', ['links' => $links]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request,$id)
    {
        //删除图片文件
        $id = $request->input('id');
        //删除阿里云oss
        $data = DB::table('links')->where('id', $id)->first();
        $filename = str_replace("https://myeshop.oss-cn-beijing.aliyuncs.com/", '', $data->pic);
        //删除阿里云 里的文件名(不包含前面的链接)
        OSS::deleteObject($filename);
        //删除表信息
        $res = DB::table('links')->where('id', $id)->delete();
        if ($res) {
            return redirect('admin/links')->with('success', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }

    public function linkscheck(Request $request)
    {
        $status = $request->input('sta');
        $id = $request->input('id');

        if ($status != '' && $id != '') {
            $data['status'] = $status;
            DB::table('links')->where('id', $id)->update($data);
            echo 1;
        } else {
            echo 2;
        }

    }
}
