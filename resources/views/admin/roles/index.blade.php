@extends('admin.layout.index')
@section('content')
    <table class="table table-hover">
        <caption style="font:30px solid bold; margin-bottom: 30px; ">角色列表</caption>
        <thead>
        <tr>
            <th>ID</th>
            <th>角色名</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles_data as $k=>$v)
            <tr class="info">
                <td>{{$v->id}}</td>
                <td>{{$v->rname}}</td>
                <td>
                    <a href="/admin/roles/{{ $v->id }}/edit"> <button class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></button></a>
                    <form action="/admin/roles/{{ $v->id }}" method="post" style="display:inline-block;">
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