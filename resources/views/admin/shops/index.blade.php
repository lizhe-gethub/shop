@extends('admin.layout.index')
@section('content')
    <script src="/btp/jquery-2.0.2.min.js"></script>
    <table class="table table-hover" id="mytable">
        <caption style="font:30px solid bold; margin-bottom: 30px; ">商品列表</caption>
        <thead>
        <tr>
            <th>序号</th>
            <th>商品名称</th>
            <th>商品类别</th>
            <th>商品图片</th>
            <th>商品介绍</th>
            <th>商品数量</th>
            <th>商品价格</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($shops as $k=>$v)
            <tr class="info">
                <td>{{$v->sid}}</td>
                <td>{{$v->sname}}</td>
                <td>{{$v->cname}}</td>
                <td><img src="{{$v->pic}}" alt="{{$v->pic}}" style="border-radius:5px; border:1px solid  #ccc; width:100px;"></td>
                <td>{!! $v->descr!!}</td>
                <td>{{$v->num}}</td>
                <td>{{$v->price}}</td>
                <td>
                    <a href="/admin/shops/{{ $v->sid }}/edit"><button class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></button></a>
                    <a href="javascript:void(0)"><button class="btn btn-danger del"><span class="glyphicon glyphicon-trash"></span></button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        //删除
        $('.del').click(function(){
            var id = $(this).parents('tr').find('td:first').html();
            var shop = $(this);
            //alert(id);
            $.get('/admin/delshops',{id:id},function(data){
                //alert(data);
                if(data == 1){
                    alert('删除成功');
                    shop.parents('tr').remove();
                }else{
                    alert('删除失败');
                }
            })
        })
    </script>
    @endsection
