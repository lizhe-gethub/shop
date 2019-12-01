@extends('admin.layout.index')
@section('content')
    <form action="/admin/nodes/{{$nodes->id}}" method="post" class="form-horizontal"  enctype="multipart/form-data" style="padding-top:50px;">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">权限描述</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="desc" id="name" value="{{$nodes->desc}}" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">控制器名称</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="cname" id="name" value="{{$nodes->cname}}" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">方法名称</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="aname" id="name" value="{{$nodes->aname}}" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" value="修改">
            </div>
        </div>
    </form>
    @endsection
