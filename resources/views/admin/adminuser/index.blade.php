@extends('admin.layout.index')
@section('content')
    <table class="table table-hover">
        <caption style="font:30px solid bold; margin-bottom: 30px; ">管理员列表</caption>
        <thead>
        <tr>
            <th>ID</th>
            <th>管理员名</th>
            <th>头像</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $k=>$v)
            <tr class="info">
                <td>{{$v->id}}</td>
                <td>{{$v->uname}}</td>
                <td><img src="{{$v->profile}}" alt="{{$v->profile}}" style="border-radius:5px; border:1px solid  #ccc; width:80px;" ></td>
                <td>
                    <a href="/admin/adminuser/{{ $v->id }}/edit"> <button class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></button></a>
                    <form action="/admin/adminuser/{{ $v->id }}" method="post" style="display:inline-block;">
                        {{csrf_field()}}
                        {{ method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger glyphicon glyphicon-trash"></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div align="center"></div>
@endsection
