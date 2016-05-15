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
</body>
</html>
