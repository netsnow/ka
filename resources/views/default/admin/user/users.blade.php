
@extends(tpl('admin._layout.base')) 
@section('title', '个人设置')

@section('foot-assets') 
{!! script("third-party/jquery/jquery.validate.min.js")!!}
{!! script("third-party/jquery/jquery.form.min.js")!!}
{!! script("assets/admin/js/userSetting.js")!!}
<!-- Cdn fail refers to local library -->
<script type="text/javascript">
$(function() {
    var user = new UserIndex();
    user.formInit();
});
</script>
@endsection

@section('title-block')
<i class="icon_large icon_icon_user"></i> <span>个人设置</span> 
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i> </li>
<li><a href="/admin/user/setting">个人设置</a> </li>
@endsection

@section('body-nest')
<form action="update" method='post'>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="user_name" value="{{Auth::user()->user_name}}">
	<div class="nest">
	<div class="body_nest">
		<div class="form_group row">
			<label class="col-lg-3 control_label">用户名：</label>
			<div class="col-lg-6">
				<input type="text" name="user_name" value="{{Auth::user()->user_name}}" class="form_control">
			</div>
		</div>
		<div class="form_group row">
			<label class="col-lg-3 control_label"><span class="must">*</span>旧密码：</label>
			<div class="col-lg-6">
				<input type="password" name="password" class="form_control">
			</div>
		</div>
		<div class="form_group row">
			<label class="col-lg-3 control_label"><span class="must">*</span>新密码：</label>
			<div class="col-lg-6">
				<input type="password" name="new_password" class="form_control">
			</div>
		</div>
		<div class="form_group row">
			<label class="col-lg-3 control_label"><span class="must">*</span>确认密码：</label>
			<div class="col-lg-6">
				<input type="password" name="new_password_check" class="form_control">
			</div>
		</div>
		<div class="form_group row">
			<label class="col-lg-3"></label>
			<div class="col-lg-3">
				<button type="submit" class="btn btn_green">确定</button>
				<button type="reset" class="btn btn_red">重置</button>
			</div>
		</div>
	</div>
</div>
</form>
@endsection 
