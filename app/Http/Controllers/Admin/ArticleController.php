<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use App\Models\Articles;
use App\Services\OSS;//导入阿里 oss类
use Illuminate\Support\Facades\Redis; //导入redis

class ArticleController extends Controller
{

    public function index()
    {
        $arts = [];
        //链表名
        $listkey = 'SHOPLIST:shopARTICLE';
        //哈希表名
        $hashkey = 'SHOPHASH:shopARTICLE';
        //exists判断$listkey链表是否有数据
        if (Redis::exists($listkey)) {
            //有数据
            //获取所有公告id
            $id = Redis::lrange($listkey, 0, -1);
            foreach ($id as $key => $value) {
                //依照获取到的id 获取哈希表数据
                $arts[] = Redis::hgetall($hashkey . $value);
            }


        } else {
            //redis中无数据
            //将查出的对象转换为数组  用来存到redis中
            $list = Articles::get()->toArray();
            foreach ($list as $k => $v) {
                //存储id到$listkey链表中
                Redis::rpush($listkey, $v['id']);
                //数据存在hashkey表中
                //每次存储的表名后连一个当前id数
                Redis::hmset($hashkey . $v['id'], $v);

            }
        }
        return view('admin.article.index', ['list' => $arts]);
    }


    public function create()
    {
        return view('admin.article.create');
    }


    public function store(Request $request)
    {
        /*获取所有除了这个字段的数据
        //$data = $request->except('_token');
        //上传图片文件
        if ($request->hasFile('thumb')) {
            //获取文件后缀名
            $extension = $request->file('thumb')->getClientOriginalExtension();
            //图片名

            $name = time() + rand(10, 10000);
            //文件完整数据
            $request->file('thumb')->move("./uploads/" . date('Y-m-d'), $name . "." . $extension);
            //实例化
            $manager = new ImageManager();
            $image = $manager->make("./uploads/" . date("Y-m-d") . "/" . $name . "." . $extension)->resize(100, 100)->save("./uploads/" . date("Y-m-d") . "/" . "r_" . $name . "." . $extension);
        } else {
            $file = '';
        }
        $data['title'] = $request->input('title');
        $data['descr'] = $request->input('descr');
        $data['editor'] = $request->input('editor');
        //trim去掉字符串中的点
        $data['thumb'] = trim("./uploads/" . date("Y-m-d") . "/" . "r_" . $name . "." . $extension, ".");
        //dd($data);
        $res = Articles::insert($data);
        if ($res) {
            return redirect('admin/article')->with('success', '添加成功');
        } else {
            return back()->with('error', '添加失败');
        }*/
        if ($request->hasFile("thumb")) {
            //获取上传文件资源
            $res = $request->file('thumb');
            //获取上传零时资源目录
            $filepath = $res->getRealPath();
            //新文件名
            $name = time() + rand();
            //获取上传文件后缀
            $ext = $request->file("thumb")->getClientOriginalExtension();
            //拼接上传文件名
            $newfile = $name . "." . $ext;
            //上传到阿里oss
            OSS::upload($newfile, $filepath);

            $data['title'] = $request->input('title');
            $data['descr'] = $request->input('descr');
            $data['editor'] = $request->input('editor');
            //trim去掉字符串中的点
            $data['thumb'] = env('ALIOSSURL') . $newfile;
            //dd($data);
            $res = Articles::insertGetId($data);
            //获取刚插入`数据的id
            //把插入哈希表中
            $id = $res;
            $data['id'] = $id;
            //链表名
            $listkey = 'SHOPLIST:shopARTICLE';
            //哈希表名
            $hashkey = 'SHOPHASH:shopARTICLE';

            if ($res) {
                //把数据添加到redis缓存中
                Redis::rpush($listkey, $id);
                //把所有数据插入哈希表
                Redis::hmset($hashkey . $id, $data);
                return redirect('admin/article')->with('success', '添加成功');
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
        $art = Articles::where('id', $id)->first();
        return view('admin.article.edit', ['art' => $art]);
    }


    public function update(Request $request, $id)
    {
        //上传图片到数据库
        if ($request->hasFile('thumb')) {
            //上传文件
            $file = $request->file('thumb');
            //获取上传零时资源目录
            $filepath = $file->getRealPath();
            //新文件名
            $name = time() + rand();
            //获取上传文件后缀
            $ext = $request->file("thumb")->getClientOriginalExtension();
            //拼接上传文件名
            $newfile = $name . "." . $ext;
            //上传到阿里oss
            $profile = env('ALIOSSURL') . $newfile;
            OSS::upload($newfile, $filepath);
        } else {
            //如果没修改还是之前的图片文件名
            $profile = $request->input('old_file');
        }
        //传文件到数据库
        $data['title'] = $request->input('title');
        $data['descr'] = $request->input('descr');
        $data['editor'] = $request->input('editor');
        $data['thumb'] = $profile;
        $res = Articles::where('id', $id)->update($data);
        //链表名
        $listkey = 'SHOPLIST:shopARTICLE';
        //哈希表名
        $hashkey = 'SHOPHASH:shopARTICLE';
        if ($res) {
            //修改hash缓存数据
            Redis::hmset($hashkey . $id, $data);
            return redirect('admin/article')->with('success', '修改成功');
        } else {
            return back()->with('error', '修改失败');
        }

    }

    public function destroy($id)
    {

    }

    public function delarticle(Request $request)
    {
        $id = $request->input("id");
        if ($id == "") {
            echo '请至少选中一条';
            die;
        }
        foreach ($id as $key => $value) {
            $info = Articles::where('id', $value)->first();
            /*$smallimgurl=$info->thumb;
            //大图路径
            $bigimgurl=str_replace("r_","",$smallimgurl);
            // echo $bigimgurl;
            //删除小图和大图
            unlink(".".$smallimgurl);
            unlink(".".$bigimgurl);*/

            //删除alioss  图片
            //去掉字符串中的指定字段
            $filename = str_replace("https://myeshop.oss-cn-beijing.aliyuncs.com/", '', $info->thumb);
            //删除阿里云 里的文件名(不包含前面的链接)
            OSS::deleteObject($filename);
            //删除redis缓存
            //链表名
            $listkey = 'SHOPLIST:shopARTICLE';
            //哈希表名
            $hashkey = 'SHOPHASH:shopARTICLE';
            //删除链表数据
            Redis::lrem($listkey, 0, $value);
            //删除hash数据
            Redis::del($hashkey . $value);

            Articles::where('id', $value)->delete();

        }
        echo 1;
    }
}
