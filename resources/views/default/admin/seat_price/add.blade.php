@extends(tpl('admin._layout.base'))

@section('title', '添加工位类型')

@section('title-block')
<i class="icon_large icon_image"></i>
<span>添加工位类型</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/seat_price">工位定价</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/seat_price/add">添加工位类型</a></li>
<li class="back"><a class="btn btn_red" href="/admin/seat_price"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest">
    <form method="post" class="main-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form_group row">
        <label class="col-lg-3 control_label"><span class="must">*</span>工位类型：</label>
        <div class="col-lg-6">
            <input type="text" class="form_control" name="seat_price_name" value="{{ $result['seat_price']->seat_price_name or '' }}">
        </div>
    </div><!-- /.form_group -->

    <div class="form_group row">
        <label class="col-lg-3 control_label"><span class="must">*</span>价格：</label>
        <div class="col-lg-6">
            <input type="text" class="form_control" name="seat_price_price" value="{{ $result['seat_price']->seat_price_price or '0' }}">
        </div>
        <div class="pull_left mark">
            <span class="must">※</span>价格为每30个自然日的价格。</label>
        </div>
    </div><!-- /.form_group -->

    <div class="form_group row">
        <div class="col-lg-3"></div>
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

{!! script('/assets/admin/js/seat_price/edit.js') !!}
<script type="text/javascript">
$(function() {
    var editor = new BrandEditor();
    editor.initForm();
});
</script>
@endsection
