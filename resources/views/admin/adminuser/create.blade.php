@extends('admin.layout.index')
@section('content')
    <form action="/admin/adminuser" method="post" class="form-horizontal"  enctype="multipart/form-data" style="padding-top:50px;">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">管理员名称</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="uname" id="name"
                       placeholder="请输入管理员名称" value="{{old('uname')}}" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="rname" class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-5">
                <select name="rid" class="form-control" required="">
                    @foreach($roles as $k=>$v)
                    <option value="{{$v->id}}" {{$v->rname == '普通员工' ? 'checked':''}}>{{$v->rname}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="pwd" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="upass" id="pwd"
                       placeholder="请输入密码" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="repwd" class="col-sm-2 control-label">再次输入密码</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="repass" id="repwd"
                       placeholder="请再次输入密码" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="pic" class="col-sm-2 control-label">头像</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="profile" id="pic" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" value="添加管理员">
            </div>
        </div>
    </form>
    @endsection