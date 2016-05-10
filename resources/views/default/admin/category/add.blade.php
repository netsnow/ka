@extends(tpl('admin._layout.base'))

@section('title', '添加分类')

@section('title-block')
<i class="icon_large icon_list2"></i>
<span>添加分类</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/category">经营范围管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/category/add">添加分类</a></li>
<li class="back"><a class="btn btn_red" href="/admin/category"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest">
    <form method="post" class="main-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form_group row">
        <label class="col-lg-2 control_label"><span class="must">*</span>分类名称：</label>
        <div class="col-lg-6">
            <input type="text" class="form_control" name="cat_name">
        </div>
    </div>
    <div class="form_group row">
        <label class="col-lg-2 control_label">上级名称：</label>
        <div class="col-lg-4 control_select btn_group">
            <button data-toggle="d ropdown" class="btn dropdown_toggle" type="button">
                <span class="txt">{{ $result['category_info'][Request::input('parent_id')] or '请选择' }}</span><span class="icon_triangle_down"></span>
            </button>
            <ul role="menu" class="dropdown_menu col-lg-4">
                <li><a href="javascript:void(0)" data-value="0">请选择</a></li>
                <li class="divider"></li>
                {!! $result['opt_html'] !!}
            </ul>
            <input type="hidden" name="parent_id" value="{{ Request::has('parent_id') ? Request::input('parent_id') : '0'  }}">
        </div>
    </div>
    <div class="form_group row">
        <label class="col-lg-2 control_label">排序：</label>
        <div class="col-lg-6">
            <input type="text" class="form_control" name="sort_order" value="0">
        </div>
    </div>
    <div class="form_group row">
        <div class="col-lg-2"></div>
        <div class="col-lg-1">
            <button class="btn btn_green">提交</button>
        </div>
    </div>
    </form>
</div><!-- /.body_nest -->
@endsection

@section('custom-styles')
<style>
    .dropdown_menu {
        min-width: 300px;
    }
    .dropdown_menu li a {
        display: block;
        text-decoration: none!important;
        color: #666!important;
        padding: 10px 20px;
    }
    .dropdown_menu li a:hover {
        background: #f0f0f0;
    }
    .dropdown_menu li > ul {
        padding-left: 20px;
    }
</style>
@endsection

@section('foot-assets')
{!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
{!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
{!! script('/third-party/jquery-form/jquery.form.min.js') !!}

{!! script('/assets/admin/js/category/edit.js') !!}
<script type="text/javascript">
$(function() {
    var edit = new CategoryEdit();
    edit.initForm();
});
</script>
@endsection
