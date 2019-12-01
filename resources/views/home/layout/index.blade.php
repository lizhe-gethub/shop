<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>{{Config::get('app.home_title')}}</title>

    <!-- Google font -->
    <script src="/shop/home/shou/js/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/shop/home/shou/css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="/shop/home/shou/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="/shop/home/shou/css/slick-theme.css"/>
    <link href="/register/css/style.css" rel='stylesheet' type='text/css' media="all">

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="/shop/home/shou/css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="/shop/home/shou/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/shop/home/shou/css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->

</head>
<body>
<!-- HEADER -->
<header>
    <!-- top Header -->
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span class="fa fa-user">{{session('pn')}}{{session('en')}}</span>
            </div>
            <div class="pull-left" style="margin-left:20px">@if(session('homelogin') != '' )
                    <a href="/home/login/outhomelogin"><span class="fa fa-power-off"></span>退出</a>@endif</div>
            <div class="pull-right">
                <ul class="header-top-links">
                    <li><a href="#">商店</a></li>
                    <li><a href="#">通讯</a></li>
                    <li><a href="#">常问问题</a></li>
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">CN <i
                                    class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">English (ENG)</a></li>
                            <li><a href="#">Russian (Ru)</a></li>
                            <li><a href="#">China (CN)</a></li>
                            <li><a href="#">Spanish (Es)</a></li>
                        </ul>
                    </li>
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i
                                    class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">USD ($)</a></li>
                            <li><a href="#">EUR (€)</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="/home/index">
                        <img src="/shop/home/shou/img/logo.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search">
                    <form>
                        <input class="input search-input" type="text" placeholder="输入你的关键字">
                         <select class="input search-categories">
                             <option value="0">所有类别</option>
                             <option value="1">1</option>
                             <option value="1">2</option>
                         </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o">
                                </i>
                            </div>
                            <strong class="text-uppercase">我的账户<i class="fa fa-caret-down"></i></strong>
                        </div>
                        <a href="/home/login" class="text-uppercase">登录</a> <a href="/home/register"
                                                                               class="text-uppercase">注册</a>
                        <ul class="custom-menu">
                            <li><a href="/home/center"><i class="fa fa-user-o"></i>个人中心</a></li>
                            <li><a href="#"><i class="fa fa-heart-o"></i> 我的收藏</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
                            <li><a href="#"><i class="fa fa-check"></i> 结账</a></li>
                            <li><a href="#"><i class="fa fa-unlock-alt"></i> 登录</a></li>
                            <li><a href="#"><i class="fa fa-user-plus"></i> 申请新账户</a></li>
                        </ul>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    <li class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty">3</span>
                            </div>
                            <strong class="text-uppercase">我的购物车:</strong>
                            <br>
                            <span>35.20$</span>
                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">
                                    <div class="product product-widget">
                                        <div class="product-thumb">
                                            <img src="/shop/home/shou/img/thumb-product01.jpg" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                                            <h2 class="product-name"><a href="#">产品名称</a></h2>
                                        </div>
                                        <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="product product-widget">
                                        <div class="product-thumb">
                                            <img src="/shop/home/shou/img/thumb-product01.jpg" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
                                            <h2 class="product-name"><a href="#">产品名称</a></h2>
                                        </div>
                                        <button class="cancel-btn"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                                <div class="shopping-cart-btns">
                                    <a href="/homecart" class="main-btn">查看购物车</a>
                                    <button class="primary-btn">付款 <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- /Cart -->

                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
<!-- /HEADER -->
<!-- NAVIGATION -->
@section('content')
@show
<!-- /section -->
<!-- FOOTER -->
<footer id="footer" class="section section-grey">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <!-- footer logo -->
                    <div class="footer-logo">
                        <a class="logo" href="#">
                            <img src="/shop/home/shou/img/logo.png" alt="">
                        </a>
                    </div>
                    <!-- /footer logo -->

                    <p></p>

                    <!-- footer social -->
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                    <!-- /footer social -->
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">我的帐户</h3>
                    <ul class="list-links">
                        <li><a href="#">我的帐户</a></li>
                        <li><a href="#">我的收藏</a></li>
                        <li><a href="#">相比</a></li>
                        <li><a href="#">查看</a></li>
                        <li><a href="#">登录</a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <div class="clearfix visible-sm visible-xs"></div>

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">客户服务</h3>
                    <ul class="list-links">
                        <li><a href="#">关于我们</a></li>
                        <li><a href="#"> 运送和退货</a></li>
                        <li><a href="#">运送指南</a></li>
                        <li><a href="#">常问问题</a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer subscribe -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">保持联系</h3>
                    <p>我叫汤普斯·安布罗斯.李  email 2568107674@qq.com 请多联系!</p>
                    <form>
                        <div class="form-group">
                            <input class="input" placeholder="输入电子邮件">
                        </div>
                        <button class="primary-btn">加入时事通讯</button>
                        <a href="/home/links" class="primary-btn">添加友情链接</a>
                    </form>
                </div>
            </div>
            <!-- /footer subscribe -->
        </div>
        {{--友情链接开始--}}
        <div class="row">
            <!-- footer copyright -->
            <div class="footer-copyright">
                <div class="container">
                    <h2>友情链接</h2>
                    <hr>
                    <div class="row">
                        {{--友情链接开始--}}
                        @foreach($common_links as $row)
                            <a href="{{$row->url}}" target="_blank">
                                <div class="col-md-2">
                                    <p><span class="fa fa-link"></span><strong>{{$row->linkname}}</strong></p>
                                </div>
                            </a>
                        @endforeach
                        {{--友情链接结束--}}
                    </div>
                </div>
                <!-- /footer copyright -->
            </div>
        {{--友情链接结束--}}
        <!-- /row -->
            <hr>
            <!-- row -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <!-- footer copyright -->
                    <div class="footer-copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        ©2019 eshop 使用eshop前必读 意见反馈 域名备案中
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <!-- /footer copyright -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="/shop/home/shou/js/jquery.min.js"></script>
<script src="/shop/home/shou/js/bootstrap.min.js"></script>
<script src="/shop/home/shou/js/slick.min.js"></script>
<script src="/shop/home/shou/js/nouislider.min.js"></script>
<script src="/shop/home/shou/js/jquery.zoom.min.js"></script>
<script src="/shop/home/shou/js/main.js"></script>

</body>

</html>
