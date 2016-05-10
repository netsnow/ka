@extends(tpl('admin._layout.base'))

@section('title', '编辑事件')

@section('title-block')
<i class="icon_large icon_image"></i>
<span>编辑事件</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/charging_price">计费定价</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/charging_price/edit/{{ $result['charging_price']->charging_price_id }}">编辑事件</a></li>
<li class="back"><a class="btn btn_red" href="/admin/charging_price"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest">
    <form method="post" class="main-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form_group row">
        <label class="col-lg-3 control_label"><span class="must">*</span>事件名称：</label>
        <div class="col-lg-6">
            <input type="text" class="form_control" name="charging_price_name" value="{{ $result['charging_price']->charging_type_name or '' }}">
        </div>
    </div><!-- /.form_group -->

    <div class="form_group row">
        <label class="col-lg-3 control_label"><span class="must">*</span>价格：</label>
        <div class="col-lg-6">
            <input type="text" class="form_control" name="charging_price_price" value="{{ $result['charging_price']->charging_price or '' }}">
        </div>
        <div class="pull_left mark">
            <span class="must">※</span>价格为每{{ LIMIT_CHARGING_PRICE }}分钟的价格。</label>
        </div>
    </div><!-- /.form_group -->
    <div class="form_group row">
        <label class="col-lg-3 control_label">简介：</label>
        <div class="col-lg-6">
            <textarea rows="10" class="col-lg-12" name="describe" id="describe">{{$result['charging_price']->describe}}</textarea>
        </div>
    </div>
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

{!! script('/assets/admin/js/charging_price/edit.js') !!}
<script type="text/javascript">
$(function() {
    var editor = new BrandEditor();
    editor.initForm();
});
</script>
@endsection
