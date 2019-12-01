<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Services\OSS;//导入阿里 oss类
use DB;
use App\Models\Shops;

class IndexController extends Controller
{
    public static function getCateByPid($pid)
    {
        $cate = DB::table("cates")->where("pid", "=", $pid)->get();
        //遍历
        $data = [];
        foreach ($cate as $key => $value) {
            //获取父类下的子类信息，存储在suv下标里 递归
            $value->suv = self::getCateByPid($value->id);
            $data[] = $value;
        }
        return $data;
    }

    public function index()
    {
        $cate = self::getCateByPid(0);
        //获取顶级分类下的商品数据
        $cates = DB::table("cates")->where("pid", "=", 0)->get();
        //遍历
        foreach ($cates as $v) {
            //获取顶级分类下的所有商品数据
            $shop[] = DB::table("shops")->join("cates", "shops.cate_id", "=", "cates.id")->select("cates.id as cid", "cates.cname", "shops.id as sid", "shops.name as sname", "shops.pic", "shops.descr", "shops.price", "shops.num")->where("shops.cate_id", "=", $v->id)->get();

        }
        //dd($cates);
        //轮播图
        $slides = DB::table('slides')->where('status', '1')->get();
        return view('home.index.index', ['cates' => $cate, 'shops' => $shop, 'slides' => $slides]);
    }

    //商品列表
    public function lists($id)
    {
        $name = DB::table('cates')->where('id', $id)->first();
        $shops = DB::table('shops')->where('cate_id', $id)->get();
        return view('home.lists.index', ['shops' => $shops, 'cname' => $name]);
    }

