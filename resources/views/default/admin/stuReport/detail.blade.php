@extends('default.admin._layout.base') @section('title', '学生考勤详情')

@section('title-block')
<i class="icon_large icon_pie_chart"></i>
<span>学生考勤详情</span>
@endsection @section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/stureport">学生考勤统计</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/stureport/detail">学生考勤详情</a></li>
<li class="back"><a class="btn btn_red" href="/admin/stureport"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection @section('foot-assets') {!!
script("third-party/jquery/jquery.validate.min.js")!!} {!!
script("third-party/jquery/jquery.form.min.js")!!} {!!
script('/assets/admin/js/order/order_index.js') !!}
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
					    <label class="control_label">考勤日：</label>
				    </div>
            <div class="form_group">
  					    <input type="text" name="attendance_date" class="form_control wid" value="{{ $result['attendance_date'] or '' }}">
  				  </div>
						<div class="form_group">
							    <button href="#" class="btn btn_green"><i class="icon_search3 white"></i>&nbsp;查找&nbsp;</button>
						</div>
					</div>
	    </form>
    </div>
	</div>
    @if (isset($result['error']))
    {{ $result['error'] }}
    @else
	<table id="responsive-example-table" class="table large-only">
		<tbody>
			<tr class="text-right">
				<th width="14%">考勤日</th>
				<th width="18%">打卡时间</th>
			</tr>
			@forelse ($result['orders'] as $order)
			<tr>
				<td>{{ floor($order->checkin_datetime/10000) }}</td>
				<td>{{ $order->checkin_datetime }}</td>
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
