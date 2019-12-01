@extends('admin.layout.index')
@section('content')
    <script type="text/javascript" charset="utf-8" src="/shop/admin/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/shop/admin//ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/shop/admin//ueditor/lang/zh-cn/zh-cn.js"></script>
    <form action="/admin/shops" method="post" class="form-horizontal"  enctype="multipart/form-data" style="padding-top:50px;">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">商品名称</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="name" id="name"
                       placeholder="请输入商品名" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="rname" class="col-sm-2 control-label">商品类别</label>
            <div class="col-sm-5">
                <select name="cate_id" class="form-control">
                    <option value="">--请选择--</option>
                    @foreach($cate as $row)
                        <option value="{{$row->id}}" {{ substr_count($row->path,',') >=2 ? 'disabled' : '' }}>{{$row->cname}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="pic" class="col-sm-2 control-label">商品图片</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="pic" id="pic">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">商品描述</label>
            <div class="col-sm-5">
                <script id="editor" type="text/plain" name="descr" style="width:700px;height:500px;" required=""></script>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">商品数量</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="num" id="name"
                       placeholder="请输入商品数量" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">商品价格</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="price" id="name"
                       placeholder="请输入商品价格" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" value="添加商品">
            </div>
        </div>
    </form>
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
    </script>
@endsection
