@extends(tpl('admin._layout.base'))

@section('title', '查看订单')

@section('title-block')
<i class="icon_large icon_bookmark2"></i>
<span>查看订单</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/order">订单管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/order/edit/{{$result['order']->order_id}}">查看订单</a></li>
<li class="back"><a class="btn btn_red" href="/admin/order"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="content_wrap">            
    <div class="nest">
        <div class="body_nest radius">
            <div class="form_group row  borderbtm">
                <div class="form_group row">
                     <span class=" control_label ml10"><strong>订单状态:</strong></span>
				</div>
            	<div class="form_group row col-lg-offset-1">
                    <div class="mb15">
                        <span class=" pull_left control_label ">订单号:</span>
                         <span class="col-lg-8 mt5">{{$result['order']->order_sn}}</span>    
                         <div class="clear"></div>  
                     </div>
                     <form method="post" class="main-form">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     @if($result['order']->status==0)
                         <ul class="form radioGroup" >
                            <li class="clearfix">
                                <span class="control_label">订单状态:</span>
                            </li>
                             <li class="clearfix">     		
                                 <div class="iradio_red checked mr10" >
                                     <input tabindex="13" type="radio" id="radio01" name="status" value="0" checked ;>
                                 </div>
                                 <label for="radio01" class="">待付款</label>
                             </li>
                             <li class="clearfix">
                                 <div class="iradio_red mr10">
                                     <input tabindex="14" type="radio" id="radio02" name="status"  value="1" ;>
                                 </div>
                                 <label for="radio02" class="">已付款</label>
                             </li>
                             <li><button class="btn btn_blue mbtm5" >提交</button></li>
                         </ul>
                      @elseif($result['order']->status==1)
                         <ul class="form radioGroup" >
                            <li class="clearfix">
                                <span class="control_label">订单状态:</span>
                            </li>
                             <li class="clearfix">     		
                                 <div class="iradio_red mr10" >
                                     <input tabindex="13" type="radio" id="radio01" name="status" value="0" ;>
                                 </div>
                                 <label for="radio01" class="">待付款</label>
                             </li>
                             <li class="clearfix">
                                 <div class="iradio_red checked mr10">
                                     <input tabindex="14" type="radio" id="radio02" name="status"  value="1" checked ;>
                                 </div>
                                 <label for="radio02" class="">已付款</label>
                             </li>
                             <li><button class="btn btn_blue mbtm5" >提交</button></li>
                         </ul>
                      @endif
                      <div class="clear"></div>
                         <div class="form_group row">
                             <label class="pull_left control_label"><span class="must">*</span>订单金额:</label>
                             <div class="col-lg-3">
                        		 <input type="text" class="form_control" name="order_amount"  value="{{$result['order']->order_amount}}"> 
                        	 </div>
                         </div> 
                     </form>
                 </div>
             </div>
             <div class="form_group row  borderbtm">
                 <div class="form_group row">
                     <span class=" control_label ml10"><strong>订单信息:</strong></span>
				 </div>
            	 <div class="form_group row col-lg-offset-1">
                     <span class="pull_left control_label">买家手机号:</span>
                     <span class="col-lg-5 mt5">{{$result['order']->buyer_phone}}</span> 
                 </div>      
            	 <div class="form_group row col-lg-offset-1">
                     <span class="pull_left control_label">支付方式:</span>
                     <span class="col-lg-3 mt5 ">{{$result['order']->payment_name}}</span> 
                     <span class="col-lg-3  control_label text_right">下单时间:</span>
                     <span class="col-lg-4 mt5  pl0">{{$result['order']->created_at}}</span> 
                 </div> 
             </div>   
             <div class="form_group row">
                 <span class="control_label ml10"><strong>订单详细信息:</strong></span>
			 </div>
             <table id="responsive-example-table" class="table large-only">
                 <tbody>
                 @if($result['order']->order_type == 'room' || $result['order']->order_type == 'seat')
                     <tr class="text-right">
                         <th width="20%">订单类型</th>
                         <th width="20%">房间</th>
                         <th width="30%">开始时间</th>
                         <th width="30%">结束时间</th>
                     </tr>
                  @forelse($result['information'] as $information)
                     <tr>
                         @if($result['order']->order_type == 'room')
                     	 <td>房间预定</td>
                     	 @elseif($result['order']->order_type == 'seat')
                     	 <td>工位</td>
                     	 @else
                         <td>{{$result['order']->order_type}}</td>
                         @endif
                         <td>{{$information->room_num}}</td>
                         <td>{{$information->start_time}}</td>
                         @if($information->end_time == 0)
                         <td>空</td>
                         @else
                         <td>{{$information->end_time}}</td>
                         @endif
                     </tr>
                  @empty
                     <tr>
                         <td colSpan="6">没有数据</td>
                     </tr>
                  @endforelse
                @else
                         <tr class="text-right">
                         <th width="20%">订单类型</th>
                         <th width="30%">开始时间</th>
                         <th width="30%">结束时间</th>
                     </tr>
                  @forelse($result['information'] as $information)
                     <tr>
                     	 @if($result['order']->order_type == 'sleep')
                     	 <td>睡眠舱</td>
                     	 @elseif($result['order']->order_type == 'bath')
                     	 <td>洗浴</td>
                     	 @elseif($result['order']->order_type == 'goods')
                     	 <td>商品购买</td>
                     	 @else
                         <td>{{$result['order']->order_type}}</td>
                         @endif
                         @if($information->start_time == 0)
                         <td>空</td>
                         @else
                         <td>{{$information->start_time}}</td>
                         @endif
                         @if($information->end_time == 0)
                         <td>空</td>
                         @else
                         <td>{{$information->end_time}}</td>
                         @endif
                     </tr>
                  @empty
                     <tr>
                         <td colSpan="6">没有数据</td>
                     </tr>
                  @endforelse
               @endif
                </tbody>
            </table>
        </div><!--/body_nest-->
    </div><!--/nest-->
</div><!--/content_wrap-->
@endsection

@section('foot-assets')

{!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
{!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
{!! script('/third-party/jquery-form/jquery.form.min.js') !!}

{!! script('/assets/admin/js/order/edit.js') !!}
<script type="text/javascript">
$(function() {
    var editor = new OrderEditor();
    editor.initForm();
});
</script>
@endsection

