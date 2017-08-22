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
{!! style('assets/admin/css/base.css') !!}
{!! style('assets/admin/css/custom.css') !!}
{!! style('third-party/fonts_icon/css/fonts.css') !!}

@yield('custom-styles')
</head>

<body>
<div class="wrap">
    <nav role="navigation" class="navbar row logo_blank">
        <div id="logo">
            <h2>河东二幼</h2>
        </div>
    </nav>
    @yield('main-section')
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
