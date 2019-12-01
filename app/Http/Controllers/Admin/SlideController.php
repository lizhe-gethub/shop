<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Services\OSS;//导入阿里 oss类
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{

    public function index()
    {
        $slides = DB::table('slides')->get();
        return view('admin.slide.index', ['slides' => $slides]);
    }


    public function create()
    {
        //return view('admin.slide.create');
    }


    public function store(Request $request)
    {
        //上传轮播图
        if ($request->hasfile('pic')) {
            $file = $request->file('pic');
            //获取上传零时资源目录
            $filepath = $file->getRealPath();
            //新文件名
            $name = time() + rand();
            //获取上传文件后缀
            $ext = $request->file("pic")->getClientOriginalExtension();
            //拼接上传文件名
            $newfile = $name . "." . $ext;
            //上传到阿里oss
            OSS::upload($newfile, $filepath);

            $data['pic'] = env('ALIOSSURL') . $newfile;
            $data['status'] = 0;
            $res = DB::table('slides')->insert($data);
            if ($res) {
                return redirect('admin/slide')->with('success', '添加成功');
            } else {
                return back()->with('error', '添加失败');
            }
        } else {
            return back()->with('error', '你没有选择图片');
        }
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
        $data = DB::table('slides')->where('id', $id)->first();
        $filename = str_replace("https://myeshop.oss-cn-beijing.aliyuncs.com/", '', $data->pic);
        //删除阿里云 里的文件名(不包含前面的链接)
        OSS::deleteObject($filename);
        //删除表信息
        $res = DB::table('slides')->where('id', $id)->delete();

        if ($res ) {
            return redirect('admin/slide')->with('success', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }

    public function slidecheck(Request $request)
    {
        $id = $request->input('id');
        $sta = $request->input('sta');
        if ($id != '' && $sta != '') {
            $data['status'] = $sta;
            DB::table('slides')->where('id', $id)->update($data);
            echo 1;
        } else {
            echo 2;
        }
    }
}
