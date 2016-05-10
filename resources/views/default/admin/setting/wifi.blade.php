@extends(tpl('admin._layout.base'))

@section('title', 'WiFi密码管理')

@section('title-block')
<i class="icon_large icon_bookmark2"></i>
<span>WiFi密码管理</span>
@endsection

@section('breadcrumb')
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/setting">系统设置</a></li>
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/setting/wifi">WiFi密码管理</a></li>
    <li class="back"><a class="btn btn_red" href="/admin/setting"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest">
    <form method="post" class="main-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form_group row">
            <label class="col-lg-3 control_label"><span class="must">*</span>WiFi密码：</label>
            <div class="col-lg-6">
                <input type="text" class="form_control" name="value" value="{{ $result['setting']->value or '' }}">
            </div>
            <div class="pull_left mark col-lg-3">
            <span class="must">※</span>密码只能为字母(大小写)和数字组成</label>
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

{!! script('/assets/admin/js/setting/editWifi.js') !!}

<script type="text/javascript">
$(function(){
    var editor = new SettingEditor();
    editor.initForm();
});
</script>
@endsection
