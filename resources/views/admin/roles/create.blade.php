@extends('admin.layout.index')
@section('content')
    <form action="/admin/roles" method="post" class="form-horizontal"  enctype="multipart/form-data" style="padding-top:50px;">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="rname" id="name"
                       placeholder="请输入角色名" value="" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">角色权限</label>
            <div class="col-sm-5">
                @foreach($list as $k=>$v)
                    <h4>{{ $conall[$k] }}</h4>
                @foreach($v as $kk => $vv)
                        <div class="checkbox-inline" style="margin-left:20px;"><label><input type="checkbox" name="nids[]" value="{{$vv['id']}}">{{$vv['desc']}}</label></div>
                    @endforeach
                    @endforeach
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" value="添加角色">
            </div>
        </div>
    </form>
@endsection
