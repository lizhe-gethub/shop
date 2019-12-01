<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CommentController extends Controller
{

    public function index()
    {
        $comment = DB::table('comment')->get();
        $d = [];
        //查询评价的用户名 和商品名
        foreach ($comment as $v) {
            $data['content'] = $v->content;
            $data['id'] = $v->id;
            $shops = DB::table('shops')->where('id', $v->shops_id)->first();
            $data['name'] = $shops->name;
            $users = DB::table('users')->where('id', $v->user_id)->first();
            $data['uname'] = $users->uname;
            $d[] = $data;
        }
        return view('admin.comment.index', ['comment' => $d]);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
        //删除评价
        $res = DB::table('comment')->where('id', $id)->delete();
        if ($res) {
            return redirect('admin/comment')->with('success', '删除评论成功');
        } else {
            return back()->with('error', '删除评论失败');
        }
    }
}
