@extends('admin.layout.index')
@section('content')
    <form action="/admin/adminuser/{{$adminuser->id}}" method="post" class="form-horizontal"  enctype="multipart/form-data" style="padding-top:50px;">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">管理员名称</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="uname" id="name" value="{{$adminuser->uname}}" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="rname" class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-5">
                <select name="rid" class="form-control">
                    @foreach($roles as $k=>$v)
                        <option value="{{$v->id}}" {{ $v->id == $aduser->rid ? 'selected':''}} required="">{{$v->rname}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="pwd" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="upass" id="pwd" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="pic" class="col-sm-2 control-label">使用中</label>
            <div class="col-sm-5">
                <img src="{{$adminuser->profile}}" style="border-radius:5px; border:1px solid  #ccc; width:80px;" >
            </div>
        </div>
        <input type="hidden" name="old_file" value="{{$adminuser->profile}}" required="">
        <div class="form-group">
            <label for="pic" class="col-sm-2 control-label">头像</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="profile" id="pic" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" value="确认修改">
            </div>
        </div>
    </form>
@endsection
