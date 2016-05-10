@extends(tpl('admin._layout.base'))

@section('title', '房间管理')

@section('title-block')
<i class="icon_large icon_shop"></i>
<span>房间管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/room">房间管理</a></li>
@endsection

@section('body-nest')
<div class="body_nest radius">
    <div class="row table_control">
        <form method="get">
        <div class="form_inline mb10 text_right">
			<div class="form_group ml15">
	        	<label class="control_label">
	        		<span class="must"></span>房间类型：</label>
	        	<div class="control_select btn_group text_left">
	                <button data-toggle="dropdown" class="btn dropdown_toggle" type="button">
	                    <span class="txt" id="floorTxt"  >{{ $result['room_type'] or '请选择' }}</span>
	                    <span class="icon-triangle-down"></span>
	                </button>
		            <ul role="menu" class="  dropdown_menu "  id="floorSelect">
		                <li><a href="javascript:javascript:selectRoom();" name="menu" >请选择</a></li>
		                    <li class="divider"></li>
		                    <li>
		                        <a href="javascript:selectRoom('会议室');" id="会议室">会议室</a>
		                    </li>
		                        <li>
		                        <a href="javascript:selectRoom('工作间');" id="工作间">工作间</a>
		                    </li>
		                        <li>
		                        <a href="javascript:selectRoom('摄影棚');" id="摄影棚">摄影棚</a>
		                    </li>
		                        <li>
		                        <a href="javascript:selectRoom('路演厅');" id="路演厅">路演厅</a>
		                    </li>
		             </ul>
	                 <input type="hidden" name="room_type" id="room_type" value="{{ $result['room_type'] or '' }}"/>
	            </div>
	         </div>
	        
            <div class="form_group">
                <label class="control_label">房间号：</label>
            </div>
            <div class="form_group mr20">
                <input type="text" class="form_control" name="id" value="{{ Request::input('id') }}">
            </div>
            <div class="form_group">
                <label class="control_label">所属楼层：</label>
            </div>
            <div class="form_group mr20">
                <input type="text" class="form_control" name="floor" value="{{Request::input('floor') }}">
            </div> 
            <div class="form_group">
                <button class="btn btn_green"><i class="icon-search3 white"></i>&nbsp;查找&nbsp;</button>
            </div>
        </div>
        </form>
         <div class="pull_right text_right">
            <a href="/admin/room/fast" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;快速添加&nbsp;</a>
        </div>
         <div class="mr20 pull_right text_right">
            <a href="/admin/room/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加房间&nbsp;</a>
        </div>
       
    </div>

    <table id="responsive-example-table" class="table large-only">
        <tbody>
            <tr class="text-right">
                <th width="10">
                    <div class="icheckbox_red checkAll">
                        <input tabindex="13" type="checkbox" id="checkbox01">
                    </div>
                </th>
                <th width="10%">房间号</th>
                <th width="10%">最大人数</th>
                <th width="10%">房间类型</th>
                <th width="10%">房间描述</th>
                <th >图片</th>
                <th width="12%">价格(元/{{ LIMIT_ROOM_PRICE }}分钟)</th>
                <th width="12%">所在楼层</th>
              
                
                <th width="25%">操作</th>
            </tr>
            @forelse ($result['room'] as $room)
            <tr>
                <td>
                    <div class="icheckbox_red">
                        <input tabindex="13" type="checkbox" name="room_id[]" value="{{ $room->room_id }}">
                    </div>
                </td>
                <td>{{ $room->room_num }}</td>
                <td>{{ $room->room_size }}</td>
                @if($room->room_type =='workshop')
                <td>工作间</td>
                @elseif($room->room_type=='boardroom')
                <td>会议室</td>
                @elseif($room->room_type=='roadshow')
                <td>路演厅</td>
                @elseif($room->room_type=='photography')
                <td>摄影棚</td>
                @else
                <td>{{ $room->room_type }}</td>
                @endif
                <td>{{ $room->room_descript  }}</td>
               	<td class="logo" width="120"><img width="120" src="{{ $room->room_url }}"></td>
               	@if($room->room_type != 'workshop' && $room->room_price != 0)
                <td>{{ $room->room_price }}</td>
                @else
                <td>空</td>
                @endif
                @if (isset($room->floor->floor_name))
                <td>{{ $room->floor->floor_name }}</td>
                @else
                <td>未查到楼层信息</td>
                  @endif
                <td>
                	@if($room->room_type =='workshop')
                    <a href="/admin/seat?room_num={{ $room->room_num }}" class="btn btn_blue"><i class="icon-pencil white"></i> 查看工位</a>
                    @else
                    <a href="" class="btn btn_white" disabled="disabled"><i class="icon-pencil black"></i>查看工位</a>
                    @endif
                    <a href="/admin/room/edit/{{ $room->room_id }}" class="btn btn_green"><i class="icon-pencil white"></i> 编辑</a>
                    <a class="btn btn_red delete-single" data-id="{{ $room->room_id }}"><i class="icon-icon-bin white"></i> 删除</a>
                 
                </td>
            </tr>
            @empty
            <tr>
                <td colSpan="8">没有房间数据</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="table_bottom row">
        <div class="pull_left"><button class="btn btn_red" id="delete-selected"><i class="icon-icon-bin white"></i> 删除选中项</button></div>
        <form method="get" id="pagination">
        	@if (Request::has('room_type'))
            <input type="hidden" name="room_type" value="{{ Request::input('room_type') }}">
            @endif
            @if (Request::has('floor'))
            <input type="hidden" name="floor" value="{{ Request::input('floor') }}">
            @endif
            @if (Request::has('id'))
            <input type="hidden" name="id" value="{{ Request::input('id') }}">
            @endif
      
            <!-- @if (Request::has('name'))
            <input type="hidden" name="name" value="{{ Request::input('name') }}">
            @endif -->
            <input type="hidden" name="page" value="1">
            <div class="pagination pull_right">
                @if (Request::has('id')||Request::has('floor')||Request::has('room_type'))
                {!! $result['room']->appends(['room_type' => Request::input('room_type'),'id' => Request::input('id'),'floor' => Request::input('floor')])->render() !!}
                @else
                {!! $result['room']->render() !!}
                @endif
                <ul>
                    <li><span>共{{ $result['room']->lastPage() }}页({{ $result['room']->total() }}条)</span></li>
                    <li><span class="page_go_txtl">跳转到第</span></li>
                    <li><span class="page_go"><input type="text" id="page-num"></span></li>
                    <li><span class="total-page">页</span></li>
                    <li><button href="javascript:void(0);" class="gopage">GO</button></li>
                </ul>
            </div>
        </form>
    </div>
</div>
@endsection

@section('foot-assets'){!!
script("third-party/jquery/jquery.validate.min.js")!!} {!!
script("third-party/jquery/jquery.form.min.js")!!} {!!
script('/assets/admin/js/room/index.js') !!}
<script type="text/javascript">
$(function() {
    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 1) {
           $('#pagination input[name="page"]').val($('#page-num').val());
        }
    });

    var room = new RoomIndex();
   
    $(document).on('click', '#delete-selected', function() {
       
    	room.deleteSelected();
        return false;
    });

    $(document).on('click', '.delete-single', function() {
      
    	room.deleteSingle(this);
        //room.editSingle(this)
        return false;
    });
});
function selectRoom(index)
{ 
    $('#room_type').val("");
    $('#room_type').val(index);
}
</script>
@endsection
