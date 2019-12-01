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
    <link rel="stylesheet" href="/shop/home/btp/bootstrap.min.css">
    <script href="/shop/home/btp/jquery-2.0.2.min.js"></script>
    <script href="/shop/home/btp/bootstrap.min.js"></script>
</head>
<body>
<div id="header">
    <div class="header-layout">
        <div class="header-logo">
            <a class="logo" href="/shop/home/">
                <img src="/shop/home/shou/img/logo.png" alt="">
            </a>
        </div>
        <h2 class="logo-title"> 找回密码 </h2>
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
                    <span class="step-1 step" id="span1"> <em class="u-progress-stage-bg"></em> <i class="u-stage-icon-inner">1<em class="bg"></em></i> <p class="stage-name">邮箱验证</p> </span>
                    <span class="step-1 step" id="span2"> <em class="u-progress-stage-bg"></em> <i class="u-stage-icon-inner">2<em class="bg"></em></i> <p class="stage-name">重置密码</p> </span>
                    <span class="step-3 step" id="span3"> <em class="u-progress-stage-bg"></em> <i class="u-stage-icon-inner">3<em class="bg"></em></i> <p class="stage-name">完成</p> </span>
                    <span class="u-progress-placeholder"></span>
                </div>
                <div class="u-progress-bar total-steps-2">
                    <div class="u-progress-bar-inner"></div>
                </div>
            </div>
            <form class="am-form am-form-horizontal" action="/home/login/doreset" method="post">
                {{--<div class="center div1" style="display:none;">
                    <input type="text" id="code" style="display:block;float:left;width:200px;margin:0px 20px 30px 100px" placeholder="请输入验证码" />
                    <div class="am-btn am-btn-success" id="huoqu" style="display:block;float:left;width:150px">
                        点击获取
                    </div>
                </div>--}}
                {{csrf_field()}}
                <div class="center" style="margin:0px 0px 0px 120px">
                    <span id="su"></span>
                </div>
                <input type="hidden" name="id" value="{{$id}}">
                <div style="color:red">@if(session('reseterror'))
                        {{session('reseterror')}}
                @endif
                </div>
                <div class="center div2" style="display:block;">
                    <div class="am-form-group">
                        <label for="user-new-password" class="am-form-label">新密码</label>
                        <div class="am-form-content">
                            <input type="password" name="password" id="user-new-password" placeholder="由数字、字母、下划线组合的6-15位密码" />
                            <span></span>
                        </div>
                    </div>
                    <label for="user-new-password" class="am-form-label">确认密码</label>
                    <div class="am-form-content">
                        <input type="password" name="repassword" id="user-new-password" placeholder="两次密码一致" />
                        <span></span>
                    </div>
                </div>
        <div class="info-btn">
            <div class="" id="">
                <input type="submit" value="提交" class="btn btn-primary" >
            </div>
        </div>
        </form>
        </div>
    </div>
    </div>
</body>
</html>
