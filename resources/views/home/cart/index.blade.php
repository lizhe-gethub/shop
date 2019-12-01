@extends('home.layout.index')
@section('content')
    <script src="/btp/jquery-2.0.2.min.js"></script>
    <!-- NAVIGATION -->
    <div id="navigation">
        <!-- container -->
        <div class="container">
            <div id="responsive-nav">
                <!-- category nav -->
                <div class="category-nav show-on-click">
                    <span class="category-header">类别 <i class="fa fa-list"></i></span>
                    <ul class="category-list">
                        <li class="dropdown side-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Women’s Clothing <i
                                        class="fa fa-angle-right"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row hidden-sm hidden-xs">
                                    <div class="col-md-12">
                                        <hr>
                                        <a class="banner banner-1" href="#">
                                            <img src="./img/banner05.jpg" alt="">
                                            <div class="banner-caption text-center">
                                                <h2 class="white-color">NEW COLLECTION</h2>
                                                <h3 class="white-color font-weak">HOT DEAL</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Men’s Clothing</a></li>
                        <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                                              aria-expanded="true">Phones & Accessories <i
                                        class="fa fa-angle-right"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 hidden-sm hidden-xs">
                                        <a class="banner banner-2" href="#">
                                            <img src="./img/banner04.jpg" alt="">
                                            <div class="banner-caption">
                                                <h3 class="white-color">NEW<br>COLLECTION</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Computer & Office</a></li>
                        <li><a href="#">Consumer Electronics</a></li>
                        <li class="dropdown side-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Jewelry & Watches <i
                                        class="fa fa-angle-right"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Bags & Shoes</a></li>
                        <li><a href="#">View All</a></li>
                    </ul>
                </div>
                <!-- /category nav -->

                <div class="menu-nav">
                    <span class="menu-header">菜单 <i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                        <li><a href="#">首页</a></li>
                        <li><a href="#">店铺</a></li>
                        <li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                                              aria-expanded="true">女装<i
                                        class="fa fa-caret-down"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">分类</h3></li>
                                            <li><a href="#">女装</a></li>
                                            <li><a href="#">男装</a></li>
                                            <li><a href="#">手机&配件</a></li>
                                            <li><a href="#">珠宝&手表</a></li>
                                            <li><a href="#">包&鞋子</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="row hidden-sm hidden-xs">
                                        <div class="col-md-12">
                                            <hr>
                                            <a class="banner banner-1" href="#">
                                                <img src="/shop/home/shou/img/banner05.jpg" alt="">
                                                <div class="banner-caption text-center">
                                                    <h2 class="white-color">新款</h2>
                                                    <h3 class="white-color font-weak">热销</h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        <li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown"
                                                                         aria-expanded="true">男装 <i
                                        class="fa fa-caret-down"></i></a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="hidden-sm hidden-xs">
                                            <a class="banner banner-1" href="#">
                                                <img src="/shop/home/shou/img/banner06.jpg" alt="">
                                                <div class="banner-caption text-center">
                                                    <h3 class="white-color text-uppercase">Women’s</h3>
                                                </div>
                                            </a>
                                            <hr>
                                        </div>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="hidden-sm hidden-xs">
                                            <a class="banner banner-1" href="#">
                                                <img src="/shop/home/shou/img/banner07.jpg" alt="">
                                                <div class="banner-caption text-center">
                                                    <h3 class="white-color text-uppercase">Men’s</h3>
                                                </div>
                                            </a>
                                        </div>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="hidden-sm hidden-xs">
                                            <a class="banner banner-1" href="#">
                                                <img src="/shop/home/shou/img/banner08.jpg" alt="">
                                                <div class="banner-caption text-center">
                                                    <h3 class="white-color text-uppercase">Accessories</h3>
                                                </div>
                                            </a>
                                        </div>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="hidden-sm hidden-xs">
                                            <a class="banner banner-1" href="#">
                                                <img src="/shop/home/shou/img/banner09.jpg" alt="">
                                                <div class="banner-caption text-center">
                                                    <h3 class="white-color text-uppercase">Bags</h3>
                                                </div>
                                            </a>
                                        </div>
                                        <hr>
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">Categories</h3></li>
                                            <li><a href="#">Women’s Clothing</a></li>
                                            <li><a href="#">Men’s Clothing</a></li>
                                            <li><a href="#">Phones & Accessories</a></li>
                                            <li><a href="#">Jewelry & Watches</a></li>
                                            <li><a href="#">Bags & Shoes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">销售</a></li>
                        <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                                                 aria-expanded="true">pages <i
                                        class="fa fa-caret-down"></i></a>
                            <ul class="custom-menu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="products.html">Products</a></li>
                                <li><a href="product-page.html">Product Details</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- menu nav -->
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">主页</a></li>
                <li class="active">购物车</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                {{--<form id="checkout-form" class="clearfix">--}}
                <div class="col-md-12">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">购物车商品</h3>
                        </div>
                        <table class="shopping-cart-table table">
                            <thead>
                            <tr></tr>
                            <tr>
                                <th>操作</th>
                                <th>商品</th>
                                <th>商品名</th>
                                <th class="text-center">单价</th>
                                <th class="text-center">数量</th>
                                <th class="text-center">总计</th>
                                <th class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($cart == null)
                                <img src="/shop/home/shou/gwc.jpg">
                            @else
                                @foreach($cart as $v)
                                    <tr>
                                        <td><input type="checkbox" value="{{$v['id']}}" class="checkbox"
                                                   name="items"></td>
                                        <td class="thumb"><img src="{{$v['pic']}}" alt=""></td>
                                        <td class="details">{{$v['name']}}
                                            {{--<ul>
                                                <li><span>Size: XL</span></li>
                                                <li><span>Color: Camelot</span></li>
                                            </ul>--}}
                                        </td>
                                        <td class="price text-center"><strong>{{$v['price']}}</strong><br>
                                            <del class="font-weak"><small>{{$v['price']}}</small></del>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <a href="javascript:void(0)" class="jian"
                                                   name="{{$v['id']}}"><span
                                                            class="glyphicon glyphicon-minus"></span></a>
                                                <input class="text_box" type="text" value="{{$v['num']}}"
                                                       style="width:30px;">
                                                <a href="javascript:void(0)" class="jia"
                                                   name="{{$v['id']}}">
                                                    <sapn class="glyphicon glyphicon-plus"></sapn>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="total text-center"><strong
                                                    class="primary-color">{{$v['num'] * $v['price']}}</strong>
                                        </td>
                                        <td class="text-right">
                                            <a href="javascript:void(0)" class="main-btn icon-btn delete"
                                               name="{{$v['id']}}"><i class="fa fa-close"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="empty" colspan="4">
                                    <a href="javascript:void(0)" class="primary-btn" id="allxuan">全选</a>
                                    <a href="/alldelete" class="primary-btn">删除全部</a>
                                    <a href="/home/index" class="primary-btn">继续购物</a>
                                </th>
                                <th>数量</th>
                                <th colspan="2" class="sub-total" id="nums">0</th>
                            </tr>
                            {{--<tr>
                                <th class="empty" colspan="3"></th>
                                <th>SHIPING</th>
                                <td colspan="2">Free Shipping</td>
                            </tr>--}}
                            <tr>
                                <th class="empty" colspan="4"></th>
                                <th>总计金额</th>
                                <th colspan="2" class="total" id="sum">0</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="pull-right">
                            <button class="primary-btn" id="jiesuan"  data-target="#mymodal">去结算</button>
                        </div>
                        <div class="modal fade" id="mymodal" >
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="text-danger">您还没有选任何商品<button class="close" data-dismiss="modal"><span class="fa fa-close"></span></button></h2>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-hover">
                                                <tr>
                                                    <th>商品</th>
                                                    <th>商品名</th>
                                                    <th>单价</th>
                                                    <th>数量</th>
                                                    <th>总计</th>
                                                </tr>
                                            @foreach($cart as $val)
                                            <tr class="success" data-dismiss="modal">
                                                <td ><img src="{{$val['pic']}}" width="50px"></td>
                                                <td>{{$val['name']}}</td>
                                                <td>{{$val['price']}}</td>
                                                <td>{{$val['num']}}</td>
                                                <td>{{$val['num'] * $val['price']}}</td>
                                            </tr>
                                                @endforeach
                                        </table></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- </form>--}}
            </div>
            <!-- /row -->
            <script>
                //数量减
                $('.jian').click(function () {
                    var id = $(this).attr('name');
                    var jian = $(this);
                    $.get('/cartjian', {id: id}, function (data) {
                        jian.next().val(data.num);
                        jian.parents('td').next().find('strong').html(data.tot);
                        $("input[name='items']").prop('checked', false);

                    }, 'json');
                });
                //数量加
                $('.jia').click(function () {
                    var id = $(this).attr('name');
                    var jia = $(this);
                    //alert(id);
                    $.get('/cartjia', {id: id}, function (data) {
                        jia.prev().val(data.num);
                        jia.parents('td').next().find('strong').html(data.tot);
                        $("input[name='items']").prop('checked', false);
                    }, 'json')
                });
                //删除单条数据
                $('.delete').click(function () {
                    var d = $(this);
                    var id = $(this).attr('name');
                    $.get('/cartdel', {id: id}, function (data) {
                        if (data.msg == 'ok') {
                            d.parent().parent().remove();
                        } else {
                            d.parents('tbody').html("<img src='/shop/home/shou/gwc.jpg'>");
                        }
                    }, 'json');
                });
                //统计总数
                var arr = [];
                $("input[name='items']").change(function () {
                    if ($(this).prop('checked')) {
                        var xid = $(this).val();
                        arr.push(xid);
                    } else {
                        //取消选中时  删除arr数组里的id
                        //删除元素索引
                        var qid = $(this).val();
                        Array.prototype.indexOf = function (val) {
                            for (var i = 0; i < this.length; i++) {
                                if (this[i] == val) return i;
                            }
                            return -1;
                        };
                        Array.prototype.remove = function (val) {
                            var index = this.indexOf(val);
                            if (index > -1) {
                                this.splice(index, 1);
                            }
                        };
                        //执行删除
                        arr.remove(qid);
                    }
                    //alert(arr);
                    $.get('/cartcheck', {arr: arr}, function (data) {
                        $('#nums').html(data.nums);
                        $('#sum').html(data.sum);
                    }, 'json');
                });
                $('#allxuan').click(function () {
                    var array = [];
                    if ($(':checkbox').prop('checked') == false) {
                        $(':checkbox').prop('checked', true);
                        $(':checkbox').each(function () {
                            var id = $(this).val();
                                array.push(id);
                        });
                        //alert(array);
                        $.get('/allselect', {arr: array}, function (data) {
                            //alert(data);
                            $('#nums').html(data.nums);
                            $('#sum').html(data.sum);
                        }, 'json');
                    }
                });
                $('#jiesuan').click(function () {
                    $(this).attr('data-toggle','');
                    if ($("input[name='items']").is(':checked')) {
                        $.get("/jiesuan",{arr:arr},function(data){
                            if(data){
                                window.location="/homeorder/insert";
                            }
                        },'json');
                    }else{
                        $(this).attr('data-toggle','modal');
                    }
                });
            </script>
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
