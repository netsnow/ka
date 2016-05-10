<!DOCTYPE html>
<html lang="zh-cn">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>广告预约</title>
        <!-- Bootstrap -->
        {!! style('/assets/admin/css/base_1.css') !!}
    {!! style('/third-party/bootstrap/css/bootstrap.min.css') !!}
    {!! script('/third-party/jquery/jquery.min.js') !!}
        
     
        <script type="text/javascript">
            $(function() {
                var s = $(window).height();
                $("#appoint").css("height", s);
            });
        </script>
    </head>

    <body>
        <!--header-->

        <div id="appoint">
            <div id="appointContent">
                <div class="clearfix content">
                    <div class="clearfix">
                   	 	<h1 class="h1">{{ $result['date1'] }}   {{ $result['week1'] }}</h1>
                        <div class="appoint-time clearfix">
                            @if(count($result['yuyue1']) > 0)
	                        @foreach($result['yuyue1'] as $yuyue1)
	                        <p class="col-sm-6"><span>{{ substr($yuyue1->start_time,-8,5) }} ~ {{ substr($yuyue1->end_time,-8,5) }}</span> <span>已预约</span></p>
				    		@endforeach
				    		@else
				    		<p class="col-sm-6"><span>无预约信息</span></p>
			    			@endif
                        </div>
                    </div>
                    <div class="clearfix">
                   	 	<h1 class="h1">{{ $result['date2'] }}   {{ $result['week2'] }}</h1>
                        <div class="appoint-time clearfix">
                            @if(count($result['yuyue2']) > 0)
	                        @foreach($result['yuyue2'] as $yuyue2)
	                        <p class="col-sm-6"><span>{{ substr($yuyue2->start_time,-8,5) }} ~ {{ substr($yuyue2->end_time,-8,5) }}</span> <span>已预约</span></p>
				    		@endforeach
				    		@else
				    		<p class="col-sm-6"><span>无预约信息</span></p>
			    			@endif
                        </div>
                    </div>
                    <div class="clearfix">
                   	 	<h1 class="h1">{{ $result['date3'] }}   {{ $result['week3'] }}</h1>
                        <div class="appoint-time clearfix">
                            @if(count($result['yuyue3']) > 0)
	                        @foreach($result['yuyue3'] as $yuyue3)
	                        <p class="col-sm-6"><span>{{ substr($yuyue3->start_time,-8,5) }} ~ {{ substr($yuyue3->end_time,-8,5) }}</span> <span>已预约</span></p>
				    		@endforeach
				    		@else
				    		<p class="col-sm-6"><span>无预约信息</span></p>
			    			@endif
                        </div>
                    </div>
                    <div class="clearfix">
                   	 	<h1 class="h1">{{ $result['date4'] }}   {{ $result['week4'] }}</h1>
                        <div class="appoint-time clearfix">
                            @if(count($result['yuyue4']) > 0)
	                        @foreach($result['yuyue4'] as $yuyue4)
	                        <p class="col-sm-6"><span>{{ substr($yuyue4->start_time,-8,5) }} ~ {{ substr($yuyue4->end_time,-8,5) }}</span> <span>已预约</span></p>
				    		@endforeach
				    		@else
				    		<p class="col-sm-6"><span>无预约信息</span></p>
			    			@endif
                        </div>
                    </div>
                    <div class="clearfix">
                   	 	<h1 class="h1">{{ $result['date5'] }}   {{ $result['week5'] }}</h1>
                        <div class="appoint-time clearfix">
                            @if(count($result['yuyue5']) > 0)
	                        @foreach($result['yuyue5'] as $yuyue5)
	                        <p class="col-sm-6"><span>{{ substr($yuyue5->start_time,-8,5) }} ~ {{ substr($yuyue5->end_time,-8,5) }}</span> <span>已预约</span></p>
				    		@endforeach
				    		@else
				    		<p class="col-sm-6"><span>无预约信息</span></p>
			    			@endif
                        </div>
                    </div>
                    <div class="clearfix">
                   	 	<h1 class="h1">{{ $result['date6'] }}   {{ $result['week6'] }}</h1>
                        <div class="appoint-time clearfix">
                            @if(count($result['yuyue6']) > 0)
	                        @foreach($result['yuyue6'] as $yuyue6)
	                        <p class="col-sm-6"><span>{{ substr($yuyue6->start_time,-8,5) }} ~ {{ substr($yuyue6->end_time,-8,5) }}</span> <span>已预约</span></p>
				    		@endforeach
				    		@else
				    		<p class="col-sm-6"><span>无预约信息</span></p>
			    			@endif
                        </div>
                    </div>
                    <div class="clearfix">
                   	 	<h1 class="h1">{{ $result['date7'] }}   {{ $result['week7'] }}</h1>
                        <div class="appoint-time clearfix">
                            @if(count($result['yuyue7']) > 0)
	                        @foreach($result['yuyue7'] as $yuyue7)
	                        <p class="col-sm-6"><span>{{ substr($yuyue7->start_time,-8,5) }} ~ {{ substr($yuyue7->end_time,-8,5) }}</span> <span>已预约</span></p>
				    		@endforeach
				    		@else
				    		<p class="col-sm-6"><span>无预约信息</span></p>
			    			@endif
                        </div>
                    </div>
                </div>

            </div>

            <div id="content2"></div>
        </div>
        <script>
        setTimeout(function(){
            location.href=document.referrer;
        },($("p").length)*1100*2+32000);
    </script>	
        <script type="text/javascript">
            var speed = 25;
            content2.innerHTML = appointContent.innerHTML;
            //appoint.scrollTop = appoint.scrollHeight;

            function Down() {
                if (content2.offsetTop - appoint.scrollTop <= 0) {
                    appoint.scrollTop -= content2.offsetHeight;
                } else {
                    appoint.scrollTop++;
                }
            }
           setInterval(Down, speed);
        </script>
    
    </body>

</html>