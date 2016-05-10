@extends('default.admin._layout.base') @section('title', '工位管理')

@section('title-block')
<i class="icon_large icon_shopping_cart"></i>
<span>工位管理</span>
@endsection @section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/seat">工位管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li>订单添加</li>
<li class="back"><a class="btn btn_red" href="/admin/seat"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a>
@endsection @section('foot-assets') {!!
script("third-party/jquery/jquery.validate.min.js")!!} {!!
script("third-party/jquery/jquery.form.min.js")!!} {!!
script('/assets/admin/js/seat/order_add.js') !!}
<script type="text/javascript">
$(function() {
    var editor = new Order_addEditor();
    editor.initForm();
    //点击工位画面上的删除按钮，删除工位信息
    $(".delbtn").click(function(){
      $(this).parents(".seatInfo").remove();
    });
});
</script>
@endsection @section('body-nest')
<div class="body_nest radius">
  <form action="/admin/seat/order_add" method="post" class="main-form">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	@forelse ($result['seat'] as $seat)

    <div class="seatInfo">
        <div class="form_group row">
          <label class="col-lg-3 control_label">工位号:</label>
          <div class="col-lg-6">
            <input type="text" class="form_control" readonly name="seat_id[]"  value="{{$seat->seat_id}}"> 
          </div>
          <div class="pull_right delbtn">
            <a href="javascript:;" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;删除&nbsp;</a>
          </div>
        </div>
        <div class="form_group row">
            <label class="col-lg-3 control_label">工位名:</label>
            <div class="col-lg-6">
                 <input type="text" class="form_control" readonly name="seat_name[]" value="{{$seat->seat_name}}" > 
            </div>
        </div>
        <div class="form_group row">
            <label class="col-lg-3 control_label">房间名:</label>
            <div class="col-lg-6">
                 <input type="text" class="form_control"  readonly name="room_name[]" value="{{$seat->room->room_num or '无'}}" > 
            </div>
        </div>
         <div class="form_group row">
            <label class="col-lg-3 control_label">楼层:</label>
            <div class="col-lg-6">
                 <input type="text" class="form_control" readonly name="floor_name[]" value="{{$seat->room->floor->floor_name or '无'}}" > 
            </div>
        </div>
        <hr>
    </div>
    	
        @empty
         <label class="col-lg-12 control_label">没有数据</label>
         @endforelse
        <div class="form_group row">
            <label class="col-lg-3 control_label">手机号:</label>
            <div class="col-lg-6">
                 <input type="text" class="form_control" name="phone"  > 
            </div>
        </div>
        <div class="form_group row">
            <label class="col-lg-3 control_label">租用时间:</label>
            <div class="col-lg-6 date" >     
              <input type="date" name="start_date" value="{{$result['startdate']}}" readonly class="pull_left form_control   datepicker" >
                  <span class="pull_left">—</span>
              <input type="date" name="end_date" value="{{$result['enddate']}}" readonly class="pull_left form_control datepicker" >  
            </div>  
        </div>
        <div class="form_group row">
             <div class="col-lg-3"></div>
            <div class="col-lg-3 control_label">
                <label class="pull_left ">租用{{ $result['lt']*30 }}天</label>
                <input type="hidden"  name="long_time"  value="{{ $result['lt'] }}">
            </div>
        </div>
        <div class="form_group row">
            <div class="col-lg-3"></div>
            <div class="col-lg-1">
                <button class="btn btn_green">提交</button>
            </div>
        </div>
        <div class="clear"></div>

   </form>  
</div>
 
@endsection

