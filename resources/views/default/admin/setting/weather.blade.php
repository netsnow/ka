@extends(tpl('admin._layout.base'))

@section('title', '天气提醒管理')

@section('title-block')
<i class="icon_large icon_bookmark2"></i>
<span>天气提醒管理</span>
@endsection

@section('breadcrumb')
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/setting">系统设置</a></li>
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/setting/weather">天气提醒管理</a></li>
    <li class="back"><a class="btn btn_red" href="/admin/setting"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')


<div class="body_nest">
<div class="text_right">
    <button class="add_weather btn btn_green mb15">添加天气提醒</button>
</div>
    <form method="post" class="main-form">
        
        <div class="form_list ml100">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form_group row">
                <label class="col-lg-3"><strong>天气状况</strong></label>
                <label class="col-lg-6"><strong>天气提醒</strong></label></div>
            @foreach($result as $item)
            <div class="form_group row">
                <label class="col-lg-3 "><input type="text" class="form_control" name="weather_name[]" value="{{ $item['weather_name'] or '' }}"></label>
                <div class="col-lg-6">
                    <input type="text" class="form_control" name="weather_remind[]" value="{{ $item['weather_remind'] or '' }}">
                </div>
            </div>
            @endforeach
        </div>
        <div class="ml100">
            <input type="submit" class="btn btn_green ml15" value="保存">
        </div>
    </form>
</div>
@endsection

@section('foot-assets')
{!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
{!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
{!! script('/third-party/jquery-form/jquery.form.min.js') !!}

{!! script('/assets/admin/js/setting/editWeather.js') !!}

<script type="text/javascript">
$(function(){
    var editor = new SettingEditor();
    editor.initForm();
});
</script>
@endsection
