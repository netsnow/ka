@extends(tpl('admin._layout.base')) @section('title', '绑定卡机')

@section('title-block')
<i
	class="icon_large icon_bookmark2"></i>
<span>绑定卡机</span>
@endsection @section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/charging_price">计费定价</a></li>
<li class="back"><a class="btn btn_red" href="/admin/charging_price"><i
		class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection @section('body-nest')


<div class="body_nest">
	<div class="text_right">
		<button class="add btn btn_green mb15">添加绑定新卡机</button>
	</div>
	<form method="post" class="main-form">

		<div class="form_list ml100">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form_group row">
				<label class="col-lg-3"><strong>已绑定卡机</strong> </label>
			</div>
			@foreach($result['equpt'] as $item) 
			<label class="col-lg-3 mb10">
				<input type="text" class="form_control" name="weather_name[]"
				value="{{ $item['equpt_id'] or '' }}">
			</label>
			<div class="col-lg-6 none">
				<input type="hidden" class="form_control" name="weather_remind[]"
					value="{{ $item['id'] or '' }}">
			</div>
			@endforeach
			<div class="clear">  </div>
		</div>
		<div class="clear">  </div>
		<div class="ml100">
			<input type="submit" class="btn btn_green ml15" value="保存">
		</div>
	</form>
</div>
@endsection @section('foot-assets') {!!
script('/third-party/jquery-validate/jquery.validate.min.js') !!} {!!
script('/third-party/jquery-validate/additional-methods.min.js') !!} {!!
script('/third-party/jquery-form/jquery.form.min.js') !!} {!!
script('/assets/admin/js/bund/editWeather.js') !!}

<script type="text/javascript">
$(function(){
    var editor = new SettingEditor();
    editor.initForm();

    var s="<label class='col-lg-3 mb10'><input type='text' class='form_control' name='weather_name[]' value=''></label><div class='col-lg-6 none'><input type='text' class='form_control' name='weather_remind[]' value=''>"+"</div>";
    $(".add").click(function(){
        $(".form_list").append(s); 
    });
        
});
</script>
@endsection
