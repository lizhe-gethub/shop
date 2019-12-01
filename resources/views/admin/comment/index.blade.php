@extends('admin.layout.index')
@section('content')
    <script src="/btp/jquery-2.0.2.min.js"></script>
    <table class="table table-hover">
        <caption style="font:30px solid bold; margin-bottom: 30px; ">商品评价列表</caption>
        <thead>
        <tr>
            <th>ID</th>
            <th>评论商品</th>
            <th>评论用户</th>
            <th>评论内容</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comment as $k => $v)
            <tr class="info">
                <td>{{$v['id']}}</td>
                <td>{{$v['name']}}</td>
                <td>{{$v['uname']}}</td>
                <td>{{$v['content']}}</td>
                <td>
                    <form action="/admin/slide/{{ $v['id'] }}" method="post" style="display:inline-block;">
                        {{csrf_field()}}
                        {{ method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger glyphicon glyphicon-trash"></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        $('select').change(function () {
            var id = $(this).attr('name');
            var sta = $(this).find('option:selected').val();
            $.get('/slidecheck', {id: id, sta: sta},function(data){
                if(data == 1){
                    $('#myalert').html('<div class="alert alert-success fade in alert-dismissible" role="alert" style="display: inline-block;margin-top:20px;"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <strong>修改成功</strong> </div>');
                }else{
                    $('#myalert').html('<div class="alert alert-danger fade in alert-dismissible" role="alert" style="display: inline-block;margin-top:20px;"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <strong>修改失败</strong> </div>');
                }
            })
        })
    </script>
@endsection

