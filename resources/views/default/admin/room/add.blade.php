@extends(tpl('admin._layout.base'))

@section('title', '添加卡机')

@section('title-block')
<i class="icon_large icon_layers"></i>
<span>添加卡机</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/room">卡机管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="#">添加卡机</a></li>
<li class="back"><a class="btn btn_red" href="/admin/room"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest">
    <form method="post" class="main-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form_group row">
        <label class="col-lg-3 control_label"><span class="must">*</span>卡机号：</label>

        <div class="col-lg-6">
        @if(!isset($result['room']->room_num))

            <input type="text" class="form_control" name="room_num" value="{{ $result['room']->room_num or '' }}">
         @else
          <input type="text" class="form_control" name="room_num"  readonly  value="{{ $result['room']->room_num or '' }}">
          @endif
          <span class="must">卡机号必须和一卡通系统的卡机号相同，并不能重复</span>
        </div>

    </div><!-- /.form_group -->






	    <div class="form_group row">
	        <label class="col-lg-3 control_label">房间描述：</label>
	        <div class="col-lg-6">
	            <input type="text" class="form_control" name="room_descript" value="{{ $result['room']->room_descript or '' }}">
	        </div>
	    </div>


    <div class="form_group row">
        <div class="col-lg-3"></div>
        <div class="col-lg-1">
            <button class="btn btn_green">提交</button>
        </div>
    </div><!-- /.form_group -->
    </form>
</div><!-- /.body_nest -->
@endsection

@section('foot-assets')
{!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
{!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
{!! script('/third-party/jquery-form/jquery.form.min.js') !!}

{!! script('/assets/admin/js/room/edit.js') !!}
<script type="text/javascript">
$(function() {
    var editor = new RoomEditor();
    editor.initForm();

var room=$(".select_room").find(".txt").text();//初始化加载画面,取得选择房间类型

if (room=="工作间") {//判断是不是工作间
	$(".select_seat").removeClass("none");
    $("#roomPrice").addClass("none");
    $("#seatPrice").removeClass("none");
}else{
	$(".select_seat").addClass("none");
    $("#roomPrice").removeClass("none");
    $("#seatPrice").addClass("none");
}

// 选择房间类型的操作
$(".select_room ul li a").click(
    function(){
        var s=$(this).parents(".btn_group").find(".txt").text();//取得选择房间类型

        if (s=="工作间") {//判断是否是工作间,是工作间就显示工位类型的选择,并显示工位价格;不是就显示默认的选项
            $(this).parents(".select_room").siblings(".select_seat").removeClass("none");
            $(this).parents(".form_group").siblings("#roomPrice").addClass("none");
            $(this).parents(".form_group").siblings("#seatPrice").removeClass("none");
        }else{
            $(this).parents(".select_room").siblings(".select_seat").addClass("none");
            $(this).parents(".form_group").siblings("#roomPrice").removeClass("none");
            $(this).parents(".form_group").siblings("#seatPrice").addClass("none");
        }
    }
    );
});
function selectFloor(index)
{
    $('#floor_id').val(index);
}
function selectRoom(index)
{
    $('#room_type').val("")
    $('#room_type').val(index);
}
function selectSeat(index)
{
    $('#seat_type').val(index);
}
</script>
@endsection
