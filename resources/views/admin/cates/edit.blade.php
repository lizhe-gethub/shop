@extends('admin.layout.index')
@section('content')
    <form action="/admin/cates/{{$cates->id}}" method="post" class="form-horizontal"  enctype="multipart/form-data" style="padding-top:50px;">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">分类名称</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="cname" id="name" value="{{$cates->cname}}" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" value="确认修改">
            </div>
        </div>
    </form>
@endsection

