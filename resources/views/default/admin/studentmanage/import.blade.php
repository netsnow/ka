@extends('default.admin._layout.base') @section('title', '学生数据导入')

@section('title-block')
<i class="icon_large icon_calendar_alt_fill"></i>
<span>学生数据导入</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/usermanage">账号管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="#">导入数据</a></li>
<li class="back"><a class="btn btn_red" href="/admin/usermanage"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest radius">
    <div class="form_group row">
      <label class="col-lg-2 control_label">下载学生数据模版：</label>
      <div class="form_group row">
          <div class="col-lg-2">
            <a href="/data/template/templateStu.xlsx" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;下载学生数据模版&nbsp;</a>
          </div>
      </div>
    </div>
    <form method="post" class="main-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form_group row">
        <label class="col-lg-2 control_label">导入学生数据：</label>
        <div class="col-lg-2">
            <label class="uploader">
                <span><i class="icon_image white"></i>&nbsp;点击上传</span>
                <input type="file" name="studentFile" id="studentFile" multiple title="Click to add Files">
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
<label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注意：1、只能导入新学生数据，不能修改已存在学生。2、学生照片不能导入，只能手动编辑。</label>
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
