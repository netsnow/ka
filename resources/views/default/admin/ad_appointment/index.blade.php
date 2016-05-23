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
function GetQueryString(name) {
   var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)","i");
   var r = window.location.search.substr(1).match(reg);
   if (r!=null) return (r[2]); return null;
}

$(document).ready(function () {
    // 连接服务端
    var socket = io('http://0.0.0.0:2120');
    // 连接后登录
    socket.on('connect', function(){
    	socket.emit('login', GetQueryString("room_id"));
    });
    // 后端推送来消息时
    socket.on('new_msg', function(msg){
         //$('#content').html('收到消息：'+msg);
         //$('.notification.sticky').notify();
         //location.href = '/'+msg;
				 var arr = new Array();
				 arr = msg.split("|");
				 img = arr[0];
				 audio = arr[1];

         layer.open({
           type: 1,
					 title: false,
					 //title: ['王同学', 'font-size:15px;'],
					 skin: 'layui-layer-lan',
					 //area: ['500px', '300px'],
					 offset: ['200px', '550px'],
					 closeBtn: 0,
           content: '<div style="border-style: groove;weith:15px"><img src="'+img+'" /></div>',
           time: '5000',
					 shift:5
          });
					var au = document.createElement("audio");
          au.preload="auto";
          au.src = audio;
          au.play();
    });
    // 后端推送来在线数据时
    //socket.on('update_online_count', function(online_stat){
    //    $('#online_box').html(online_stat);
    //});
});
</script>
</body>
</html>
