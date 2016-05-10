@extends(tpl('admin._layout.base'))

@section('title', '编辑品牌')

@section('title-block')
<i class="icon_large icon_bookmark2"></i>
<span>编辑品牌</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/brand">品牌管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/brand/edit/{{ $result['brand']->brand_id }}">编辑品牌</a></li>
<li class="back"><a class="btn btn_red" href="/admin/brand"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest">
    <form method="post" class="main-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form_group row">
        <label class="col-lg-2 control_label"><span class="must">*</span>品牌名称：</label>
        <div class="col-lg-6">
            <input type="text" class="form_control" name="brand_name" value="{{ $result['brand']->brand_name or '' }}">
        </div>
    </div><!-- /.form_group -->

    <div class="form_group row">
        <label class="col-lg-2 control_label">排序：</label>
        <div class="col-lg-6">
            <input type="text" class="form_control" name="sort_order" value="{{ $result['brand']->sort_order or '0' }}">
        </div>
    </div><!-- /.form_group -->

    <div class="form_group row">
        <label class="col-lg-2 control_label"><span class="must">*</span>LOGO：</label>
        <div class="col-lg-2">
            <label class="uploader">
                <span><i class="icon_image white"></i>&nbsp;点击上传图片</span>
                <input type="file" name="logo_file" multiple title="Click to add Files">
            </label>
            <div class="img_view"><a class="focus"><img src="{{ $result['brand']->brand_logo }}"></a></div>
        </div>
    </div><!-- /.form_group -->

    <div class="form_group row">
        <div class="col-lg-2"></div>
        <div class="col-lg-1">
            <button class="btn btn_green">提交</button>
        </div>
    </div><!-- /.form_group -->
    </form>
</div><!-- /.body_nest -->
@endsection

@section('foot-assets')
{!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
{!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
{!! script('/third-party/jquery-form/jquery.form.min.js') !!}

{!! script('/assets/admin/js/brand/edit.js') !!}
<script type="text/javascript">
$(function() {
    var editor = new BrandEditor();
    editor.initForm();
});
</script>
@endsection
