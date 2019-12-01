<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AddressController extends Controller
{
    public function insert(Request $request)
    {
        if ($request->input('name') != '' && $request->input('phone') != '' && $request->input('name') != '' && $request->input('huo') != '' && $request->input('xhuo') != '') {
            $data = $request->except('_token');
            $data['user_id'] = session('user_id');
            preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $data['huo'], $matchs);
            $str = join('', $matchs[0]);
            //获取截取的新地址字符串
            $data['huo'] = $str;
            $res = DB::table('addresss')->insert($data);
            if ($res) {
                echo "<script>alert('添加地址成功');location.href='/homeorder/insert'</script>";
            }
        } else {
            return back();
        }


    }

    //获取城市级联数据
    public function address(Request $request)
    {
        $upid = $request->input('upid');
        $address = DB::table('district')->where('upid', "=", $upid)->get();
        return response()->json($address);
    }

    public function chooseadd(Request $request)
    {
        $id = $request->input('id');
        //echo json_encode($id);
        $chooseadd = DB::table('addresss')->where('id', $id)->first();
        return json_encode($chooseadd);
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