    //个人中心页面
    public function homecenter()
    {
        //全部订单商品
        $orders = DB::table('orders')->get();
        $d = [];
        foreach ($orders as $key => $value) {
            $data['order_num'] = $value->order_num;//,每一个订单的订单号
            $data['created_at'] = $value->created_at;//,每一个订单的订单创建时间
            $data['status'] = $value->status;//,每一个订单的订单状态
            $data['id'] = $value->id;//,每一个订单的订单的id
            //查询订单商品表
            $goods = DB::table('orders_goods')->where('order_id', $value->id)->get();
            //获取总价格
            foreach ($goods as $k => $v) {
                $data['num'][$k] = $v->num;
                $shops = DB::table('shops')->where('id', $v->goods_id)->get();
                foreach ($shops as $kk => $vv) {
                    $allprice['price'][$k] = $vv->price * $v->num;
                    $data['price'][$k] = $vv->price;
                }
                //把订单商品数据给一个数组
                $data[$k]['pic'] = $v->pic;
                $data[$k]['num'] = $v->num;
                $data[$k]['name'] = $v->name;
                $data[$k]['goods_id'] = $v->goods_id;
            }
            $data['allprice'] = array_sum($allprice['price']);
            $d[] = $data;
        }
        //dd($d);
        $orders1 = DB::table('orders')->where('status', '0')->get();
        $d1 = [];
        foreach ($orders1 as $key1 => $value1) {
            $data1['order_num'] = $value1->order_num;//,每一个订单的订单号
            $data1['created_at'] = $value1->created_at;//,每一个订单的订单创建时间
            $data1['status'] = $value1->status;//,每一个订单的订单状态
            $data1['id'] = $value1->id;//,每一个订单的订单的id
            //查询订单商品表
            $goods1 = DB::table('orders_goods')->where('order_id', $value1->id)->get();
            //获取总价格
            foreach ($goods1 as $k1 => $v1) {
                $data1['num'][$k1] = $v1->num;
                $shops1 = DB::table('shops')->where('id', $v1->goods_id)->get();
                foreach ($shops1 as $kk1 => $vv1) {
                    $allprice1['price'][$k1] = $vv1->price * $v1->num;
                    $data1['price'][$k1] = $vv1->price;
                }
                //把订单商品数据给一个数组
                $data1[$k1]['pic'] = $v1->pic;
                $data1[$k1]['num'] = $v1->num;
                $data1[$k1]['name'] = $v1->name;
                $data1[$k1]['goods_id'] = $v1->goods_id;
            }
            $data1['allprice'] = array_sum($allprice1['price']);
            $d1[] = $data1;
        }
        //dd($d1);
        $orders2 = DB::table('orders')->where('status', '1')->get();
        $d2 = [];
        foreach ($orders2 as $key2 => $value2) {
            $data2['order_num'] = $value2->order_num;//,每一个订单的订单号
            $data2['created_at'] = $value2->created_at;//,每一个订单的订单创建时间
            $data2['status'] = $value2->status;//,每一个订单的订单状态
            $data2['id'] = $value2->id;//,每一个订单的订单的id
            //查询订单商品表
            $goods2 = DB::table('orders_goods')->where('order_id', $value2->id)->get();
            //获取总价格
            foreach ($goods2 as $k2 => $v2) {
                $data2['num'][$k2] = $v2->num;
                $shops2 = DB::table('shops')->where('id', $v2->goods_id)->get();
                foreach ($shops2 as $kk2 => $vv2) {
                    $allprice2['price'][$k2] = $vv2->price * $v2->num;
                    $data2['price'][$k2] = $vv2->price;
                }
                //把订单商品数据给一个数组
                $data2[$k2]['pic'] = $v2->pic;
                $data2[$k2]['num'] = $v2->num;
                $data2[$k2]['name'] = $v2->name;
                $data2[$k2]['goods_id'] = $v2->goods_id;
            }
            $data2['allprice'] = array_sum($allprice2['price']);
            $d2[] = $data2;
        }
        //dd($d2);
        $orders3 = DB::table('orders')->where('status', '2')->get();
        $d3 = [];
        foreach ($orders3 as $key3 => $value3) {
            $data3['order_num'] = $value3->order_num;//,每一个订单的订单号
            $data3['created_at'] = $value3->created_at;//,每一个订单的订单创建时间
            $data3['status'] = $value3->status;//,每一个订单的订单状态
            $data3['id'] = $value3->id;//,每一个订单的订单的id
            //查询订单商品表
            $goods3 = DB::table('orders_goods')->where('order_id', $value3->id)->get();
            //获取总价格
            foreach ($goods3 as $k3 => $v3) {
                $data3['num'][$k3] = $v3->num;
                $shops3 = DB::table('shops')->where('id', $v3->goods_id)->get();
                foreach ($shops3 as $kk3 => $vv3) {
                    $allprice3['price'][$k3] = $vv3->price * $v3->num;
                    $data3['price'][$k3] = $vv3->price;
                }
                //把订单商品数据给一个数组
                $data3[$k3]['pic'] = $v3->pic;
                $data3[$k3]['num'] = $v3->num;
                $data3[$k3]['name'] = $v3->name;
                $data3[$k3]['goods_id'] = $v3->goods_id;
            }
            $data3['allprice'] = array_sum($allprice3['price']);
            $d3[] = $data3;
        }
        //dd($d3);
        $orders4 = DB::table('orders')->where('status', '3')->get();
        $d4 = [];
        foreach ($orders4 as $key4 => $value4) {
            $data4['order_num'] = $value4->order_num;//,每一个订单的订单号
            $data4['created_at'] = $value4->created_at;//,每一个订单的订单创建时间
            $data4['status'] = $value4->status;//,每一个订单的订单状态
            $data4['id'] = $value4->id;//,每一个订单的订单的id
            //查询订单商品表
            $goods4 = DB::table('orders_goods')->where('order_id', $value4->id)->get();
            //获取总价格
            foreach ($goods4 as $k4 => $v4) {
                $data4['num'][$k4] = $v4->num;
                $shops4 = DB::table('shops')->where('id', $v4->goods_id)->get();
                foreach ($shops4 as $kk4 => $vv4) {
                    $allprice4['price'][$k4] = $vv4->price * $v4->num;
                    $data4['price'][$k4] = $vv4->price;
                }
                //把订单商品数据给一个数组
                $data4[$k4]['pic'] = $v4->pic;
                $data4[$k4]['num'] = $v4->num;
                $data4[$k4]['name'] = $v4->name;
                $data4[$k4]['goods_id'] = $v4->goods_id;
            }
            $data4['allprice'] = array_sum($allprice4['price']);
            $d4[] = $data4;
        }
        //dd($d4);
        return view('home.center.index', ['orders' => $d, 'orders1' => $d1, 'orders2' => $d2, 'orders3' => $d3, 'orders4' => $d4]);
    }

    public function homepingjia()
    {
        return view('home.center.pingjia');
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $shops = Shops::where('id', $id)->first();
        return view('home.index.info', ['info' => $shops]);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

    //友情链接数据共享
    public static function getLinksData()
    {
        $links = DB::table('links')->where('status', '1')->get();
        return $links;
    }


    public function homelinks()
    {
        $links = DB::table('links')->get();
        return view('home.links.index',['links'=>$links]);
    }

    public function linkscheck(Request $request)
    {
        if ($request->input('linkname') != '') {
            //插入图片
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
            }
            $data['linkname'] = $request->input('linkname');
            $data['url'] = "http://" . $request->input('url');
            $data['pic'] = $profile;
            $data['status'] = '0';
            $data['text'] = $request->input('text');
            $res = DB::table('links')->insert($data);
            if ($res) {
                echo "<script>alert('申请友情链接成功,请等待通过');location.href='/home/links';</script>";
            } else {
                echo "<script>alert('申请错误,请联系管理员')</script>";
            }
        } else {
            return back();
        }
    }
}
