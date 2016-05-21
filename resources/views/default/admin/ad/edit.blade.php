@extends(tpl('admin._layout.base'))

@section('title', '编辑广告')

@section('title-block')
<i class="icon_large icon_display"></i>
<span>编辑广告</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/ad">广告管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="">编辑广告</a></li>
<li class="back"><a class="btn btn_red" href="javascript:void(0)" onclick="history.go(-1);"><i class="icon-arrow-bold-left"></i>&nbsp;返回</a></li>
@endsection

@section('foot-assets')
{!! script("third-party/jquery/jquery.validate.min.js")!!}
{!! script("third-party/jquery/jquery.form.min.js")!!}
{!! script('/assets/admin/js/slide/ad_edit.js') !!}
<script type="text/javascript">
var returnUrl = document.referrer;
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
		<!-- <div class="form_group row">
			<label class="col-lg-3 control_label"><span class="must">*</span>位置：</label>
			<div class="col-lg-6 control_select btn_group">
				<button data-toggle="dropdown" class="btn dropdown_toggle disabled" type="button">
					<span class="txt">{{ $result['ad']->side_path or '' }}</span> <span class="icon-triangle-down"></span>
				</button>
				<ul role="menu" name="side_id" class="dropdown_menu Pleft15">
					<li><a href="javascript:void(0)" name="menu01" value="特卖">首页</a></li>
					<li><a href="javascript:void(0)" name="menu02" value="特卖">特卖</a></li>
					<li><a href="javascript:void(0)" name="menu03" value="促销">促销</a></li>
					<li><a href="javascript:void(0)" name="menu04" value="女性">女性</a></li>
				</ul>
				<input type="hidden" name="side_path" value="{{ $result['ad']->side_path}}">
			</div>
		</div> -->
		<!-- <div class="form_group row">
			<label class="col-lg-3 control_label"><span class="must">*</span>房间号：</label>
			@if(isset( $result['ad']->room->room_num))
			<div class="col-lg-6">
				<input type="text" name="room_num"  readonly value="{{ $result['ad']->room->room_num }}" class="form_control">
			</div>
			@else
			<div class="col-lg-6">
				<input type="text" name="room_num" readonly value="未查到" class="form_control">
			</div>
			@endif

		</div> -->

		<div class="form_group row">
			<label class="col-lg-3 control_label"><span class="must">*</span>图片：</label>
			<div class="col-lg-3">
            <label class="uploader">
                <span><i class="icon_image white"></i>&nbsp;点击上传图片</span>
                <input type="file" name="ad_pic" accept="image/*"  multiple title="Click to add Files">
            </label>
            <!-- <div class="img_view"><a class="focus"><img src="{{ $result['ad']->ad_pic }}"></a></div> -->
        </div>
		</div>
		<!-- <div class="form_group row">
			<label class="col-lg-3 control_label"><span class="must">*</span>链接：</label>
			<div class="col-lg-6">
				<input type="text" name="ad_link" value="{{ $result['ad']->ad_link or '' }}" class="form_control">
			</div>
		</div> -->
		<div class="form_group row">
			<label class="col-lg-3 control_label">排序：</label>
			<div class="col-lg-6">
				<input type="text" name="sort_order" value="{{ $result['ad']->sort_order or '0' }}" class="form_control">
			</div>
		</div>
		<div class="form_group row">
			<label class="col-lg-3 control_label">是否显示：</label>
			<ul class="form radioGroup col-lg-6 clearfix mt5">
				<li class="clearfix">

						@if($result['ad']->is_show > 0)
							<div class="iradio_red  checked">
								<input tabindex="13" type="radio" id="radio01" value="1" name="is_show" checked>
							</div>
						@else
							<div class="iradio_red">
								<input tabindex="13" type="radio" id="radio01" value="1" name="is_show">
							</div>
						@endif
					 <label for="radio01" class="">显示</label>
				</li>
				<li class="clearfix">
						@if($result['ad']->is_show == 0)
							<div class="iradio_red   checked">
								<input tabindex="13" type="radio" id="radio02"  value="0" name="is_show" checked>
							</div>
						@else
							<div class="iradio_red">
								<input tabindex="13" type="radio" id="radio02"  value="0" name="is_show">
							</div>
						@endif

					 <label for="radio02" class="">不显示</label>
				</li>
			</ul>
		</div>
		<div class="form_group row">
			<div class="col-lg-3"></div>
			<div class="col-lg-1">
				<button class="btn btn_green">提交</button>
			</div>
			<!-- <div>
				<button type="reset" class="btn btn_default">重置</button>
			</div> -->
		</div>
	</form>
</div>
@endsection
