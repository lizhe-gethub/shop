<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Shops;

class CartController extends Controller
{
    public function checkExists($id)//重新购买的商品id
    {
        $goods = session('carts');
        //购物车没有数据
        if (empty($goods)) return false;
        //如果购物车有数据 就遍历数据
        foreach ($goods as $k => $v) {
            if ($v['id'] == $id) {
                //符合条件表示商品购买过
                return true;
            }
        }
    }

    public function index()
    {
        //获取session 中的商品id 和商品数量
        $info = [];
        $cart = session('carts');
        if ($cart != null) {
            foreach ($cart as $v) {
                //获取所有id 来获取商品所有数据
                $carts = Shops::where('id', $v['id'])->first();
                $data['pic'] = $carts->pic;
                $data['name'] = $carts->name;
                $data['price'] = $carts->price;
                $data['num'] = $v['num'];//获取购买商品数量
                $data['id'] = $v['id'];//获取购买商品的id
                $info[] = $data;
            }
        }
        //把数据分配给模板
        return view('home.cart.index', ['cart' => $info]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //商品id
        $data['id'] = $request->input('id');
        //商品数量
        $data['num'] = $request->input('num');
        if (!$this->checkExists($data['id'])) {
            $request->session()->push('carts', $data);
        }

        return redirect('/homecart');

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

    public function alldelete(Request $request)
    {
        $request->session()->pull('carts');
        return redirect('homecart');
    }

    public function cartjian(Request $request)
    {

        $id = $request->input('id');
        //查询当前商品价格
        $info = Shops::where('id', $id)->first();
        //获取全部购物车数据  num 和 id
        $carts = session('carts');
        foreach ($carts as $k => $v) {
            if ($id == $v['id']) {
                //使其数量减一
                $carts[$k]['num'] -= 1;
                if ($carts[$k]['num'] <= 1) {
                    $carts[$k]['num'] = 1;
                }
                //session修改后 需要重写
                session(['carts' => $carts]);
                $data['num'] = $carts[$k]['num'];
                $data['tot'] = $carts[$k]['num'] * $info->price;
                echo json_encode($data);
            }
        }
    }

    public function cartjia(Request $request)
    {
        //获取ajax传来的参数
        $id = $request->input('id');
        //根据id查询shops表数据
        $data = Shops::where('id', $id)->first();
        //获取session 中的 id num
        $carts = session('carts');
        //遍历 session所有值
        foreach ($carts as $k => $v) {
            //判断如果session 中某个数组的id 等于 当前ajax传来的id
            if ($id == $v['id']) {
                //num 数量加一操作
                $carts[$k]['num'] += 1;
                //判断num 不能大于当前商品 的库存
                if ($carts[$k]['num'] >= $data->num) {
                    $carts[$k]['num'] = $data->num;
                }
                session(['carts' => $carts]);
                $data['num'] = $carts[$k]['num'];
                $data['tot'] = $carts[$k]['num'] * $data->price;
                echo json_encode($data);
            }

        }
    }

    public function cartdel(Request $request)
    {
        $id = $request->input('id');
        $carts = session('carts');
        //遍历session 中的 id num
        foreach ($carts as $k => $v) {
            //如果 点击商品的id 等于 session中商品数据的id
            if ($v['id'] == $id) {
                //那么就把数据id = ajax传来的id的这条数据整个销毁
                unset($carts[$k]);
            }
        }
        session(['carts' => $carts]);
        //获取session
        $data = session('carts');
        //判断当前session是否为空
        if (!empty($data)) {
            return response()->json(['msg' => 'ok']);
        } else {
            //返回json格式
            return response()->json(['msg' => 'empty']);
        }
    }

    public function cartcheck(Request $request)
    {
        if (isset($_GET['arr'])) {

            $sum = 0;//全部选中商品总计价格
            $nums = 0;//全部选中商品的数量
            // echo json_encode($arr);
            //遍历
            foreach ($_GET['arr'] as $value1) {
                //获取session
                $data = session("carts");// num id
                //遍历
                foreach ($data as $key => $value) {
                    //判断
                    if ($value['id'] == $value1) {
                        //获取每条选中数据的总价格和
                        $num = $data[$key]['num'];//数量
                        //获取商品数据
                        $info = Shops::where("id", "=", $value1)->first();
                        //每条选中数据总价格
                        $tot = $num * $info->price;
                        //开始累加
                        $nums += $num;
                        $sum += $tot;
                    }
                }
            }
            $data2['nums'] = $nums;
            $data2['sum'] = $sum;
            echo json_encode($data2);
        } else {
            $data2['nums'] = 0;
            $data2['sum'] = 0;
            echo json_encode($data2);
        }
    }

    public function allselect(Request $request)
    {
        $arr = $request->input('arr');
        //echo json_encode($arr);
        $nums = 0;
        $sum = 0;
        foreach ($arr as $value) {
            $data = session('carts');
            foreach ($data as $k => $v) {
                if ($v['id'] == $value) {
                    $num = $data[$k]['num'];//数量
                    //数量累加
                    $nums += $num;
                    $info = Shops::where('id', $value)->first();
                    $tot = $num * $info->price;
                    $sum += $tot;
                }
            }
        }
        $list['nums'] = $nums;
        $list['sum'] = $sum;
        echo json_encode($list);
    }
}
