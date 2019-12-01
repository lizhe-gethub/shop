@extends('admin.layout.index')
@section('content')
    <table class="table table-hover">
        <caption style="font:30px solid bold; margin-bottom: 30px; ">权限列表</caption>
        <thead>
        <tr>
            <th>ID</th>
            <th>权限描述</th>
            <th>控制器名称</th>
            <th>方法名称</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbod>
        @foreach($nodes as $k=>$v)
            <tr class="info">
                <td>{{$v->id}}</td>
                <td>{{$v->desc}}</td>
                <td>{{$v->cname}}</td>
                <td>{{$v->aname}}</td>
                <td>
                    <a href="/admin/nodes/{{ $v->id }}/edit"><button class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></button></a>
                    <form action="/admin/nodes/{{ $v->id }}" method="post" style="display:inline-block;">
                        {{csrf_field()}}
                        {{ method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger glyphicon glyphicon-trash"></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbod>
    </table>
    <div align="center">{{$nodes->links()}}</div>
@endsection
