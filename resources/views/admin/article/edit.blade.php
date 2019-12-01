@extends('admin.layout.index')
@section('content')
    <script type="text/javascript" charset="utf-8" src="/shop/admin/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/shop/admin//ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/shop/admin//ueditor/lang/zh-cn/zh-cn.js"></script>
    <form action="/admin/article/{{$art->id}}" method="post" class="form-horizontal"  enctype="multipart/form-data" style="padding-top:50px;">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">标题</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="title" id="name" value="{{$art->title}}" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="name1" class="col-sm-2 control-label">作者</label>
            <div class="col-sm-5">
                <input type="text" class="form-control has-danger" name="descr" id="name1" value="{{$art->descr}}" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="pic" class="col-sm-2 control-label">使用中</label>
            <div class="col-sm-5">
                <img src="{{$art->thumb}}" style="border-radius:5px; border:1px solid  #ccc; width:80px;" >
            </div>
        </div>
        <input type="hidden" name="old_file" value="{{$art->thumb}}">
        <div class="form-group">
            <label for="pic" class="col-sm-2 control-label">图片</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="thumb" id="pic">
            </div>
        </div>
        <div class="form-group">
            <label for="name1" class="col-sm-2 control-label">内容</label>
            <div class="col-sm-5">
                <script id="editor" type="text/plain" name="editor" style="width:700px;height:500px;" required="">{!! $art->editor!!}</script>
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

