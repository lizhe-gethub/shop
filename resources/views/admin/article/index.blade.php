@extends('admin.layout.index')
@section('content')
    <script src="/btp/jquery-2.0.2.min.js"></script>
<table class="table table-hover" id="mytable">
    <caption style="font:30px solid bold; margin-bottom: 30px; ">公告列表</caption>
    <thead>
    <tr>
        <th>操作</th>
        <th>序号</th>
        <th>标题</th>
        <th>作者</th>
        <th>图片</th>
        <th>内容</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $k=>$v)
        <tr class="info">
            <td><input type="checkbox" value="{{$v['id']}}"></td>
            <td>{{$v['id']}}</td>
            <td>{{$v['title']}}</td>
            <td>{{$v['descr']}}</td>
            <td><img src="{{$v['thumb']}}" alt="{{$v['thumb']}}" style="border-radius:5px; border:1px solid  #ccc; width:100px;"></td>
            <td>{!! $v['editor']!!}</td>
            <td>
                <a href="/admin/article/{{ $v['id'] }}/edit"><button class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></button></a>
            </td>
        </tr>
    @endforeach
    <tr>
        <td>
            <a href="javascript:void(0)"><button class="btn btn-info" id="allchoose">全选</button></a>
            <a href="javascript:void(0)"><button class="btn btn-info" id="noallchoose">全不选</button></a>
                <a href="javascript:void(0)"><button class="btn btn-info" id="fanchoose">反选</button></a>
        </td>
    </tr>
    <tr>
        <td><a href="javascript:void(0)"><button class="btn btn-danger" id="del"><span class="glyphicon glyphicon-trash"></span></button></a></td>
    </tr>
    </tbody>
</table>
<script>
    //全选
    $('#allchoose').click(function(){
        $('#mytable').find('tr').each(function(){
            $(this).find(':checkbox').prop('checked',true);
        })
    });
    //全不选
    $('#noallchoose').click(function(){
        $('#mytable').find('tr').each(function(){
            $(this).find(':checkbox').prop('checked',false);
        })
    });
    //反选
    $('#fanchoose').click(function(){
        $('#mytable').find('tr').each(function(){
            $(this).find(':checkbox').each(function(){
                if($(this).prop('checked')){
                    $(this).prop('checked',false);
                }else{
                    $(this).prop('checked',true);
                }
            })
        })
    });
    //删除
    $('#del').click(function(){
        var arr = [];
        $(':checkbox').each(function(){
            if ($(this).prop("checked")){
                var id = $(this).val();
                arr.push(id);
            }
        });
        $.get('/admin/delarticle',{id:arr},function(data){
           if (data == 1){
                 alert('删除成功');
                 for ( var i=0 ; i<arr.length ; i++){
                    $("input[value='"+arr[i]+"']").parents("tr").remove();
                 }
             }else{
               alert(data);
           }
        })
    })
</script>
@endsection

