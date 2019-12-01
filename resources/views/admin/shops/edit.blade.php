@extends('admin.layout.index')
@section('content')
    <script type="text/javascript" charset="utf-8" src="/shop/admin/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/shop/admin//ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/shop/admin//ueditor/lang/zh-cn/zh-cn.js"></script>

    <form action="/admin/shops/{{$shops->id}}" method="post" class="form-horizontal"  enctype="multipart/form-data" style="padding-top:50px;">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">商品名称</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="name" id="name" value="{{$shops->name}}" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="rname" class="col-sm-2 control-label">商品类别</label>
            <div class="col-sm-5">
                <select name="cate_id" class="form-control">
                    @foreach($cates as $row)
                    <option value="{{$row->id}}" {{ substr_count($row->path,',') >=2 ? 'disabled' : '' }} {{$row->id == $shops->cate_id ? 'selected' : '' }}>{{$row->cname}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="pic" class="col-sm-2 control-label">使用中</label>
            <div class="col-sm-5">
                <img src="{{$shops->pic}}" style="border-radius:5px; border:1px solid  #ccc; width:80px;" >
            </div>
        </div>
        <input type="hidden" name="old_file" value="{{$shops->pic}}">
        <div class="form-group">
            <label for="pic" class="col-sm-2 control-label">商品图片</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="pic" id="pic" >
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">商品描述</label>
            <div class="col-sm-5">
                <script id="editor" type="text/plain" name="descr" style="width:700px;height:500px;">{!! $shops->descr !!}</script>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">商品库存数量</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="num" id="name" value="{{$shops->num}}" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">商品价格</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="price" id="name" value="{{$shops->price}}" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" value="确认修改">
            </div>
        </div>
    </form>
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
    </script>
@endsection
