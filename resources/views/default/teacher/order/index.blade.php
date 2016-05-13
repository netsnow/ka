@extends('default.teacher._layout.base') @section('title', '订单管理')

@section('title-block')
<i class="icon_large icon_shopping_cart"></i>
<span>订单管理</span>
@endsection @section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="order">订单管理</a></li>
@endsection @section('foot-assets') {!!
script("third-party/jquery/jquery.validate.min.js")!!} {!!
script("third-party/jquery/jquery.form.min.js")!!} {!!
script('/assets/teacher/js/order/order_index.js') !!}
<script type="text/javascript">
$(function() {
    var order = new OrderIndex();

    $(document).on('click', 'a.gopage', function() {
        $('#pagination').submit();
    });

    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 0) {
            $('#pagination input[name="page"]').val($('#page-num').val());
        }
    });


    $(document).on('click', '#delete-selected', function() {
    	order.deleteSelected();
        return false;
    });
});

function selectRoom(index)
{
    $('#order_type').val("");
    $('#order_type').val(index);

}
</script>
@endsection @section('body-nest')
<div class="body_nest radius">
	<div class="row table_control">
		<form method="get">
			    <div class=" form_inline text_right mb10">
          <div class="form_group">
              <label class="control_label">日期：</label>
          </div>
				  <div class="form_group">
					    <input type="text" name="attendance_date" class="form_control wid" value="{{ $result['attendance_date'] or '' }}">
				  </div>
          <div class="form_group">
              <div class="control_select btn_group wid">
                <button data-toggle="dropdown" class="btn dropdown_toggle"type="button">
                  <span class="txt">{{ $result['status_type'] or '请选择' }}</span> <span class="icon_triangle-down"></span>
                </button>
                <ul role="menu" class="dropdown_menu left0 text_left wid">
                    <li><a href="javascript:javascript:selectRoom();" name="menu" >请选择</a></li>
                            <li class="divider"></li>

                  <li><a href="javascript:void(0)" name="menu01" data-value="0">未出勤</a></li>
                  <li><a href="javascript:void(0)" name="menu02" data-value="1">已出勤</a></li>
                  <li><a href="javascript:void(0)" name="menu03" data-value="2">迟到</a></li>
                  <li><a href="javascript:void(0)" name="menu03" data-value="99">未记入</a></li>
                </ul>
                <input type="hidden" name="status" value="{{ $result['status'] or ''}}">
              </div>
          </div>
          <div class="form_group">
            <button href="#" class="btn btn_green"><i class="icon_search3 white"></i>&nbsp;查找&nbsp;</button>
          </div>
          </div>
	    </form>
	</div>
    @if (isset($result['error']))
    {{ $result['error'] }}
    @else
	<table id="responsive-example-table" class="table large-only">
		<tbody>
			<tr class="text-right">
				<th width="14%">日期</th>
				<th width="18%">打卡时间</th>
				<th width="12%">出勤状态</th>
			</tr>
			@forelse ($result['orders'] as $order)
			<tr>
				<td>{{ $order->attendance_date }}</td>
				<td>{{ $order->check_time }}</td>
			    @if( $order->status==0)
				<td>未出勤</td>
			    @elseif($order->status==1)
				<td>已出勤</td>
          @elseif($order->status==2)
        <td>迟到</td>
        @elseif($order->status==99)
      <td>未记入</td>
			    @endif
			</tr>
			@empty
			<tr>
				<td colSpan="9">没有数据</td>
			</tr>
			@endforelse
		</tbody>
	</table>
	<div class="table_bottom row">
		<form method="get" id="pagination">

		        @if (Request::has('status'))
            <input type="hidden" name="status" value="{{ Request::input('status') }}">
            @endif
            @if (Request::has('order_type'))
            <input type="hidden" name="order_type" value="{{ Request::input('order_type') }}">
            @endif
            @if (Request::has('buyer_phone'))
            <input type="hidden" name="buyer_phone" value="{{ Request::input('buyer_phone') }}">
            @endif
            @if (Request::has('start_date'))
            <input type="hidden" name="start_date" value="{{ Request::input('start_date') }}">
            @endif
            @if (Request::has('end_date'))
            <input type="hidden" name="end_date" value="{{ Request::input('end_date') }}">
            @endif

			@if (Request::has('name'))
			<input type="hidden" name="name"value="{{ Request::input('name') }}">
			@endif
			<input type="hidden" name="page" value="{{ Request::input('page') or 1 }}">
			<div class="pagination pull_right">
			    @if (Request::has('status')||Request::has('order_type')||Request::has('buyer_phone')||Request::has('start_date')||Request::has('end_date'))
                {!! $result['orders']->appends(['status' => Request::input('status'),'order_type' => Request::input('order_type'),'buyer_phone' => Request::input('buyer_phone'),'start_date' => Request::input('start_date'),'end_date' => Request::input('end_date')])->render() !!}
                @else
                {!! $result['orders']->render() !!}
                @endif
				<ul>
					<li><span>共{{ $result['orders']->lastPage() }}页({{
							$result['orders']->total() }}条)</span></li>
					<li><span class="page_go_txtl">跳转到第</span></li>
					<li><span class="page_go"><input type="text" id="page-num"> </span></li>
					<li><span class="page_go_txtr">页</span></li>
					<li><button href="javascript:void(0);" class="gopage">GO</button></li>
				</ul>
			</div>
		</form>
	</div>
	<input type="hidden" name="total-page" value="{{ $result['orders']->lastPage() }}">
	@endif
</div>
@stop

@section('hidden-items')
<input type="hidden" name="_token" value="{{ csrf_token() }}">
@endsection
