@extends(tpl('admin._layout.base'))

@section('title', '工位管理')

@section('title-block')
<i class="icon_large icon_location"></i>
<span>工位管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/seat">工位管理</a></li>
@endsection

@section('body-nest')
<div class="body_nest radius">
    <div class="row table_control">
        <form method="get">
        <div class="form_inline mb10 text_right">
             <div class="form_group">
                <label class="control_label">房间名称：</label>
             </div>
             <div class="form_group mr20">
                <input type="text" class="form_control" name="room_num" value="{{ Request::input('room_num') }}">
             </div>
              <div class="form_group">
                <label class="control_label">预租起始时间：</label>
            </div>
            <div class="form_group mr20">
               <input type="date" class="form_control" name="start_time" value="{{ Request::input('start_time') }}">
            </div>
            <div class="form_group">
              <label class="control_label">租赁时长:</label>
            </div>
             <div class="form_group mr20">
                <input type="number" class="form_control" name="long_time"  min="1" max="36" value="{{ Request::input('long_time') }}">
                <label class="control_label">月（30天）</label>
            </div>
             <div class="form_group ">
                <button class="btn btn_green search_seat"><i class="icon-search3 white"></i>&nbsp;查找&nbsp;</button>
             </div>
       </div>
       </form>
       <div class="pull_right text_righ">
            <a href="/admin/seat/fast" class="btn btn_green "><i class="icon-plus2 white"></i>&nbsp;快速添加&nbsp;</a>
       </div>
       <div class=" pull_right text_righ mr20">
            <a href="/admin/seat/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加工位&nbsp;</a>
       </div>
    </div>

<form action="/admin/seat/lease" method="post">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($result['message']))
<div class="alert alert_danger text_center">
    <strong>错误！</strong>&nbsp;&nbsp;
    {{$result['message']}}
</div>
	
	@else
    <table id="responsive-example-table" class="table large-only">
        <tbody>
            <tr class="text-right">
                <th width="10">
                    <div class="icheckbox_red checkAll">
                        <input tabindex="13" type="checkbox" id="checkbox01">
                    </div>
                </th>
                <th width="15%">工位</th>
                <th width="20%">房间号</th>
                <!-- <th width="15%">工位类型</th> -->
                <th>楼层</th>
                <th width="25%">价格(元/30天)</th>
                
              
                <th width="20%">操作</th>
            </tr>
            @forelse ($result['seat'] as $seat)
            <tr>
                <td>
                    <div class="icheckbox_red">
                        
                        <input tabindex="13" type="checkbox" name="seat_id[]" value="{{ $seat->seat_id }}">
                    </div>
                </td>
                <td>{{ $seat->seat_name }}</td>
               
                @if (isset($seat->room->room_num ))
                <td>{{ $seat->room->room_num }}</td>
                @else
                <td>没有房间</td>
                @endif
                
                @if (isset( $seat->room->floor->floor_name ))
                <td>{{ $seat->room->floor->floor_name }}</td>
                @else
                <td>没有楼层</td>
                @endif
                
                <!-- @if (isset( $seat->room->Seat_price->seat_type_name ))
                <td>{{ $seat->room->Seat_price->seat_type_name }}</td>
                @else
                <td>没有工位类型</td>
                @endif -->
                
                @if (isset( $seat->room->Seat_price->seat_price ))
                <td>{{ $seat->room->Seat_price->seat_price }}</td>
                @else
                <td>没有工位价格</td>
                @endif
                
                   
                  
                <td>
                    <a href="/admin/seat/edit/{{ $seat->seat_id }}" class="btn btn_blue"><i class="icon-pencil white"></i> 编辑</a>
                    <a class="btn btn_red delete-single" data-id="{{ $seat->seat_id }}"><i class="icon-icon-bin white"></i> 删除</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colSpan="5">未查到信息</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <input type="hidden"  name="lease_time"  value="{{ Request::input('long_time') }}">
    <input type="hidden"  name="start_date"  value="{{ Request::input('start_time') }}">
    <div class="table_bottom pull_left mb15">
        <button class="btn mr20 rent" id="add_order" disabled="disabled"><i class="white"></i>&nbsp;出租工位&nbsp;</button>
        <button class="btn btn_red" id="delete-selected" ><i class="icon-icon-bin white"></i> 删除选中项</button>
    </div>
    
  </form>

    <div class="table_bottom row pull_right">
        <form method="get" id="pagination">
            @if (Request::has('room_num'))
            <input type="hidden" name="room_num" value="{{ Request::input('room_num') }}">
            @endif
            @if (Request::has('start_time'))
            <input type="hidden" name="start_time" value="{{ Request::input('start_time') }}">
            @endif
            @if (Request::has('end_time'))
            <input type="hidden" name="end_time" value="{{ Request::input('end_time') }}">
            @endif
            
            @if (Request::has('name'))
            <input type="hidden" name="name" value="{{ Request::input('name') }}">
            @endif
            <input type="hidden" name="page" value="1">
            <div class="pagination pull_right">
                @if (Request::has('room_num')||Request::has('start_time')||Request::has('end_time')||Request::has('long_time'))
                {!! $result['seat']->appends(['room_num' => Request::input('room_num'),'start_time' => Request::input('start_time'),'end_time' => Request::input('end_time'),'long_time' => Request::input('long_time')])->render() !!}
                @else
                {!! $result['seat']->render() !!}
                @endif
                <ul>
                    <li><span>共{{ $result['seat']->lastPage() }}页({{ $result['seat']->total() }}条)</span></li>
                    <li><span class="page_go_txtl">跳转到第</span></li>
                    <li><span class="page_go"><input type="text" id="page-num"></span></li>
                    <li><span class="total-page">页</span></li>
                    <li><button href="javascript:void(0);" class="gopage">GO</button></li>
                </ul>
            </div>
        </form>
        @endif
    </div>
    <div class="clear"></div>       
</div>
@endsection

@section('foot-assets')
{!! script('/assets/admin/js/seat/index.js') !!}
<script type="text/javascript">
function date(){//出租工位按钮控制函数
    var month=$(".form_group input[type=date]").val();
    var day=$(".form_group input[type=number]").val();
    
    if (month!=0&&day>0) {
      $(".rent").removeAttr("disabled").addClass("btn_green").removeClass("btn[disabled]");
    }else{
      $(".rent").attr("disabled","disabled").attr("title","请输入预租起始时间").removeClass("btn_green").addClass("btn[disabled]");
    }
}
$(function() {
  date();//加载时验证
    $(".search_seat").click(function(){
        date();//查找时验证
    });

    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 1) {
           $('#pagination input[name="page"]').val($('#page-num').val());
        }
    });

    var seat = new SeatIndex();

    $(document).on('click', '#delete-selected', function() {
        seat.deleteSelected();
        return false;
    });

    $(document).on('click', '#add_order', function() {
        seat.addorderSelected();
        return false;
    });
    
    $(document).on('click', '.delete-single', function() {
        seat.deleteSingle(this);
        return false;
    });

});
</script>
@endsection
