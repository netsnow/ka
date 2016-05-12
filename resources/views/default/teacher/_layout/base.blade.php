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
                    <li class="name">Hi , 后台管理员</li>
                    <li class="logout"><a href="/teacher/user/setting" class="blue">[ 个人设置 ]</a></li>
                    <li class="logout"><a href="javascript:void(0)" id="logout" class="red">[ 退出登录 ]</a></li>
                </ul>
            </div>
        </nav>
        <div class="container row">

            <div>
                <div class="main_bg">
                    <div id="paper_top" class="row">
                        <div class="titleBlock">
                            <h2>
                                <a href="/teacher/studentattendance"><span class="red">&nbsp;&nbsp;学生考勤&nbsp;&nbsp;</span></a>
                                <a href="/teacher/order"><span class="red">&nbsp;&nbsp;教师考勤</span></a>
                            </h2>
                        </div>
                    </div>


                    <div class="content_wrap">
                        <div class="nest">
                            @yield('body-nest')
                        </div>

                    <div id="footer" class="row">
                        <div class="copyright">Copyright 2016 baixue,All rights reserved.</div>
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
