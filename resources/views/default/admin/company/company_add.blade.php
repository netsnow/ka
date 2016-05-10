@extends(tpl('admin._layout.base'))

@section('title', '账号管理')

@section('title-block')
<i class="icon_large icon_user2"></i>
<span>账号管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/usermanage">账号管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/company">教师账号</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/company/add">添加班级</a></li>
<li class="back"><a class="btn btn_red" href="javascript:void(0)" onclick="history.go(-1);"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('foot-assets')
{!! script("third-party/jquery/jquery.validate.min.js")!!}
{!! script("third-party/jquery/jquery.form.min.js")!!}
{!! script('/assets/admin/js/company/company_edit.js') !!}
<script type="text/javascript">
var returnUrl;
$(function() {
    var editor = new AdEditor();
    editor.initForm();
});
</script>
@endsection

@section('body-nest')
<div class="body_nest">
	<form method="post" class="main-form">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form_group row">
			<label class="col-lg-3 control_label"><span class="must">*</span>班级名称：</label>
			<div class="col-lg-6">
				<input type="text" name="company_name" class="form_control">
			</div>
		</div>
		<div class="form_group row">
			<label class="col-lg-3 control_label">简介：</label>
			<div class="col-lg-6">
			       <textarea rows="5" class="col-lg-12" name="company_information"></textarea>
			</div>
		</div>
		<div class="form_group row">
			<div class="col-lg-3"></div>
			<div class="col-lg-1">
				<button  class="btn btn_green">提交</button>
			</div>
			<div>
				<button type="reset" id="reset" class="btn btn_default">重置</button>
			</div>
		</div>
	</form>
</div>
@endsection
