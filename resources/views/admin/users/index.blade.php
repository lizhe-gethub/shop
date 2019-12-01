@extends('admin.layout.index')
@section('content')
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/btp/jquery-2.0.2.min.js"></script>
</head>
<body>
 <form action="/admin/users" method="get" style="padding:30px;">
        <div class="form-group">
            <label for="search" class="col-sm-1 control-label text-right" style="margin-top: 10px;">搜索用户名</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="search_uname" id="search"
                       placeholder="{{ $params['search_uname'] or ''}}">
            </div>

            <label for="search1" class="col-sm-1 control-label text-right" style="margin-top: 10px;">搜索邮箱</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="search_email" id="search1"
                       placeholder="{{ $params['search_email'] or ''}}">
            </div>
            <div class="col-sm-1"><input type="submit" value="search" class="btn btn-primary" style="margin-left:-30px;"></div>
        </div>
    </form>
    <table class="table table-hover">
        <caption style="font:30px solid bold; margin-bottom: 30px; ">用户列表</caption>
        <thead>
        <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>邮箱</th>
            <th>手机号</th>
            <th>头像</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $k=>$v)
        <tr class="info">
            <td>{{$v->id}}</td>
            <td>{{$v->uname}}</td>
            <td>{{$v->email}}</td>
            <td>{{$v->phone}}</td>
            <td><img src="/uploads/{{$v->userinfo->profile}}" alt="{{$v->userinfo->profile}}" style="border-radius:5px; border:1px solid  #ccc; width:80px;" ></td>
            <td>{{$v->created_at}}</td>
            <td>
                {{--<a href="/admin/users/{{ $v->id }}/edit"><button class="btn btn-warning">修改</button></a>--}}
                <form action="/admin/users/{{ $v->id }}" method="post" style="display:inline-block;">
                    {{csrf_field()}}
                    {{ method_field('DELETE')}}
                <button type="submit" class="btn btn-danger glyphicon glyphicon-trash"></button>
                </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
    <div align="center">{{ $users->appends($params)->links() }}</div>
</body>
<script>

</script>
</html>
    @endsection
