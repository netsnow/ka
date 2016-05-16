<!DOCTYPE html>
<html>
<head>
	<title>广告滑块</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible"  content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keyword" content="" />
	<!-- <meta http-equiv="refresh" content="15;url='/admin/ad_appointment/appoint'"> -->
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no" />

	{!! style('/assets/admin/css/slider.css') !!}
	{!! script('/assets/admin/js/index/jquery.js') !!}
	{!! script('/assets/admin/js/socket.io/socket.io.js') !!}
</head>
<body style="background-color:#d7d7d7;margin:0">
	<div id="wowslider-container1">
		<div class="ws_images">
			<ul>
				@foreach($result['ads'] as $ad)
				<li><a href=""><img src="{{ $ad->ad_pic }}" alt="" title="" style="width:100%!important;height:100%!important;visibility:visible!important;margin-left:0!important;"/></a></li>
				@endforeach
			</ul>
		</div>
	</div>


	{!! script('/assets/admin/js/index/wowslider.js') !!}
	{!! script('/assets/admin/js/index/script.js') !!}
	{!! script('/assets/admin/js/layer/layer.js') !!}

<script>
$(document).ready(function () {
    // 连接服务端
    var socket = io('http://0.0.0.0:2120');
    // 连接后登录
    socket.on('connect', function(){
    	socket.emit('login', 1);
    });
    // 后端推送来消息时
    socket.on('new_msg', function(msg){
         //$('#content').html('收到消息：'+msg);
         //$('.notification.sticky').notify();
         //location.href = '/'+msg;
				 //alert("Hello World!");
         layer.open({
           type: 1,
           title: '王同学',
           content: '<img src="/data/uploads/'+'1463207610_495247.png" />',
           time: '5000'
          });
					var au = document.createElement("audio");
          au.preload="auto";
          au.src = "/data/uploads/test.mp3";
          au.play();
    });
    // 后端推送来在线数据时
    socket.on('update_online_count', function(online_stat){
        $('#online_box').html(online_stat);
    });
});
</script>
</body>
</html>
