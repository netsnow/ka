@extends('default.admin._layout.base') @section('title', '订单管理')

@section('title-block')
<i class="icon_large icon_shopping_cart"></i>
<span>订单管理</span>
@endsection @section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="order">订单管理</a></li>
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
					    <label class="control_label">订单号：</label>
				    </div>
				    <div class="form_group">
					    <input type="text" name="order_sn" class="form_control wid" value="{{ $result['order_sn'] or '' }}">
				    </div>
				    <div class="form_group ml15">
	        			<label class="control_label">
	        				<span class="must"></span>订单类型：</label>
	        			<div class="control_select btn_group text_left">
	                    	<button data-toggle="dropdown" class="btn dropdown_toggle" type="button">
	                        	<span class="txt" id="floorTxt"  >{{ $result['type'] or '请选择' }}</span>
	                        	<span class="icon-triangle-down"></span>
	                    	</button>
		                    <ul role="menu" class="  dropdown_menu "  id="floorSelect">
		                        <li><a href="javascript:javascript:selectRoom();" name="menu" >请选择</a></li>
		                        <li class="divider"></li>
		                      
		                        <li>
		                            <a href="javascript:selectRoom('room');" id="会议室">房间预定</a>
		                        </li>
		                            <li>
		                            <a href="javascript:selectRoom('seat');" id="工位">工位</a>
		                        </li>
		                            <li>
		                            <a href="javascript:selectRoom('sleep');" id="睡眠舱">睡眠舱</a>
		                        </li>
		                            <li>
		                            <a href="javascript:selectRoom('bath');" id="洗浴">洗浴</a>
		                        </li>
		                        	<li>
		                            <a href="javascript:selectRoom('goods');" id="商品购买">商品购买</a>
		                        </li>
		                    </ul>
	                    	<input type="hidden" name="order_type" id="order_type" value="{{ $result['order_type'] or '' }}"/>
	                	</div>
	    			</div><!-- /.form_group -->
				  
				    <div class="form_group ml15">
					    <label class="control_label">买家手机号：</label>
				    </div>
				    <div class="form_group">
					    <input type="text" name="buyer_phone" class="form_control wid" value="{{ $result['buyer_phone'] or '' }}">
				    </div>
				    <div class="form_group ml15">
					    <label class="control_label">订单状态：</label>
				    </div>
				    <div class="form_group">
					    <div class="control_select btn_group wid">
						    <button data-toggle="dropdown" class="btn dropdown_toggle"type="button">
							    <span class="txt">{{ $result['status_type'] or '请选择' }}</span> <span class="icon_triangle-down"></span>
						    </button>
						    <ul role="menu" class="dropdown_menu left0 text_left wid">
						        <li><a href="javascript:javascript:selectRoom();" name="menu" >请选择</a></li>
		                        <li class="divider"></li>
		                        
							    <li><a href="javascript:void(0)" name="menu01" data-value="0">待付款</a></li>
							    <li><a href="javascript:void(0)" name="menu02" data-value="1">已付款</a></li>
						    </ul>
						    <input type="hidden" name="status" value="{{ $result['status'] or ''}}">
					    </div>
				    </div>
				    
				    <div class="pull_right">
					    <div class="form_group">
					    	<div class="form_group ml15">
							    <label class="control_label">下单时间：</label>
						    </div>
						    <div class="form_group">
							    <input type="date" name="start_date" class="form_control datepicker " value="{{ $result['start_date'] or ''}}">
						    </div>
						    <div class="form_group">—</div>
						    <div class="form_group mr20">
							    <input type="date" name="end_date" class="form_control datepicker " value="{{ $result['end_date'] or ''}}">
						    </div>
						    <div class="form_group">
							    <button href="#" class="btn btn_green"><i class="icon_search3 white"></i>&nbsp;查找&nbsp;</button>
						    </div>
					    </div>
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
				<th width="14%">订单号</th>
				<th width="18%">买家手机号</th>
				<th width="10%">订单类型</th>
				<th width="18%">下单时间</th>
				<th width="12%">订单总额</th>
				<th width="11%">支付方式</th>
				<th width="12%">订单状态</th>
				<th width="14%">操作</th>
			</tr>
			@forelse ($result['orders'] as $order)
			<tr>
				<td>{{ $order->order_sn }}</td>
				<td>{{ $order->buyer_phone }}</td>
				 @if($order->order_type =='room')
                <td>房间预定</td>
                @elseif($order->order_type=='seat')
                <td>工位</td>
                @elseif($order->order_type=='sleep')
                <td>睡眠舱</td>
                @elseif($order->order_type=='bath')
                <td>洗浴</td>
                @elseif($order->order_type=='goods')
                <td>商品购买</td>
                @else
                <td>{{ $order->order_type }}</td>
                @endif
				<td>{{ $order->created_at }}</td>
				<td>{{ $order->order_amount }}</td>
				<td>{{ $order->payment_name }}</td>
			    @if( $order->status==0)
				<td>待付款</td>
			    @elseif($order->status==1)
				<td>已付款</td>
			    @endif
				<td><a href="/admin/order/edit/{{$order->order_id}}" class="btn btn_blue"><i
						class="icon_pencil white"></i>&nbsp;查看&nbsp;</a>
				</td>
			</tr>
			@empty
			<tr>
				<td colSpan="9">没有订单数据</td>
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

