@extends(tpl('admin._layout.base'))

@section('title', '添加广告')

@section('title-block')
<i class="icon_large icon_display"></i>
<span>添加广告</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/ad">广告管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/slide/add">添加广告</a></li>
<li class="back"><a class="btn btn_red" href="javascript:void(0)" onclick="history.go(-1);"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('foot-assets')
{!! script("third-party/jquery/jquery.validate.min.js")!!}
{!! script("third-party/jquery/jquery.form.min.js")!!}
{!! script('/assets/admin/js/slide/ad_add.js') !!}
<script type="text/javascript">
var returnUrl;
$(function() {
    var editor = new AdEditor();
    editor.initForm();
});
function selectFloor(index)
{
    $('#room').val(index);
}
</script>
@endsection

@section('body-nest')
<div class="body_nest">
	<form method="post" class="main-form">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<!-- <div class="form_group row">
			<label class="col-lg-3 control_label"><span class="must">*</span>位置：</label>
			<div class="col-lg-6 control_select btn_group">
				<button data-toggle="dropdown" class="btn dropdown_toggle disabled" type="button">
					<span class="txt">首页</span> <span class="icon-triangle-down"></span>
				</button>
				<ul role="menu" name="side_id" class="dropdown_menu Pleft15">
					<li><a href="javascript:void(0)" name="menu01" data-value="首页">首页</a></li>
					<li><a href="javascript:void(0)" name="menu02" data-value="特卖">特卖</a></li>
					<li><a href="javascript:void(0)" name="menu03" data-value="促销">促销</a></li>
					<li><a href="javascript:void(0)" name="menu04" data-value="女性">女性</a></li>
				</ul>
				<input type="hidden" name="side_path" value="首页">
			</div>
		</div> -->

		 <!-- <div class="form_group row">
            <label class="col-lg-3 control_label text_right"><span class="must">*</span>房间号：</label>
        <div class="control_select btn_group search_list col-lg-6">
            <button data-toggle="dropdown" class="btn dropdown_toggle " type="button">
                <span class="txt" id="categoryTxt">请选择</span>
                <span class="icon-triangle-down"></span>
            </button>
            <ul role="menu" class="dropdown_menu search_content" >
                <input type="text" class="form_control">
                <li class="divider"></li>
                @foreach ($result['room'] as $room)
                <li>
                     <a href="javascript:selectFloor('{{$room->room_id}}');" >{{$room->room_num}}</a>
                </li>
                @endforeach
            </ul>
            <input type="hidden" name="room" id="room" value="">

        </div>
        </div> -->

		<div class="form_group row">
			<label class="col-lg-3 control_label"><span class="must">*</span>图片：</label>
			<div class="col-lg-3">
				<label class="uploader"> <span><i class="icon-image white"></i>&nbsp;点击上传图片</span>
					<input type="file" accept="image/*"  name="ad_pic" multiple title="Click to add Files">
				</label>
			</div>
		</div>
		<!-- <div class="form_group row">
			<label class="col-lg-3 control_label"><span class="must">*</span>链接：</label>
			<div class="col-lg-6">
				<input type="text" name="ad_link" class="form_control">
			</div>
		</div> -->
		<div class="form_group row">
			<label class="col-lg-3 control_label">排序：</label>
			<div class="col-lg-6">
				<input type="text" name="sort_order" value="0" class="form_control">
			</div>
		</div>
		<div class="form_group row">
			<label class="col-lg-3 control_label">是否显示：</label>
			<ul class="form radioGroup col-lg-6 clearfix mt5">
				<li class="clearfix">
					<div class="iradio_red  checked">
						<input tabindex="13" type="radio" id="radio01" value="1" name="is_show"
							checked>
					</div> <label for="radio01" class="">显示</label>
				</li>
				<li class="clearfix">
					<div class="iradio_red">
						<input tabindex="13" type="radio" id="radio02"  value="0" name="is_show">
					</div> <label for="radio01" class="">不显示</label>
				</li>
			</ul>
		</div>
		<div class="form_group row">
			<div class="col-lg-3"></div>
			<div class="col-lg-1">
				<button class="btn btn_green">提交</button>
			</div>
<!-- 			<div>
				<button type="reset" id="reset" class="btn btn_default">重置</button>
			</div> -->
		</div>
	</form>
</div>
@endsection
