<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use DB;

class OrdersController extends Controller
{

    public function zhuangtai()
    {
        return [
            '0' => '待付款',
            '1' => '待发货',
            '2' => '待收货',
            '3' => '待评价',

        ];
    }

    public function index()
    {
        //查询订单表信息
        $order = DB::table('orders')->get();
        $d = [];
        foreach ($order as $k => $v) {
            $data['id'] = $v->id;//订单id
            $data['order_num'] = $v->order_num;//订单编号//订单状态
            $data['created_at'] = $v->updated_at;//订单创建时间
            //获取订单地址信息
            $add = DB::table('addresss')->where('id', $v->address_id)->first();
            $data['name'] = $add->name;//收货人
            $data['xhuo'] = $add->xhuo;//收货详细地址
            $data['phone'] = $add->phone;//联系电话

            $goods = DB::table('orders_goods')->where('order_id', $v->id)->get();
            foreach ($goods as $key => $value) {
                $data['price'][$key] = $value->num;
                $shops = DB::table('shops')->where('id', $value->goods_id)->get();
                foreach ($shops as $kk => $vv) {
                    $data['price'][$key] = $vv->price * $value->num;
                }
            }
            //获取用户名
            $username = DB::table('users')->where('id', $v->user_id)->first();
            $data['uname'] = $username->uname;;
            //赋值成二维数组
            $data['allprice'] = array_sum($data['price']);
            $d[][$v->status] = $data;
        }
        //dd($d);

        return view('admin.orders.index', ['data' => $d, 'zhuangtai' => self::zhuangtai()]);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //查询订单表单条数据
        $order = DB::table('orders')->where('id', $id)->first();
        //查询订单商品详情表数据
        $orders = DB::table('orders_goods')->where('order_id', $order->id)->get();
        $d = [];
        //遍历订单表数据
        foreach ($orders as $k => $v) {
            //把订单的数据放在一个新数组中
            $data['id'] = $v->id;
            $data['order_id'] = $v->id;//订单id
            $data['goods_id'] = $v->goods_id;//商品id
            $data['name'] = $v->name;//订单商品名
            $data['pic'] = $v->pic;//订单商品图片
            $data['num'] = $v->num;//订单商品数量
            //查询商品表
            $goods = DB::table('shops')->where('id', $v->goods_id)->get();
            //表里出订单商品的单价
            foreach ($goods as $key => $value) {
                $data['price'] = $value->price;
            }
            $d[] = $data;
        }
        return view('admin.orders.show', ['order' => $d]);
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

    public function orderupdate(Request $request)
    {
        //接收 要修改的的名单id
        //和要修改成的订单状态
        $newstatus = $request->input('sta');
        $id = $request->input('id');
        if ($newstatus != '' && $id != '') {
            //把订单状态修改
            $data['status'] = $newstatus;
            DB::table('orders')->where('id', $id)->update($data);
            echo 1;
        } else {
            echo 2;
        }
    }
}
