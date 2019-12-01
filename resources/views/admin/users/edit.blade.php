@extends('admin.layout.index')
@section('content')
    <section class="main-content-wrapper">
        <form action="/admin/users/{{$user->id}}" method="post" class="form-horizontal"  enctype="multipart/form-data" style="padding-top:50px;">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="uname" id="name" value="{{ $user->uname }}" readonly>
                </div>
            </div>
            <!--<div class="form-group">
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
            </div>-->

            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">手机号</label>
                <div class="col-sm-5">
                    <input type="nubmer" class="form-control" name="phone" id="phone" value="{{ $user->phone }}">
                </div>
            </div>
            <div class="form-group">
                <label for="add" class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="email" id="add" value="{{ $user->email }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">正在使用</label>
                <div class="col-sm-3">
                    <img src="/uploads/{{$user->userinfo->profile}}" alt="{{$user->userinfo->profile}}" style="border-radius:5px; border:1px solid  #ccc; width:80px;" >
                </div>
            </div>
            <input type="hidden" name="old_profile" value="{{$user->userinfo->profile}}">
            <div class="form-group">
                <label for="pic" class="col-sm-2 control-label">头像</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" name="profile" id="pic">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-warning" value="修改用户">
                </div>
            </div>
        </form>
    </section>
    @endsection
