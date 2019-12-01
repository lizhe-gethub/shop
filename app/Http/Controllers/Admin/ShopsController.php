<?php

namespace App\Http\Controllers\Admin;

use App\Models\Articles;
use App\Models\Cates;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Shops;
use Intervention\Image\ImageManager;
use App\Services\OSS;//导入阿里 oss类
use Illuminate\Support\Facades\Redis; //导入redis
use Markdown;//导入markdown

class ShopsController extends Controller
{
    public static function getCateData()
    {
        $cates = Cates::select('*', DB::raw("concat(path,',',id) as paths"))->orderby('paths', 'asc')->get();

        foreach ($cates as $k => $v) {
            $n = substr_count($v->path, ',');
            //统计字符串中某个字符串出现的次数
            $cates[$k]->cname = str_repeat('|----', $n) . $v->cname;
        }
        return $cates;
    }

    public function index()
    {
        //关联查询
        $shop = DB::table('cates')->join('shops', 'cates.id', '=', 'shops.cate_id')->select('cates.id as cid', 'cates.cname as cname', 'shops.id as sid'
            , 'shops.name as sname', 'shops.num', 'shops.price', 'shops.pic', 'shops.descr')->get();
        //dd($shop);exit;

        return view('admin.shops.index', ['shops' => $shop]);
    }


    public function create()
    {
        return view('admin.shops.create', ['cate' => self::getCateData()]);
    }


    public function store(Request $request)
    {
        if ($request->hasFile("pic")) {
            //获取上传文件资源
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

            $data['name'] = $request->input('name');
            $data['descr'] = $request->input('descr');
            $data['cate_id'] = $request->input('cate_id');
            $data['num'] = $request->input('num');
            $data['price'] = $request->input('price');
            //trim去掉字符串中的点
            $data['pic'] = env('ALIOSSURL') . $newfile;
            //dd($data);
            $res = Shops::insert($data);
            if ($res) {
                return redirect('admin/shops')->with('success', '添加成功');
            } else {
                return back()->with('error', '添加失败');
            }
        }

    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $shop = Shops::where('id', $id)->first();
        return view('admin.shops.edit', ['shops' => $shop, 'cates' => self::getCateData()]);
    }


    public function update(Request $request, $id)
    {
        if ($request->hasFile("pic")) {
            //获取上传文件资源
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
            $profile = env('ALIOSSURL') . $newfile;
        } else {
            $profile = $request->input('old_file');
        }
        $data['name'] = $request->input('name');
        $data['descr'] = $request->input('descr');
        $data['cate_id'] = $request->input('cate_id');
        $data['num'] = $request->input('num');
        $data['price'] = $request->input('price');
        //trim去掉字符串中的点
        $data['pic'] = $profile;
        //dd($data);
        $res = Shops::where('id', $id)->update($data);
        if ($res) {
            return redirect('admin/shops')->with('success', '修改成功');
        } else {
            return back()->with('error', '修改失败');
        }
    }

    public function destroy($id)
    {

    }

    public function delshops(Request $request)
    {
        $id = $request->input('id');
        //删除阿里云oss
        $data = Shops::where('id', $id)->first();
        $filename = str_replace("https://myeshop.oss-cn-beijing.aliyuncs.com/", '', $data->pic);
        //删除阿里云 里的文件名(不包含前面的链接)
        OSS::deleteObject($filename);
        //删除商品信息
        $res = Shops::where('id', $id)->delete();
        if ($res) {
            echo 1;
        } else {
            echo 2;
        }
    }
}
