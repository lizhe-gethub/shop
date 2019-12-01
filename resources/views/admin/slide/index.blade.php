@extends('admin.layout.index')
@section('content')
    <script src="/btp/jquery-2.0.2.min.js"></script>
    <form action="/admin/slide" method="post" class="form-horizontal" enctype="multipart/form-data"
          style="padding-top:50px;">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="pic" class="col-sm-2 control-label">轮播图:</label>
            <div class="col-sm-5">
                <div class="input-group">
                    <input type="file" class="form-control" name="pic" id="pic">
                    <span class="input-group-btn"><button type="submit" class="btn btn-primary">添加轮播图</button></span>
                </div>
            </div>
        </div>
    </form>
    <table class="table table-hover">
        <caption style="font:30px solid bold; margin-bottom: 30px; ">轮播图列表</caption>
        <thead>
        <tr>
            <th>ID</th>
            <th>轮播图</th>
            <th>是否上线</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($slides as $k => $v)
            <tr class="info">
                <td>{{$v->id}}</td>
                <td><img src="{{$v->pic}}" alt="{{$v->pic}}"
                         style="border-radius:5px; border:1px solid  #ccc; width:150px;"></td>
                <td>
                    <div class="col-md-5">
                        <select name="{{$v->id}}" class="form-control">
                            <option value="1" {{$v->status == '1' ? 'selected' : ''}}>使用</option>
                            <option value="0" {{$v->status == '0' ? 'selected' : ''}}>不使用</option>
                        </select></div>
                </td>
                <td>
                    <form action="/admin/slide/{{ $v->id }}" method="post" style="display:inline-block;">
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
