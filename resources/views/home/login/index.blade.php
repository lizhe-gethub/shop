@extends('home.layout.index')
@section('content')
    <hr>
    <title>Gadget Sign Up Form a Flat Responsive Widget Template :: w3layouts </title>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords"
          content="Gadget Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Meta tags -->
    <!-- font-awesome icons -->
    <link href="/shop/home/register/css/font-awesome.min.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!--stylesheets-->
    <link href="/shop/home/register/css/style.css" rel='stylesheet' type='text/css' media="all">
    <!--//style sheet end here-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <h1 class="error">E商城登录</h1>
    <!---728x90--->
    <div class="w3layouts-two-grids">
        <!---728x90--->
        <div class="mid-class">
            <div class="img-right-side">
                <h3>管理你的小工具账户</h3>
                <img src="/shop/home/register/images/b11.png" class="img-fluid" alt="">
            </div>

            {{--登录--}}
            <div class="txt-left-side" id="phone_show">
                <h2> 请登录 </h2>
                <form action="/home/login/dologin" method="post" id="pp">
                    {{csrf_field()}}
                    @if(session('lerror'))
                        <div class="alert">
                            <div class="alert alert-danger" data-dismiss="alert">{{session('lerror')}}<span
                                        class="close">&times</span></div>
                        </div>
                    @endif
                    <div class="form-left-to-w3l has-feedback">
                        <span class="fa fa-phone" aria-hidden="true"></span>
                        <input type="text" name="loginname" placeholder="请输入手机号/邮箱" required="" reminder="请输入账号"
                               names="phone">
                        <span class="form-control-feedback"></span>
                        <div class="clear"></div>
                    </div>
                    <div></div>
                    <div class="form-left-to-w3l has-feedback">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="pwd" placeholder="请输入密码" required="" reminder="请输入登录密码">
                        <span class="form-control-feedback"></span>
                        <div class="clear"></div>
                    </div>
                    <div class="main-two-w3ls">
                        <div class="left-side-forget">
                            <input type="checkbox" class="checked">
                            <span class="remenber-me">记住账号 </span>
                        </div>
                        <div class="right-side-forget">
                            <a href="/home/login/forgetindex" class="for">忘记密码...?</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="登录" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
            {{--登录结束--}}
        </div>
    </div>
    <script>
        //验证提交框是否为空
        $("input").focus(function () {
            var reminder = $(this).attr('reminder');
            $(this).next('span').attr('class', "fa fa-question-circle");
            $(this).parent().next('div').attr('class', ' alert-danger').html(reminder);
        });
        $("input[name='loginname']").blur(function () {
            var name = $(this).val();
            var l = $(this);
            if (name == '') {
                $(this).next('span').attr('class', "fa fa-exclamation");
                $(this).parent().next('div').attr('class', 'alert-danger').html('账号必填');
            } else if (name.match(/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/g) != null) {
                $.get('/checkemailstatus', {n: name}, function (res) {
                    if (res == 1) {
                        l.next('span').attr('class', "fa fa-check-square-o");
                        l.parent().next('div').attr('class', 'alert-success').html('');
                    }
                    if (res == 2) {
                        l.next('span').attr('class', "fa fa-exclamation");
                        l.parent().next('div').attr('class', 'alert-warning').html('邮箱账号未激活');
                    }
                    if(res == 3){
                        l.next('span').attr('class', "fa fa-exclamation");
                        l.parent().next('div').attr('class', 'alert-warning').html('此邮箱账号不存在,请先注册');
                    }
                })
            }else if(name.match(/^1{1}[3-9]{1}[\d]{9}$/) != null){
                $.get('/checkep', {p: name}, function (data) {
                    if (data == 1) {
                        l.next('span').attr('class', "fa fa-exclamation");
                        l.parent().next('div').attr('class', 'alert-warning').html('不存在此手机号用户,请先注册');
                    }
                    if (data == 2) {
                        l.next('span').attr('class', "fa fa-check-square-o");
                        l.parent().next('div').attr('class', 'alert-success').html('');
                    }
                })
            } else {
                $(this).next('span').attr('class', "fa fa-exclamation");
                $(this).parent().next('div').attr('class', 'alert-danger').html('请输入正确账号格式');
            }
        });
        //密码校验
        $("input[name='pwd']").blur(function () {
            var pwd = $(this).val();
            if (pwd.match(/^\w{3,18}$/) == null) {
                $(this).next('span').attr('class', "fa fa-exclamation");
                $(this).parent().next('div').attr('class', 'alert-danger').html('密码格式错误');
            } else {
                $(this).next('span').attr('class', "fa fa-check-square-o");
                $(this).parent().next('div').attr('class', 'alert-success').html('');
            }
        });
    </script>
@endsection
