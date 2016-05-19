@extends('default.admin._layout.base') @section('title', '教师考勤导入')

@section('title-block')
<i class="icon_large icon_list2"></i>
<span>教师考勤导入</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/importdata">导入数据</a></li>
@endsection

@section('body-nest')
<div class="body_nest radius">
    <div class="form_group row">
      <label class="col-lg-2 control_label">下载考勤模版：</label>
      <div class="form_group row">
          <div class="col-lg-2">
            <a href="/data/template/template.xlsx" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;下载考勤模版&nbsp;</a>
          </div>
      </div>
    </div>
    <form method="post" class="main-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form_group row">
        <label class="col-lg-2 control_label">导入教师考勤：</label>
        <div class="col-lg-2">
            <label class="uploader">
                <span><i class="icon_image white"></i>&nbsp;点击上传</span>
                <input type="file" name="attendanceFile" id="attendanceFile" multiple title="Click to add Files">
            </label>
        </div>
    </div>

    <div class="form_group row">
        <div class="col-lg-2"></div>
        <div class="col-lg-1">
            <button class="btn btn_green">提交</button>
        </div>
    </div>
    </form>
</div>
<label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注意：1、不能导入今日及之前的考勤。2、导入数据不能有考勤日和教师手机号重复的数据。</label>
@endsection

@section('foot-assets')
{!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
{!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
{!! script('/third-party/jquery-form/jquery.form.min.js') !!}
{!! script('/assets/admin/js/import/index.js') !!}
<script type="text/javascript">
$(function() {
    var edit = new ImportDataIndex();
    edit.initForm();
});
</script>
@endsection
