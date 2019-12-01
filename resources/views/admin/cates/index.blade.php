@extends('admin.layout.index')
@section('content')
    <table class="table table-hover">
        <caption style="font:30px solid bold; margin-bottom: 30px; ">分类列表</caption>
        <thead>
        <tr>
            <th>ID</th>
            <th>分类名称</th>
            <th>父类ID</th>
            <th>分类路径</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cates as $k=>$v)
            <tr class="info">
                <td>{{$v->id}}</td>
                <td>{{$v->cname}}</td>
                <td>{{$v->pid}}</td>
                <td>{{$v->path}}</td>
                <td>
                    <a href="/admin/cates/{{ $v->id }}/edit"> <button class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></button></a>
                    @if(substr_count($v->path,',') < 2)
                    <a href="/admin/cates/create?id={{$v->id}}"><button class="btn btn-primary"><sapn class="glyphicon glyphicon-plus"></sapn></button></a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>{{ $cates->links() }}
@endsection
