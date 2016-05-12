<!DOCTYPE html>
<html>
	<head>
		<title>卡机</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible"  content="IE=edge" />
		<meta name="description" content="" />
		<meta name="keyword" content="" />
		<meta name="renderer" content="webkit">
		<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no" />
		{!! style('/assets/admin/css/base.css') !!}
		{!! style('/assets/admin/css/custom.css') !!}
	</head>
	<body style="background-image: none;">
		<div class="radius">
			<div class="col-lg-12 welcome_page">
			    <ul>
			    	@foreach($result['rooms'] as $room)
			    	<li class="col-lg-3"><a href="/admin/ad_appointment?room_id={{$room->room_id}}">{{ $room->room_num }}</a></li>
			    	@endforeach
			    </ul>
			</div>
			<div class="clear"></div>
		</div>
</body>
</html>
