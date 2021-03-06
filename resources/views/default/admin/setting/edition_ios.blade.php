@extends(tpl('admin._layout.base'))

@section('title', 'App升级管理(ios)')

@section('title-block')
<i class="icon_large icon_bookmark2"></i>
<span>App升级管理(ios)</span>
@endsection

@section('breadcrumb')
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/setting">系统设置</a></li>
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/setting/edition_ios">App升级管理(ios)</a></li>
    <li class="back"><a class="btn btn_red" href="/admin/setting"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="title">
    <a href="/admin/setting/edition_ios" class="selected">&nbsp;Ios版本&nbsp;</a>
    <a href="/admin/setting/edition_and" >&nbsp;Android版本&nbsp;</a>
    <div class="clear"></div>
</div>
<div class="body_nest">
    <form method="post" class="main-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form_group row">
            <label class="col-lg-3 control_label"><span class="must">*</span>新版本号：</label>
            <div class="col-lg-6">
                <input type="text" class="form_control" name="version_number" value="{{ $result['version_number'] or '' }}">
            </div>
        </div>
        <div class="form_group row">
            <label class="col-lg-3 control_label"><span class="must">*</span>URL：</label>
            <div class="col-lg-6">
                <input type="text" class="form_control" name="update_url" value="{{ $result['update_url'] or '' }}">
            </div>
        </div>
        <div class="form_group row">
            <label class="col-lg-3 control_label"><span class="must">*</span>版本介绍：</label>
            <div class="col-lg-6">
                <textarea rows="10" class="col-lg-12" name="version_message" id="version_message" >{{ $result['version_message'] }}</textarea>
            </div>
        </div>
        <div class="form_group row">
            <div class="col-lg-3"></div>
            <div class="col-lg-1">
                <button class="btn btn_green">保存</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('foot-assets')
{!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
{!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
{!! script('/third-party/jquery-form/jquery.form.min.js') !!}

{!! script('/assets/admin/js/setting/editEdition.js') !!}

<script type="text/javascript">
$(function(){
    var editor = new SettingEditor();
    editor.initForm();
});
</script>
@endsection
