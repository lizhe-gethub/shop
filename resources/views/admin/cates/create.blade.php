@extends('admin.layout.index')
@section('content')
    <form action="/admin/cates" method="post" style="padding-top:50px;">
        {{csrf_field()}}
        <div style="width:500px;margin:0px auto">
    <div class="mws-form-row">
        <label for="name" class="mws-form-label">分类名称</label>
        <div class="mws-form-item">
            <input type="text" class="form-control has-danger" name="cname" id="name"
                   placeholder="请输入分类名称" required="">
        </div>
    </div>
    <div class="mws-form-row">
        <label class="mws-form-label">所属分类</label>
        <div class="mws-form-item">
            <select class="form-control" name="pid">
                <option value="0">--请选择--</option>
                @foreach($cates as $k=>$v)
                    <option value="{{$v->id}}" {{ substr_count($v->path,',') >=2 ? 'disabled' : '' }} {{$v->id == $id ? 'selected' : '' }}>{{$v->cname}}</option>
                    @endforeach
            </select>
        </div>
    </div>
    <div class="mws-form-row">
        <div class="mws-form-item">
            <input type="submit" class="btn btn-primary" value="添加分类">
        </div>
    </div>
        </div>
    </form>
    @endsection
