<!DOCTYPE html>
<html lang="zh-cn">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>广告预约</title>
        <!-- Bootstrap -->
         {!! style('/third-party/bootstrap/css/bootstrap.min.css') !!}
    
        <!-- Custom styles -->
       {!! style('/assets/admin/css/base4.css') !!}

    </head>

    <body>
        
        <!--header-->
        <div id="order"> 
            @forelse ($result['ceshi'] as $cc)
            <div id="orderList">
				    <a href="##" class="clearfix">
					    <div class="col-xs-2" >
	                    	<img src={{ $cc->goods_image }} />
	                    </div>
	                    <h1 class="h1 col-xs-10">{{ $cc->goods_name }}</h1>
                    </a>
                     <div class="order-time clearfix">
	                    <p class="col-xs-6"><span>收货人: </span> <span>{{ $cc->order->user->real_name }}</span></p>
	                    <p class="col-xs-6"><span>联系电话: </span> <span>{{ $cc->order->user->phone }}</span></p>
                            <p class="col-xs-6"><span>下单时间: </span> <span>{{ $cc->order->created_at }}</span></p>
                                <p class="col-xs-6"><span>金额: </span> <span>{{ $cc->order->order_amount }}</span></p>
                                    <p class="col-xs-6"><span>公司名称: </span> <span>{{ $cc->order->user->company_name }}</span></p>
	                </div> 
            </div>
            @empty
                <tr>
                    <td colSpan="6">没有计费管理数据</td>
                </tr>
            @endforelse

      </div>
            <!--js-->
           {!! script('/third-party/jquery/jquery.min.js') !!}
            <script type="text/javascript">
                         setInterval(function(){
                             location.href="/storeOrder/{{ $result['canshu'] }}";
                         },10000);
            </script>

    </body>

</html>