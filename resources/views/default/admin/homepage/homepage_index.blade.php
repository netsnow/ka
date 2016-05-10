@extends(tpl('admin._layout.base'))

@section('title', '首页')

@section('title-block')
<i class="icon_large icon_bookmark2"></i>
<span>首页</span>
@endsection

@section('body-nest')
<div class="body_nest radius">
    <h2>欢迎您登录后台管理系统。</h2>
    <ul class="list mt50">
        <li><h4>店铺数量: <span class="red">{{ $content['store_n'] }}</span></h4></li>
        <li><h4>品牌数量: <span class="red">{{ $content['brand_n'] }}</span></h4></li>
        <li><h4>活动: <span class="red">{{ $content['campaign_n'] }}</span></h4></li>
        <li><h4>优惠: <span class="red">{{ $content['promotion_n'] }}</span></h4></li>
    </ul>
</div>
@endsection