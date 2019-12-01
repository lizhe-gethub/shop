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
    <h1 class="error">E商城注册</h1>
    <!---728x90--->
    <div class="w3layouts-two-grids">
        <!---728x90--->
        <div class="mid-class">
            <div class="img-right-side">
                <h3>管理你的小工具账户</h3>
                <button class="btn btn-info" onclick="btn()">切换注册方式</button>
                <img src="/shop/home/register/images/b11.png" class="img-fluid" alt="">
            </div>

            {{--手机号注册开始--}}
            <div class="txt-left-side" style="display: none" id="phone_show">
                <h2> 手机号注册 </h2>
                <form action="/home/register/store" method="post" id="pp">
                    {{csrf_field()}}
                    <div class="form-left-to-w3l has-feedback">
                        <span class="fa fa-phone" aria-hidden="true"></span>
                        <input type="text" name="phone" placeholder="请输入手机号" required="" id="phone" reminder="请输入手机号"
                               names="phone">
                        <span class="form-control-feedback"></span>
                        <div class="clear"></div>
                    </div>
                    <div></div>
                    <div class="form-left-to-w3l has-feedback">
                        <span class="fa fa-code-fork" aria-hidden="true"
                              style="margin-top: 15px ;padding-left:7px"></span>
                        <input type="text" name="code" placeholder="请输入验证码" required="" style="margin-left:12px "
                               reminder="请输入验证码">
                        <span class="form-control-feedback"></span>
                        <a class="btn" href="javascript:void(0);" onclick="sendMobileCode(this)" id="send">
                            <span id="dyMobileButton" style="font-size:20px;">获取</span></a>
                        <div class="clear"></div>
                    </div>
                    <div></div>
                    <div class="form-left-to-w3l has-feedback">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="pwd" placeholder="请输入密码" required="" reminder="请输入密码">
                        <span class="form-control-feedback"></span>
                        <div class="clear"></div>
                    </div>
                    <div></div>
                    <div class="form-left-to-w3l has-feedback">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="upwd" placeholder="请再次密码" required="" reminder="请再次输入密码">
                        <span class="form-control-feedback"></span>
                        <div class="clear"></div>
                    </div>
                    <div></div>
                    <div class="main-two-w3ls">
                        <div class="left-side-forget">
                            <input type="checkbox" class="checked">
                            <span class="remenber-me">记住账号 </span>
                        </div>
                        <div class="right-side-forget">
                            <a href="#" class="for">忘记密码...?</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="注册" class="form-control btn btn-primary">
                    </div>
                </form>
                <div class="w3layouts_more-buttn">
                    <h3>已有账户..?
                        <a href="#">在这登录
                        </a>
                    </h3>
                </div>
                <div class="clear"></div>
            </div>
            {{--手机号注册结束--}}
            {{--邮箱号注册开始--}}
            <div class="txt-left-side" style="display: block" id="email_show">
                <h2>邮箱号注册</h2>
                @if(session('err'))
                    <div class="alert alert-danger alert-dismissible" role="alert" style="display: inline-block">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <strong>{{ session('err') }}</strong>
                    </div>
                @endif
                <form action="/register/insert" method="post" id="ee">
                    {{csrf_field()}}
                    <div class="form-left-to-w3l has-feedback">
                        <span class="fa fa-envelope-o" aria-hidden="true"></span>
                        <input type="email" name="email" placeholder="请输入邮箱" required="" value="{{old('email')}}"
                               reminder="请输入邮箱">
                        <span class="form-control-feedback"></span>
                        <div class="clear"></div>
                    </div>
                    <div></div>
                    @if(session('cerror'))
                        <div class="alert alert-danger">
                            {{session('cerror')}}
                            <span class="close" data-dismiss="alert"><span class="fa fa-bell-slash"></span></span>
                        </div>
                    @endif
                    <div class="form-left-to-w3l has-feedback">
                        <span class="fa fa-code" aria-hidden="true" style="margin-top: 15px ;padding-left:7px"></span>
                        <input type="text" name="codes" id="" placeholder="请输入图片验证码" required=""
                               style="margin-left:12px" reminder="请输入图片验证码">
                        <span class="form-control-feedback"></span>
                        <img src="/home/code" alt="" onclick="this.src=this.src+'?a=1'">
                        <div class="clear"></div>
                    </div>
                    <div></div>
                    <div class="form-left-to-w3l has-feedback">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="epwd" placeholder="请输入密码" required="" reminder="请输入密码">
                        <span class="form-control-feedback"></span>
                        <div class="clear"></div>
                    </div>
                    <div></div>
                    <div class="form-left-to-w3l has-feedback">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="eupwd" placeholder="请再次密码" required="" reminder="请再次输入验证码">
                        <span class="form-control-feedback"></span>
                        <div class="clear"></div>
                    </div>
                    <div></div>
                    <div class="main-two-w3ls">
                        <div class="left-side-forget">
                            <input type="checkbox" class="checked">
                            <span class="remenber-me">记住账号 </span>
                        </div>
                        <div class="right-side-forget">
                            <a href="#" class="for">忘记密码...?</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="注册" class="form-control btn btn-primary">
                    </div>
                </form>
                <div class="w3layouts_more-buttn">
                    <h3>已有账户..?
                        <a href="#">在这登录
                        </a>
                    </h3>
                </div>
                <div class="clear"></div>
            </div>
            {{--邮箱号注册结束--}}
        </div>
    </div>
    <script>
        PHONE1 = false;
        CODE1 = false;
        PWD1 = false;
        UPWD1 = false;

        EMAIL1 = false;
        CODES1 = false;
        EUPWD1 = false;
        EPWD1 = false;
        //验证提交框是否为空
        $("input").focus(function () {
            var reminder = $(this).attr('reminder');
            $(this).next('span').attr('class', "fa fa-question-circle");
            $(this).parent().next('div').attr('class', ' alert-danger').html(reminder);

        });
        //验证手机号是否正确/是否也存在
        $("input[name='phone']").blur(function () {
            var phone = $(this).val();
            var p = $(this);
            if (phone.match(/^1{1}[3-9]{1}[\d]{9}$/) == null) {
                $(this).next('span').attr('class', "fa fa-exclamation-circle");
                $(this).parent().next('div').attr('class', 'alert-danger').html('手机号格式不正确');
                PHONE1 = false;
            } else {
                $.get('/checkphone', {phone: phone}, function (data) {
                    if (data == 1) {
                        p.next('span').attr('class', "fa fa-exclamation");
                        p.parent().next('div').attr('class', 'alert-danger').html('手机号已存在');
                        $('#dyMobileButton').parent().attr('disabled', true);
                        PHONE1 = false;
                    } else if (data == 0) {
                        p.next('span').attr('class', "fa fa-check-square-o");
                        p.parent().next('div').attr('class', 'alert-success').html('');
                        PHONE1 = true;
                    }
                })
            }
        });
        //邮箱注册
        $("input[name='email']").blur(function () {
            var email = $(this).val();
            var e = $(this);
            if (email.match(/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/g) == null) {
                $(this).next('span').attr('class', "fa fa-exclamation-circle");
                $(this).parent().next('div').attr('class', 'alert-danger').html('邮箱格式不正确');
                EMAIL1 = false;
            } else {
                $.get('/checkemail', {email: email}, function (data) {
                    if (data == 1) {
                        e.next('span').attr('class', "fa fa-exclamation");
                        e.parent().next('div').attr('class', 'alert-danger').html('邮箱已存在');
                        $('#dyMobileButton').parent().attr('disabled', true);
                        EMAIL1 = false;
                    } else if (data == 0) {
                        e.next('span').attr('class', "fa fa-check-square-o");
                        e.parent().next('div').attr('class', 'alert-success').html('');
                        EMAIL1 = true;
                    }
                })
            }
        });
        //手机验证码
        $("input[name='code']").blur(function () {
            var code = $(this).val();
            //alert(code);
            var c = $(this);
            $.get("/checkcode", {code: code}, function (data) {
                if (data == 1) {
                    c.next('span').attr('class', "fa fa-check-square-o");
                    c.parent().next('div').attr('class', 'alert-success').html('');
                    CODE1 = true;
                } else if (data == 2) {
                    c.next('span').attr('class', "fa fa-exclamation");
                    c.parent().next('div').attr('class', 'alert-danger').html('验证码输入错误');
                    CODE1 = false;
                } else if (data == 3) {
                    c.next('span').attr('class', "fa fa-exclamation");
                    c.parent().next('div').attr('class', 'alert-danger').html('输入的验证码为空');
                    CODE1 = false;
                } else if (data == 4) {
                    c.next('span').attr('class', "fa fa-exclamation");
                    c.parent().next('div').attr('class', 'alert-danger').html('验证码过期');
                    CODE1 = false;
                }
            });
        });
        //手机号注册密码校验
        $("input[name='pwd']").blur(function () {
            var pwd = $(this).val();
            if (pwd.match(/^\w{3,18}$/) == null) {
                $(this).next('span').attr('class', "fa fa-exclamation");
                $(this).parent().next('div').attr('class', 'alert-danger').html('密码格式错误');
                PWD1 = false;
            } else {
                $(this).next('span').attr('class', "fa fa-check-square-o");
                $(this).parent().next('div').attr('class', 'alert-success').html('');
                PWD1 = true;
            }
        });
        $("input[name='upwd']").blur(function () {
            var upwd = $(this).val();

            var pwd = $("input[name='pwd']").val();

            if (pwd.match(/^\w{3,18}$/) == null) {
                $(this).next('span').attr('class', "fa fa-exclamation");
                $(this).parent().next('div').attr('class', 'alert-danger').html('第二次密码格式错误');
                UPWD1 = false;
            } else {
                $(this).next('span').attr('class', "fa fa-check-square-o");
                $(this).parent().next('div').attr('class', 'alert-success').html('');
                UPWD1 = true;
            }


            if (upwd == pwd) {
                $(this).next('span').attr('class', "fa fa-check-square-o");
                $(this).parent().next('div').attr('class', 'alert-success').html('');
                UPWD1 = true;
            } else {
                $(this).next('span').attr('class', "fa fa-exclamation");
                $(this).parent().next('div').attr('class', 'alert-danger').html('两次密码输入不一致');
                UPWD1 = false;
            }
        });
        //邮箱注册密码校验
        $("input[name='epwd']").blur(function () {
            var epwd = $(this).val();
            if (epwd.match(/^\w{3,18}$/) == null) {
                $(this).next('span').attr('class', "fa fa-exclamation");
                $(this).parent().next('div').attr('class', 'alert-danger').html('密码格式错误');
                EPWD1 = false;
            } else {
                $(this).next('span').attr('class', "fa fa-check-square-o");
                $(this).parent().next('div').attr('class', 'alert-success').html('');
                EPWD1 = true;
            }
        });
        $("input[name='eupwd']").blur(function () {
            var eupwd = $(this).val();

            var epwd = $("input[name='epwd']").val();

            if (epwd.match(/^\w{3,18}$/) == null) {
                $(this).next('span').attr('class', "fa fa-exclamation");
                $(this).parent().next('div').attr('class', 'alert-danger').html('第二次密码格式错误');
                EUPWD1 = false;
            } else {
                $(this).next('span').attr('class', "fa fa-check-square-o");
                $(this).parent().next('div').attr('class', 'alert-success').html('');
                EUPWD1 = true;
            }


            if (eupwd == epwd) {
                $(this).next('span').attr('class', "fa fa-check-square-o");
                $(this).parent().next('div').attr('class', 'alert-success').html('');
                EUPWD1 = true;
            } else {
                $(this).next('span').attr('class', "fa fa-exclamation");
                $(this).parent().next('div').attr('class', 'alert-danger').html('两次密码输入不一致');
                EUPWD1 = false;
            }
        });
        //图片验证码校验
        $("input[name='codes']").blur(function () {
            var codes = $(this).val();
            //alert(code);
            var c = $(this);
            $.get("/checkcodes", {codes: codes}, function (data) {
                if (data == 1) {
                    c.next('span').attr('class', "fa fa-check-square-o");
                    c.parent().next('div').attr('class', 'alert-success').html('');
                    CODES1 = true;
                } else if (data == 2) {
                    c.next('span').attr('class', "fa fa-exclamation");
                    c.parent().next('div').attr('class', 'alert-danger').html('验证码输入错误');
                    CODES1 = false;
                }
            });
        });

        function btn() {
            $('#phone_show').toggle();
            $('#email_show').toggle();
        }
    </script>
    <script>
        function sendMobileCode(obj) {
            //获取验证码
            let phone = $('#phone').val();
            //验证手机号
            let phone_preg = /^1{1}[3-9]{1}[\d]{9}$/;
            if (!phone_preg.test(phone)) {
                alert('请输入正确的手机号');
                return false;
            }

            $(obj).attr('disabled', true);
            $(obj).find('span').css('color', '#ccc');

            if ($('#dyMobileButton').html() == '获取') {
                let num = 60;

                $timmer = setInterval(function () {
                    num--;
                    $('#dyMobileButton').html('' + num + '秒后重试');

                    if (num == 0) {
                        $(obj).attr('disabled', false);
                        $('#dyMobileButton').html('获取');
                        $(obj).find('span').css('color', '');
                        clearTimeout($timmer);
                    }
                }, 1000);

                //发送ajax
                $.get('/home/register/sendPhone', {phone}, function ($res) {
                    if ($res.error_code == 0) {
                        alert('验证码发送成功,10分钟后有效');
                    } else {
                        alert('发送验证码失败');
                    }
                }, 'json');
            }
        }

        $("#ff").submit(function () {
            $("input").trigger("blur");//触发某个事件
            if (PHONE1 && CODE1 && PWD1 && UPWD1) {
                return true;
            } else {
                return false;
            }
        });
        $("#ee").submit(function () {
            $("input").trigger("blur");//触发某个事件
            if (EMAIL1 && CODES1 && EPWD1 && EUPWD1) {
                return true;
            } else {
                return false;
            }
        })

    </script>
    <!---728x90--->
@endsection