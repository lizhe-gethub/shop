@extends('admin.layout.index')
@section('content')
    <script src="/btp/jquery-2.0.2.min.js"></script>
    <table class="table table-hover" id="mytable">
        <caption style="font:30px solid bold; margin-bottom: 30px; ">订单列表</caption>
        <thead>
        <tr>
            <th>序号</th>
            <th>订单号</th>
            <th>用户名</th>
            <th>收货人</th>
            <th>收货地址</th>
            <th>联系方式</th>
            <th>下单时间</th>
            <th>支付方式</th>
            <th>配送方式</th>
            <th>支付总金额</th>
            <th>订单状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $k=>$v)
            @foreach($v as $kk=>$vv)
                <tr class="info">
                    <td>{{$vv['id']}}</td>
                    <td>{{$vv['order_num']}}</td>
                    <td>{{$vv['uname']}}</td>
                    <td>{{$vv['name']}}</td>
                    <td>{{$vv['xhuo']}}</td>
                    <td>{{$vv['phone']}}</td>
                    <td>{{$vv['created_at']}}</td>
                    <td>支付宝</td>
                    <td>顺丰</td>
                    <td>{{$vv['allprice']}}</td>
                    <td>
                        <select class="form-control" name="{{$vv['id']}}">
                            <option value="0" {{$zhuangtai[$kk]=='待付款' ? 'selected' : ''}}>待付款</option>
                            <option value="1" {{$zhuangtai[$kk]=='待发货' ? 'selected' : ''}}>待发货</option>
                            <option value="2" {{$zhuangtai[$kk]=='待收货' ? 'selected' : ''}}>待收货</option>
                            <option value="3" {{$zhuangtai[$kk]=='待评价' ? 'selected' : ''}}>待评价</option>
                        </select>
                    </td>
                    <td>
                        <a href="/admin/orders/{{$vv['id']}}" class="btn btn-info"><span class="fa fa-clone"></span></a>
                    </td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
    <div></div>
    <script>
        //修改状态
        $('select').change(function () {
            //获取改变事件的对象id
            var id = $(this).attr('name');
            var t = $(this);
            $(this).each(function () {
                //获取改变对象的value值
                var val = $(this).find('option:selected').val();
                //alert(val, id);
                $.get('/orderupdate', {sta: val, id: id}, function (data) {
                    //alert(data);
                    if ( data == 1){
                        $('#myalert').html('<div class="alert alert-success fade in alert-dismissible" role="alert" style="display: inline-block;margin-top:20px;"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <strong>修改订单状态成功</strong> </div>');
                    }else{
                        $('#myalert').html('<div class="alert alert-danger fade in alert-dismissible" role="alert" style="display: inline-block;margin-top:20px;"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <strong>修改订单状态失败</strong> </div>');
                    }
                }, 'json');
            })
        })
    </script>
@endsection

