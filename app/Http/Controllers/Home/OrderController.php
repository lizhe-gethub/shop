<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shops;
use App\Models\Orders;
use DB;

class OrderController extends Controller
{
    public function jiesuan(Request $request)
    {
        //删除session数据
        $request->session()->pull('goods');
        $arr = $_GET['arr'];
        $data = [];
        foreach ($arr as $value) {
            $cart = session('carts');
            foreach ($cart as $k => $v) {
                if ($v['id'] == $value) {
                    $data[$k]['num'] = $cart[$k]['num'];
                    $data[$k]['id'] = $value;
                }
            }
        }
        //把选中的商品的数据存储在session里
        $request->session()->push('goods', $data);
        echo json_encode($data);
    }

    public function insert()
    {
        $data = session('goods');
        //遍历
        $good = [];
        $tot = 0;
        foreach ($data[0] as $k => $v) {
            $id = $v['id'];
            $goods = Shops::where('id', $id)->first();
            $temp['num'] = $v['num'];//数量
            $temp['pic'] = $goods->pic;//图片
            $temp['name'] = $goods->name;//商品名字
            $temp['price'] = $goods->price;//商品单价
            $tot += $temp['num'] * $temp['price'];
            $good[] = $temp;
        }
        //dd($good);
        $address = DB::table('addresss')->where('user_id', session('user_id'))->get();
        //获取该用户第一个收货地址
        $id = session('user_id');
        $addressfirst = DB::table('addresss')->where('user_id', $id)->first();
        //dd($addressfirst);
        return view('home.order.index', ['goods' => $good, 'address' => $address, 'addressfirst' => $addressfirst, 'tot' => $tot]);
    }

    public function orderinsert(Request $request)
    {
        //想订单表 和 订单详情表  插入数据
        if ($request->input('address_id') != null) {
            $data = new Orders;
            $data->address_id = $request->input('address_id');//地址id
            $data->order_num = time() + rand(1, 10000);//订单号
            $data->user_id = session('user_id');//用户id
            $data->status = "0";
            //$id = DB::table('orders')->insertGetId($data);
            $order = $data->save();
            //dd($data->id);
            $id = $data->id;
            if ($id) {
                $d = [];
                $tot = 0;
                $goods = session('goods');
                foreach ($goods[0] as $value) {
                    $list['order_id'] = $id;//订单详情id
                    $list['goods_id'] = $value['id'];//商品id
                    $list['num'] = $value['num'];//订单商品数量

                    $info = DB::table('shops')->where('id', $value['id'])->first();
                    $list['name'] = $info->name;//每个商品名
                    $list['pic'] = $info->pic;//每个商品图片
                    $tot += $list['num'] * $info->price;//总计价格
                    $d[] = $list;
                }
                $res1 = DB::table('orders_goods')->insert($d);
                if ($res1) {
                    //把付款总金额存储在session 中
                    session(['tot' => $tot]);
                    //把收货地址id存储在session 中
                    session(['address_id' => $data['address_id']]);
                    //把订单id存储在session 中
                    session(['order_id' => $id]);
                    //支付
                    pay($data['order_num'], "支付商品", "0.01", "商品支付");
                } else {
                    return back();
                }
            } else {
                return back();
            }
        } else {
            return back();
        }
    }

    public function returnurl()
    {
        //获取session 中的 支付金额.地址id,订单id
        $tot = session('tot');
        $address_id = session('address_id');
        $add = DB::table('addresss')->where('id', $address_id)->first();
        $order_id = session('order_id');
        //修改订单状态
        $data['status'] = "1";
        DB::table('orders')->where('id', $order_id)->update($data);
        return view("Home.order.success", ['tot' => $tot, 'add' => $add]);
    }

    public function index()
    {
        //
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


    public function destroy($id)
    {
        //
    }
}
