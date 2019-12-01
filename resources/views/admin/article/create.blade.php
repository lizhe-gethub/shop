@extends('admin.layout.index')
@section('content')
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<script type="text/javascript" charset="utf-8" src="/shop/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/shop/admin//ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/shop/admin//ueditor/lang/zh-cn/zh-cn.js"></script>
<body>
<section class="main-content-wrapper">
    <form action="/admin/article" method="post" class="form-horizontal" enctype="multipart/form-data"
          style="padding-top:50px;">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">标题</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="title" id="name"
                       placeholder="请输入标题" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="pwd" class="col-sm-2 control-label">作者</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="descr" id="pwd"
                       placeholder="请输入作者" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="pic" class="col-sm-2 control-label">图片</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="thumb" id="pic" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">内容</label>
            <div class="col-sm-5">
                <script id="editor" type="text/plain" name="editor" style="width:700px;height:500px;" required=""></script>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" value="添加公告">
            </div>
        </div>
    </form>
</section>
</body>
<script type="text/javascript">
    var ue = UE.getEditor('editor');
        </script>
</html>
@endsection
