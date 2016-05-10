@extends(tpl('admin._layout.base'))

@section('title', '房间管理')

@section('title-block')
<i class="icon_large icon_shop"></i>
<span>房间管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/room">房间管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/room/fast">快速添加</a></li>
<li class="back"><a class="btn btn_red" href="javascript:void(0)" onclick="history.go(-1);"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('foot-assets')
{!! script("third-party/jquery/jquery.validate.min.js")!!}
{!! script("third-party/jquery/jquery.form.min.js")!!}
{!! script('/assets/admin/js/room/fast.js') !!}
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
			<label class="col-lg-3 control_label"><span class="must">*</span>CSV文件：</label>
			<div class="col-lg-3">
				<label class="uploader"> <span><i class="icon-image white"></i>&nbsp;点击上传CSV文件</span>
					<input type="file" name="fastbg" multiple title="Click to add Files">
				</label>
			</div>
		</div>
		<div class="form_group row">
			<div class="col-lg-3"></div>
			<div class="col-lg-1">
				<button class="btn btn_green">提交</button>
			</div>
		</div>
	</form>
            <div id="arr"></div>
</div>
@endsection

