<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{Config::get('app.admin_title')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Fonts from Font Awsome -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="/assets/css/animate.css">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <!-- Vector Map  -->
    <link rel="stylesheet" href="/assets/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css">
    <!-- ToDos  -->
    <link rel="stylesheet" href="/assets/plugins/todo/css/todos.css">
    <!-- Morris  -->
    <link rel="stylesheet" href="/assets/plugins/morris/css/morris.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/5.10.2/css/all.min.css">
    <!-- Fonts -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> -->
    <!-- Feature detection -->
    <script src="/assets/js/modernizr-2.6.2.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/assets/js/html5shiv.js"></script>
    <script src="/assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<section id="container">
    <header id="header" style="height:80px">
        <!--logo start-->
        <div class="brand" >
            <a href="/admin" class="logo">
                <span>后台管理</span></a>
        </div>
        <!--logo end-->
        <div class="toggle-navigation toggle-left">
            <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
                <i class="fa fa-bars"></i>
            </button>
@if(session('success'))
                <div class="alert alert-success fade in alert-dismissible" role="alert" style="display: inline-block">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{session('success') }}</strong>
                </div>
@endif
            @if(session('error'))
                <div class="alert alert-danger fade in  alert-dismissible" role="alert"  style="display: inline-block">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{ session('error') }}</strong>
                </div>
@endif
        </div>
        <div class="user-nav">
            <ul>
                <li class="profile-photo">
@if(session('admin_user')!=null)
                    <img src="/uploads/{{session('admin_user')->profile}}" alt="" class="img-circle" width="50px">
    @endif
                </li>
                <li class="dropdown settings">
@if(session('admin_user')!=null)
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       {{session('admin_user')->uname}} <i class="fa fa-angle-down"></i>
                    </a>
@endif
                    <ul class="dropdown-menu animated fadeInDown">
                        <li>
                            <a href="#"><i class="fa fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar"></i> Calendar</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge badge-danager" id="user-inbox">5</span></a>
                        </li>
                        <li>
                            <a href="/admin/outlogin"><i class="fa fa-power-off"></i> 退出登录</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <!--sidebar left start-->
    <aside class="sidebar">
        <div id="leftside-navigation" class="nano">
            <ul class="nano-content">
                <li class="active">
                    <a href="/" target="_blank"><i class="glyphicon glyphicon-home"></i><span>首页</span></a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa-group" style="margin-left:-2px"></i><span style="margin-left:3px">管理员</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="/admin/adminuser/create"><i class="glyphicon glyphicon-plus"></i>添加管理员</a>
                        </li>
                        <li><a href="/admin/adminuser"><i class="glyphicon glyphicon-list-alt"></i>管理员列表</a>
                        </li>
                        <li><a href="/admin/roles/create"><i class="glyphicon glyphicon-plus"></i>添加角色</a>
                        </li>
                        <li><a href="/admin/roles"><i class="fa fa-user-secret"></i>角色列表</a>
                        </li>
                        <li><a href="/admin/nodes/create"><i class="glyphicon glyphicon-plus"></i>添加权限</a>
                        </li>
                        <li><a href="/admin/nodes"><i class="fa fa-key"></i>权限列表</a>
                        </li>
                    </ul>
                    <a href="javascript:void(0);"><i class="glyphicon glyphicon-user"></i><span>用户管理</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="/admin/users"><i class="glyphicon glyphicon-list-alt"></i>用户列表</a>
                        </li>
                    </ul>
                    <a href="javascript:void(0);"><i class="glyphicon glyphicon-th-list"></i><span>分类管理</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="/admin/cates/create"><i class="glyphicon glyphicon-plus"></i>添加分类</a>
                        </li>
                        <li><a href="/admin/cates"><i class="glyphicon glyphicon-list-alt"></i>分类列表</a>
                        </li>
                    </ul>
                    <a href="javascript:void(0);"><i class="fa fa-bars"></i><span>公告管理</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="/admin/article/create"><i class="glyphicon glyphicon-plus"></i>添加公告</a>
                        </li>
                        <li><a href="/admin/article"><i class="glyphicon glyphicon-list-alt"></i>公告列表</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </aside>
    <!--sidebar left end-->
    <!--main content start-->
    <section class="main-content-wrapper">
@section('content')
    @show
    </section>
<!--main content end-->
    <!--sidebar right start-->

    <!--sidebar right end-->
</section>
<!--Global JS-->
<script src="/assets/js/jquery-1.10.2.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/plugins/waypoints/waypoints.min.js"></script>
<script src="/assets/js/application.js"></script>
<!--Page Level JS-->
<script src="/assets/plugins/countTo/jquery.countTo.js"></script>
<script src="/assets/plugins/weather/js/skycons.js"></script>
<!-- FlotCharts  -->
<script src="/assets/plugins/flot/js/jquery.flot.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.resize.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.canvas.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.image.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.categories.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.crosshair.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.errorbars.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.fillbetween.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.navigate.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.pie.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.selection.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.stack.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.symbol.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.threshold.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.colorhelpers.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.time.min.js"></script>
<script src="/assets/plugins/flot/js/jquery.flot.example.js"></script>
<!-- Morris  -->
<script src="/assets/plugins/morris/js/morris.min.js"></script>
<script src="/assets/plugins/morris/js/raphael.2.1.0.min.js"></script>
<!-- Vector Map  -->
<script src="/assets/plugins/jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/assets/plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>
<!-- ToDo List  -->
<script src="/assets/plugins/todo/js/todos.js"></script>
<!--Load these page level functions-->
<script>
$(document).ready(function() {
    app.timer();
    app.map();
    app.weather();
    app.morrisPie();
});
</script>

</body>

</html>



