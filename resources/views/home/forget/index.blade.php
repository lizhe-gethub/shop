<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>账户中心</title>
    <link rel="stylesheet" href="/shop/home/shou/password/mima/Css/ucenter.css" />
    <link href="/shop/home/shou/password/xiangmu/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
    <link href="/shop/home/shou/password/xiangmu/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
    <link href="/shop/home/shou/password/xiangmu/css/personal.css" rel="stylesheet" type="text/css" />
    <link href="/shop/home/shou/password/xiangmu/css/stepstyle.css" rel="stylesheet" type="text/css" />
    <script src="/shop/home/shou/password/xiangmu/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/shop/home/shou/password/xiangmu/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
</head>
<body>
<div id="header">
    <div class="header-layout">
        <div class="header-logo">
            <a class="logo" href="/shop/home/">
                <img src="/shop/home/shou/img/logo.png" alt="">
            </a>
        </div>
        <h2 class="logo-title" style="margin-top:20px;"> 找回密码 </h2>
        <ul class="header-nav">
            <a href="/shop/home/home/login" class="text-uppercase">登录</a> <a href="/shop/home/home/register"
                                                                   class="text-uppercase">注册</a>
            <li><a href="/shop/homehttp://service.taobao.com/support/main/service_center.htm" target="_blank"> </a></li>
        </ul>
    </div>
</div>
<div class="center">
    <div class="center">
        <div class="center">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf">
                    <strong class="am-text-danger am-text-lg">邮箱验证</strong>
                </div>
            </div>
            <hr />
            <!--进度条-->
            <div class="m-progress">
                <div class="m-progress-list">
                    <span class="step-1 step" id="span1"><em class="u-progress-stage-bg"></em> <i class="u-stage-icon-inner">1<em class="bg"></em></i> <p class="stage-name">邮箱验证</p> </span>
                    <span class="step-2 step" id="span2"><em class="u-progress-stage-bg"></em> <i class="u-stage-icon-inner">2<em class="bg"></em></i> <p class="stage-name">重置密码</p> </span>
                    <span class="step-3 step" id="span3"><em class="u-progress-stage-bg"></em> <i class="u-stage-icon-inner">3<em class="bg"></em></i> <p class="stage-name">完成</p> </span>
                    <span class="u-progress-placeholder"></span>
                </div>
                <div class="u-progress-bar total-steps-2">
                    <div class="u-progress-bar-inner"></div>
                </div>
            </div>
            <form class="am-form am-form-horizontal" action="/home/login/doforget" method="post">
                {{csrf_field()}}
                <div class="center div1">
                    <input type="text" name="email" style="display:block;float:left;width:200px;margin:0px 20px 30px 100px" placeholder="请输入邮箱">
                    <input type="submit" value="点击获取邮箱验证" class="am-btn am-btn-success" id="" style="display:block;float:left;width:150px">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
