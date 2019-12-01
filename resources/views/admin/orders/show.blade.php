@extends('admin.layout.index')
@section('content')
    <table class="table table-hover" id="mytable">
        <caption style="font:30px solid bold; margin-bottom: 30px; ">用户列表</caption>
        <thead>
        <tr>
            <th>序号</th>
            <th>订单id</th>
            <th>商品id</th>
            <th>商品名字</th>
            <th>收货图片</th>
            <th>是否评价</th>
            <th>商品价格</th>
            <th>数量</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order as $orders)
                <tr class="info">
                    <td>{{$orders['id']}}</td>
                    <td>{{$orders['order_id']}}</td>
                    <td>{{$orders['goods_id']}}</td>
                    <td>{{$orders['name']}}</td>
                    <td><img src="{{$orders['pic']}}" alt="" width="80px"></td>
                    <td>是否评价</td>
                    <td>{{$orders['price']}}</td>
                    <td>{{$orders['num']}}</td>
                </tr>
    @endforeach
        </tbody>
    </table>
@endsection
