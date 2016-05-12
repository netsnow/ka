<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible"  content="IE=edge" />
<meta name="description" content="" />
<meta name="keyword" content="" />
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no" />
<title>@yield('title')</title>

<!-- CSS -->
{!! style('/third-party/fonts_icon/css/fonts.css') !!}
{!! style('/assets/admin/css/base.css') !!}
{!! style('/assets/admin/css/custom.css') !!}

@yield('custom-styles')
</head>
<body>
    <div class="wrap">
        <nav role="navigation" class="navbar row">
            <div id="logo">
                <a href="/teacher/admin"><h1>LOGO</h1></a>
            </div>
            <div id="title_container" class="running_text pull_left clearfix">
                <ul class="date_top">
                    <li class="icon_calendar_alt_fill" style="margin-right:5px"></li>
                    <li id="Date"></li>
                </ul>

                <ul id="digital_clock" class="digital">
                    <li class="icon_clock2" style="margin-right:5px"></li>
                    <li class="hour">00</li>
                    <li>:</li>
                    <li class="min">00</li>
                    <li>:</li>
                    <li class="sec">00</li>
                    <li class="meridiem">NN</li>
                </ul>
                <!-- <div id="weather"></div> -->
            </div>
            <div id="user">
                <ul class="row">
                    <li class="img"><img src="/assets/admin/images/cmn_images/cmn_user.png"></li>
                    <li class="name">Hi , 后台管理员!!!!!</li>
                    <li class="logout"><a href="/teacher/user/setting" class="blue">[ 个人设置 ]</a></li>
                    <li class="logout"><a href="javascript:void(0)" id="logout" class="red">[ 退出登录 ]</a></li>
                </ul>
            </div>
        </nav>
        <div class="container row">
            <div id="side_Nav">
                <ul class="menu_left_nest">
                    <li class="menu_left_title oftenControl">
                        <span>控制台菜单</span>
                        <i class="icon_menu"></i>
                    </li>
                    @set($active = isset($active) ? $active : ''; $class[$active] = ' class="active"')
    		<li{!! $class['floor'] or '' !!}><a href="/teacher/floor"><i class="icon_large icon_flag2"></i><span>&nbsp;&nbsp;园区管理！！！</span></a></li>
                    <li{!! $class['room'] or '' !!}><a href="/teacher/room"><i class="icon_large icon_shop"></i><span>&nbsp;&nbsp;卡机管理！！！</span></a></li>
                    <li{!! $class['seat'] or '' !!}><a href="/teacher/seat"><i class="icon_large icon_location"></i><span>&nbsp;&nbsp;工位管理</span></a></li>
                    <li{!! $class['seat_price'] or '' !!}><a href="/teacher/seat_price"><i class="icon_large icon_pencil"></i><span>&nbsp;&nbsp;工位定价</span></a></li>
                    <li class="driver"></li>
                    <li{!! $class['charging'] or '' !!}><a href="/teacher/charging"><i class="icon_large icon_credit"></i><span>&nbsp;&nbsp;计费管理</span></a></li>
                    <li{!! $class['goods'] or '' !!}><a href="/teacher/goods"><i class="icon_large icon_credit"></i><span>&nbsp;&nbsp;商品管理</span></a></li>
                    <li{!! $class['charging_price'] or '' !!}><a href="/teacher/charging_price"><i class="icon_large icon_pencil"></i><span>&nbsp;&nbsp;计费定价</span></a></li>
                    <li class="driver"></li>
                    <li{!! $class['usermanage'] or '' !!}><a href="/teacher/usermanage"><i class="icon_large icon_user2"></i><span>&nbsp;&nbsp;账户管理！！！</span></a></li>
                    <li{!! $class['order'] or '' !!}><a href="/teacher/order"><i class="icon_large icon_shopping_cart"></i><span>&nbsp;&nbsp;订单管理</span></a></li>
                    <li class="driver"></li>
                    <li{!! $class['setting'] or '' !!}><a href="/teacher/setting"><i class="icon_large icon_star"></i><span>&nbsp;&nbsp;系统设置</span></a></li>

                </ul>
            </div>
            <div id="main_container">
                <div class="main_bg">
                    <div id="paper_top" class="row">
                        <div class="titleBlock">
                            <h2>
                                @yield('title-block')
                            </h2>
                        </div>
                        <div class="wellcomeBlock">
                            <i class="icon_comment green"></i>
                            您好，<strong>{{Auth::user()->user_name}}</strong>
                            <!-- ，欢迎使用 WeShop。 您上次登录的时间是{{Auth::user()->last_login}} ，IP 是 {{Auth::user()->last_ip}} -->
                        </div>
                    </div>
                    <ul id="breadcrumb">
                        <li> <i class="icon_large icon_home3"></i> </li>
                        <li><i class="icon_large icon_triangle_right"></i></li>
                        <li><a href="/admin/admin">Home</a></li>
                        @yield('breadcrumb')
                    </ul>

                    <div class="content_wrap">
                        <div class="nest">
                            @yield('body-nest')
                        </div>

                    <div id="footer" class="row">
                        <div class="copyright">Copyright 2003-2012 ShopEx Inc.,All rights reserved.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="display: none;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrfToken">
        @yield('hidden-items')
    </div>
    <!-- Foot Assets
    ================================================== -->
    {!! script('/third-party/jquery/jquery.min.js') !!}
    {!! script('/third-party/calendar/date.js') !!}
    {!! script('/third-party/clock/jquery.clock.js') !!}
    {!! script('/assets/admin/js/main.js') !!}
    {!! script('/assets/admin/js/base.js') !!}

    {!! script('/third-party/jquery-notifyBar/js/jquery.notifyBar.js') !!}
    {!! style('/third-party/jquery-notifyBar/css/jquery.notifyBar.css') !!}

    @yield('foot-assets')
</body>
</html>
