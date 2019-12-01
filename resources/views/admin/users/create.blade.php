@extends('admin.layout.index')
@section('content')
    <section class="main-content-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li><i class="glyphicon glyphicon-ban-circle"></i>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/admin/users" method="post" class="form-horizontal"  enctype="multipart/form-data" style="padding-top:50px;">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control has-danger" name="uname" id="name"
                           placeholder="请输入用户名" value="{{ old('uname') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" name="pwd" id="pwd"
                           placeholder="请输入密码">
                </div>
            </div>

            <div class="form-group">
                <label for="repwd" class="col-sm-2 control-label">再次输入密码</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" name="repwd" id="repwd"
                           placeholder="请再次输入密码">
                </div>
            </div>

            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">手机号</label>
                <div class="col-sm-5">
                    <input type="nubmer" class="form-control has-danger" name="phone" id="phone"
                           placeholder="请输入手机号" value="{{old('phone')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="add" class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control has-danger" name="email" id="add"
                           placeholder="请输入邮箱" value="{{old('email')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="pic" class="col-sm-2 control-label">头像</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" name="profile" id="pic">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" value="添加用户">
                </div>
            </div>
        </form>
    </section>
    @endsection
