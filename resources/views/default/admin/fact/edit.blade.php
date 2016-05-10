@extends(tpl('admin._layout.base'))

@section('title', '编辑事件')

@section('title-block')
<i class="icon_large icon_image"></i>
<span>编辑事件</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/fact">事件管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/fact/edit/{{ $result['fact']->fact_id }}">编辑事件</a></li>
<li class="back"><a class="btn btn_red" href="/admin/fact"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest">
    <form method="post" class="main-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form_group row">
        <label class="col-lg-2 control_label"><span class="must">*</span>事件名称：</label>
        <div class="col-lg-6">
            <input type="text" class="form_control" name="fact_name" value="{{ $result['fact']->fact_name or '' }}">
        </div>
    </div><!-- /.form_group -->

    <div class="form_group row">
        <label class="col-lg-2 control_label">价格：</label>
        <div class="col-lg-6">
            <input type="text" class="form_control" name="fact_price" value="{{ $result['fact']->fact_price or '' }}">
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

{!! script('/assets/admin/js/fact/edit.js') !!}
<script type="text/javascript">
$(function() {
    var editor = new BrandEditor();
    editor.initForm();
});
</script>
@endsection
