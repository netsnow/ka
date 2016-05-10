@extends(tpl('admin._layout.base'))


@section('title', '系统设置')

@section('title-block')
    <i class="icon_large icon_star"></i>
    <span>系统设置</span>
@endsection

@section('breadcrumb')
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/setting">系统设置</a></li>
@endsection 
@section('body-nest')
    <div class="consignee-info p10">
        <ul>
            <li>
                <div >
                    <a href="/admin/payment" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;支付方式管理&nbsp;</a>
                </div>
            </li>
            <li>
                <div >
                    <a href="/admin/ad" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;会议室Pad<br>&nbsp;广告轮换管理&nbsp;</a>
                </div>
            </li>
            <li>
                <div >
                    <a href="/admin/setting/wifi" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;WiFi密码设置&nbsp;</a>
                </div>
            </li>
<!--             <li>
                <div >
                    <a href="/admin/setting/weather" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;天气提醒管理&nbsp;</a>
                </div>
            </li> -->
            <li>
                <div >
                    <a href="/admin/setting/edition_ios" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;App升级管理&nbsp;</a>
                </div>
            </li>
            <li>
                <div >
                    <a href="/admin/setting/protocol" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;服务条款管理&nbsp;</a>
                </div>
            </li>
            
            <li>
                <div >
                    <a href="/admin/setting/about_us" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;关于我们管理&nbsp;</a>
                </div>
            </li>
            
            <li>
                <div >
                    <a href="/admin/setting/store_code" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;商店管理&nbsp;</a>
                </div>
            </li>
            <div class="clear"></div>
        </ul>
        <div class="clear"></div>
    </div>
@endsection
