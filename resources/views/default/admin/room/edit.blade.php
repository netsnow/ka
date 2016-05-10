@extends(tpl('admin._layout.base'))

@section('title', '编辑房间')

@section('title-block')
<i class="icon_large icon_shop"></i>
<span>编辑房间</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/room">房间管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="#">编辑房间</a></li>
<li class="back"><a class="btn btn_red" href="/admin/room"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest">
    <form method="post" class="main-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form_group row">
        <label class="col-lg-3 control_label"><span class="must">*</span>房间号：</label>
       
        <div class="col-lg-6">
        @if(!isset($result['room']->room_num))
        
            <input type="text" class="form_control" name="room_num" value="{{ $result['room']->room_num or '' }}">
         @else   
          <input type="text" class="form_control" name="room_num"  readonly  value="{{ $result['room']->room_num or '' }}">
          @endif
        </div>
      
    </div><!-- /.form_group -->

  <div class="form_group row">
        <label class="col-lg-3 control_label"><span class="must">*</span>最大人数：</label>
        <div class="col-lg-6">
            <input type="text" class="form_control" name="room_size" value="{{ $result['room']->room_size or '' }}">
        </div>
    </div>

    <div class="form_group row">
        <label class="col-lg-3 control_label"><span class="must">*</span>房间类型：</label>
        <div class="col-lg-2 control_select btn_group select_room">
            <button data-toggle="dropdown" class="btn dropdown_toggle" type="button">
                <span class="txt" id="floorTxt"  >{{ $result['get_room'] or '请选择' }}</span>
                <span class="icon-triangle-down"></span>
            </button>
            <ul role="menu" class="dropdown_menu"  id="floorSelect">
                <li><a href="javascript:javascript:selectRoom();" name="menu" >请选择</a></li>
                <li class="divider"></li>
                <li>
                    <a href="javascript:selectRoom('boardroom');" id="会议室">会议室</a>
                </li>
                    <li>
                    <a href="javascript:selectRoom('workshop');" id="工作间">工作间</a>
                </li>
                    <li>
                    <a href="javascript:selectRoom('photography');" id="摄影棚">摄影棚</a>
                </li>
                    <li>
                    <a href="javascript:selectRoom('roadshow');" id="路演厅">路演厅</a>
                </li>
             
            </ul>
            <input type="hidden" name="room_type" id="room_type" value="{{ $result['room']->room_type or '' }}"/>
        </div>
         <div class="col-lg-4 control_select btn_group select_seat none">
            <label class=""><span class="must">*</span>工位类型：</label>
            <button data-toggle="dropdown" class="btn dropdown_toggle " type="button" style="width: auto;">
                <span class="txt" id="categoryTxt">{{$result['findseatname']['seat_type_name'] or '请选择'}}</span>
                <span class="icon-triangle-down"></span>
            </button>
            <ul role="menu" class="dropdown_menu search_company" style="left: 90px">
                <li><a href="javascript:javascript:selectSeat();" name="menu" >请选择</a></li>
                <li class="divider"></li>
                @foreach ($result['seat_price'] as $seat_price)
                <li>
                     <a href="javascript:selectSeat('{{$seat_price->seat_type_id}}');" id = "{{$seat_price->seat_type_name}}">{{$seat_price->seat_type_name}}</a>
                </li>
                @endforeach
            </ul>
            <input type="hidden" name="seat_type" id="seat_type" value="{{$result['findseatname']['seat_type_id']}}">
        </div> 
    </div><!-- /.form_group -->
	    <div class="form_group row" id="roomPrice">
	        <label class="col-lg-3 control_label"><span class="must">*</span>房间定价：</label>
	        <div class="col-lg-6">
	            <input type="text" class="form_control" name="room_price" value="{{ $result['room']->room_price or '0' }}">
	        </div>
	        <div class="pull_left mark">
                <span class="must">※</span>价格为每{{ LIMIT_ROOM_PRICE }}分钟的价格。
            </div>
	    </div>
        <div class="form_group row none" id="seatPrice">
            <label class="col-lg-3 control_label">工位定价：</label>
            <div class="col-lg-6">
                <input readonly type="text" class="form_control" name="" value="定价在控制台菜单中工位定价中编辑">
            </div>
            <div class="pull_left mark">
                <span class="must">※</span>价格为每30个自然日的价格。
            </div>
        </div>

	    <div class="form_group row">
	        <label class="col-lg-3 control_label">房间描述：</label>
	        <div class="col-lg-6">
	            <input type="text" class="form_control" name="room_descript" value="{{ $result['room']->room_descript or '' }}">
	        </div>
	    </div>
        <div class="form_group row">
			<label class="col-lg-3 control_label">图片：</label>
			<div class="col-lg-3">
                <label class="uploader">
                    <span><i class="icon_image white"></i>&nbsp;点击上传图片</span>
                    <input type="file" accept="image/*"  name="room_pic" multiple title="Click to add Files">
                </label>
                
           </div>
		  </div>
	     <div class="form_group row">
	      <label class="col-lg-3 control_label"><span class="must">*</span>所在楼层：</label>
	     @if(!isset($result['room']->room_num))
                <div class="col-lg-2 control_select btn_group">
                    <button data-toggle="dropdown" class="btn dropdown_toggle" type="button">
                        <span class="txt" id="floorTxt"  >请选择</span>
                        <span class="icon-triangle-down"></span>
                    </button>
                    <ul role="menu" class="  dropdown_menu "  id="floorSelect">
                        <li><a href="javascript:javascript:selectFloor();" name="menu" >请选择</a></li>
                        <li class="divider"></li>
                      @foreach ($result['floor'] as $floor)
                        <li>
                            <a href="javascript:selectFloor({{ $floor->floor_id }});" id="{{ $floor->floor_id }}">{{ $floor->floor_name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <input type="hidden" name="floor_id" id="floor_id" value=""/>
                </div>
                @else
              <div class="col-lg-6">
               <input type="text" class="form_control" readonly name="floor_id" id="floor_id" value="{{ $result['floorone']->floor_name or '' }}"/>
              </div>    
              @endif                                                     
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
