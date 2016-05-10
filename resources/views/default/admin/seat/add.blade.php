@extends(tpl('admin._layout.base'))

@section('title', '添加/编辑工位')

@section('title-block')
<i class="icon_large icon_location"></i>
<span>添加/编辑工位</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/seat">工位管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="#">添加/编辑工位</a></li>
<li class="back"><a class="btn btn_red" href="/admin/seat"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest">
    <form method="post" class="main-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form_group row">
        <label class="col-lg-3 control_label"><span class="must">*</span>工位名称：</label>
       
        <div class="col-lg-6">
        @if(!isset($result['seat']->seat_name))
        
            <input type="text" class="form_control" name="seat_name" value="{{ $result['seat']->seat_name or '' }}">
         @else   
          <input type="text" class="form_control" name="seat_name"  readonly  value="{{ $result['seat']->seat_name or '' }}">
          @endif
        </div>
      
    </div><!-- /.form_group -->

  
	     <div class="form_group row">
	      <label class="col-lg-3 control_label"><span class="must">*</span>楼层/房间：</label>
	     
                <div class="col-lg-2 control_select btn_group">
                    <button data-toggle="dropdown" class="btn dropdown_toggle" type="button">
                        <span class="txt" id="floorTxt"  >请选择</span>
                        <span class="icon-triangle-down"></span>
                    </button>
                    <ul role="menu" class="dropdown_menu "  id="floorSelect">
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
                <div class="col-lg-2 control_select btn_group" id="room">
                </div>
                                                              
            </div>    
    <div class="form_group row">
        <div class="col-lg-3"></div>
        <div class="col-lg-1">
            <button class="btn btn_green" onclick = "return validateForm()">提交</button>
        </div>
    </div><!-- /.form_group -->
    </form>
</div><!-- /.body_nest -->
@endsection

@section('foot-assets')
{!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
{!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
{!! script('/third-party/jquery-form/jquery.form.min.js') !!}

{!! script('/assets/admin/js/seat/edit.js') !!}
<script type="text/javascript">
$(function() {
    var editor = new SeatEditor();
    editor.initForm();
});
function selectFloor(index)
{
   // $('#floor_id').val(index);
    var floor_id=index;
    var data = {
            floor_id: floor_id,
            _token  : $('#csrfToken').val()
        };
    $.post('/admin/seat/getroom', data, function(response) {
    var res_arr = eval(response);
    $("#room").html("");
    if(res_arr.length == 0){
    	$("#room").html("<label class='control_label' style='color:#f00;'>该楼层没有工位</label>");
    	
    	return;
        }
        
       
    var html_tmp = "<select id='roomselect' class='btn valid'><option value='-1'>请选择</option>";
    var i = 0;
    for(i = 0; i < res_arr.length; i++)
    {
        var room_num = res_arr[i].room_num;
        var room_id = res_arr[i].room_id;
    	html_tmp +="<option value='"+room_id+"'>"+room_num+"</option>";
    }
    html_tmp += "</select><input type='hidden' name='room_id' id='room_id' value=''/>";
    $("#room").html(html_tmp);
    	   
       
    });
    
}
function validateForm()
{
	var room_select = $("#roomselect");
	var room_select_length = room_select.length;
	if(room_select_length == 0)
	{
		 $.notifyBar({html:"请选择楼层和房间", cls: 'error'});
		return false;
	}
	if(room_select.val() == -1)
	{
		 $.notifyBar({html: "请选择楼层和房间", cls: 'error'});
		return false;
	}
	$("#room_id").val(room_select.val());
	
	return true;
	
}

</script>
@endsection
