<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>天津市河东区第二幼儿园</title>
{!! style('/assets/admin/css/adcss/cmn.css') !!}
{!! script('/assets/admin/js/ad/jquery.min.js') !!}
{!! script('/assets/admin/js/ad/cmn.js') !!}
{!! style('/assets/admin/css/adcss/bootstrap.css') !!}

{!! style('/assets/admin/css/adcss/luara.left.css') !!}
{!! script('/assets/admin/js/ad/jquery.luara.0.0.1.min.js') !!}
{!! script('/assets/admin/js/socket.io/socket.io.js') !!}
{!! script('/assets/admin/js/ad/bootstrap.js') !!}
{!! script('/assets/admin/js/ad/js.js') !!}

</head>

<body>


<div id="wrap">

<div id="headerBlock" class="group">
	<div id="logoBlock"><img src="/assets/admin/images/adimages/logo.jpg" alt="" width="100%"></div>
    <p id="titBlock">天津市河东区第二幼儿园</p>
</div>
<div id="topImgBlock">

    <!--图片切换骨架begin-->
    <div class="flash">
        <ul >
					  @foreach($result['ads'] as $ad)
            <li><img id="adpic" src="{{ $ad->ad_pic }}" alt="" width="1366px" height="432px"/></li>
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

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-body">
		<div class="main">
			<div style="display: block;">
			<div id="photob" class="photo"><img id="userphoto" src="/assets/admin/images/adimages/photo.JPG"></div>
			<div id="username" class="word1 ">姓&nbsp;&nbsp;名 :</div>
			<div id="classname" class="word1 ">班&nbsp;&nbsp;级 :</div>
			<div id="cardnum" class="word1 ">卡&nbsp;&nbsp;号:</div>
			</div>
			<div id="checktime" class="word2">打卡时间</div>
		</div>
	</div>

</div><!-- /.modal -->
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
	//$("#userphoto").width($("#photoBgimg").width()-10);
	//$("#userphoto").height($("#photoBgimg").height()-10);
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
				 date_day = arr[5];
				 date_hour = arr[6];
				 date_min = arr[7];

				 $('#myModal').modal('show');
				 $("#username").text("姓  名 :"+name);
				 $("#classname").text("班  级："+classname);
				 var myDate = new Date();
				 $("#checktime").text("打卡时间："+date_day+"日"+date_hour+"时"+date_min+"分");
				 $("#cardnum").text("卡  号："+cardnum);
				 $("#userphoto").attr("src",img);
				 $("#userphoto").width($("#photob").width());
				 $("#userphoto").height($("#photob").height());
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
<script>
  var t=300000;
  setTimeout(function(){
    location.href="/admin/ad_appointment_h?room_id="+GetQueryString("room_id");
  },t);
</script>
<script>
    $('#adpic').width(document.body.clientWidth);
    $('#adpic').height(document.body.clientHeight);
</script>
</body>

</html>
