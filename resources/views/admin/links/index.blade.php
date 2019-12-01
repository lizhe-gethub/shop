@extends('admin.layout.index')
@section('content')
    <script src="/btp/jquery-2.0.2.min.js"></script>
    <table class="table table-hover" id="mytable">
        <caption style="font:30px solid bold; margin-bottom: 30px; ">友情链接列表</caption>
        <thead>
        <tr>
            <th>序号</th>
            <th>链接名</th>
            <th>链接头像</th>
            <th>链接地址</th>
            <th>链接网站介绍</th>
            <th>链接状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($links as $k=>$v)
                <tr class="info">
                    <td>{{$v->id}}</td>
                    <td>{{$v->linkname}}</td>
                    <td><img src="{{$v->pic}}" alt="" width="70px"></td>
                    <td>{{$v->url}}</td>
                    <td>{{$v->text}}</td>
                    <td>
                        <select class="form-control" name="{{$v->id}}">
                            <option value="0" {{$v->status == '0' ? 'selected':''}}>下架</option>
                            <option value="1" {{$v->status == '1' ? 'selected':''}}>上架</option>
                        </select>
                    </td>
                    <td>
                        <form action="/admin/links/{{$v->id}}" method="post" style="display:inline-block;">
                            {{csrf_field()}}
                            {{ method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger glyphicon glyphicon-trash"></button>
                        </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    <div></div>
    <script>
        //修改状态
        $('select').change(function () {
            //获取改变事件的对象id
            var id = $(this).attr('name');
            $(this).each(function () {
                //获取改变对象的value值
                var val = $(this).find('option:selected').val();
                $.get('/linkscheck', {sta: val, id: id}, function (data) {
                    //alert(data);
                    if ( data == 1){
                        $('#myalert').html('<div class="alert alert-success fade in alert-dismissible" role="alert" style="display: inline-block;margin-top:20px;"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <strong>修改成功</strong> </div>');
                    }else{
                        $('#myalert').html('<div class="alert alert-danger fade in alert-dismissible" role="alert" style="display: inline-block;margin-top:20px;"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <strong>修改失败</strong> </div>');
                    }
                }, 'json');
            })
        })
    </script>
@endsection


