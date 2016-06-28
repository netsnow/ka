<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>天津市河东区第一幼儿园</title>
{!! style('/assets/admin/css/adcss/cmn.css') !!}
{!! script('/assets/admin/js/ad/jquery.min.js') !!}
{!! script('/assets/admin/js/ad/cmn.js') !!}

{!! style('/assets/admin/css/adcss/luara.left.css') !!}
{!! script('/assets/admin/js/ad/jquery.luara.0.0.1.min.js') !!}
{!! script('/assets/admin/js/socket.io/socket.io.js') !!}

</head>

<body>


<div id="wrap">

<div id="headerBlock" class="group">
	<div id="logoBlock"><img src="/assets/admin/images/adimages/logo.jpg" alt="" width="100%"></div>
    <p id="titBlock">天津市河东区第一幼儿园</p>
</div>
<div id="headerBorder"></div>

<div id="topImgBlock">

    <!--图片切换骨架begin-->
    <div class="flash">
        <ul>
					  @foreach($result['ads'] as $ad)
            <li><img src="{{ $ad->ad_pic }}" alt="" width="100%"/></li>
						@endforeach
        </ul>
        <ol>
						@foreach($result['ads'] as $ad)
            <li></li>
						@endforeach
        </ol>
    </div>
    <!--图片切换骨架end-->
    <script>
        $(function(){
            $(".flash").luara({interval:3000,selected:"seleted",deriction:"left"});

        });
    </script>
<!--<div><img src="imgs/topimg_01.jpg" width="100%"></div>-->
<div id="headerBorderBot"></div>
</div>

<div id="midBlock">
<div id="midMain">
<div id="photoBlock">
<div id="photoBg"><img id="photoBgimg" src="/assets/admin/images/adimages/photoBorder.png" width="100%"></div>
<div id="photoImg"><img id="userphoto" src="/assets/admin/images/adimages/photo.jpg" width="98%" height="98%"></div>
</div>
<div><img src="/assets/admin/images/adimages/mid_mainbg.jpg" width="100%"></div>

<div id="infoBlock">
<p id="username" class="tit">姓名</p>
<ul>
<li id="classname">班级：</li>
<li id="checktime">时间：</li>
<li id="cardnum">卡号：</li>
</ul>
</div>
</div>
</div>

<div id="footerBlock"></div>
<div id="footerBg"></div>

</div>

<script>

function GetQueryString(name) {
   var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)","i");
   var r = window.location.search.substr(1).match(reg);
   if (r!=null) return (r[2]); return null;
}

$(document).ready(function () {
	$("#userphoto").width($("#photoBgimg").width()-10);
	$("#userphoto").height($("#photoBgimg").height()-10);
    // 连接服务端
    var socket = io('http://'+document.domain+':2120');
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
				 name = arr[2];
				 classname = arr[3];
				 cardnum = arr[4];

				 $("#username").text(name);
				 $("#classname").text("班级："+classname);
				 var myDate = new Date();
				 $("#checktime").text("时间："+myDate.getDate()+"日"+myDate.getHours()+"时"+myDate.getMinutes()+"分");
				 $("#cardnum").text("卡号："+cardnum);
				 $("#userphoto").attr("src",img);
				 $("#userphoto").width($("#photoBgimg").width()-10);
				 $("#userphoto").height($("#photoBgimg").height()-10);
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
<script>
  var t=30000;
  setTimeout(function(){
    location.href="";
  },t);
</script>
</html>
