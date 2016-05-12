@extends(tpl('teacher._layout.base_single'))

@section('title', '后台登录')

@section('foot-assets')
{!! script("third-party/jquery/jquery.validate.min.js")!!}
{!! script("third-party/jquery/jquery.form.min.js")!!}
{!! script("assets/teacher/js/login.index.js")!!}
<script type="text/javascript">
$(function() {
    var login = new LoginIndex();
    login.formInit();
});
</script>
@endsection

@section('main-section')
<section class="page_login">
    <div class="login_tit">
        <p>后台管理系统</p>
    </div>
    <form action="login" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="login_content">
            <div class="form_group row">
                <div class="col-lg-12">
                    <p class="tit">用户名</p>
                </div>
                <div class="col-lg-12">
                    <input type="text" name="user_name" value="{{$user_name or ''}}" class="form_control">
                </div>
            </div>
            <div class="form_group row">
                <div class="col-lg-12">
                    <p class="tit">密码</p>
                </div>
                <div class="col-lg-12">
                    <input type="password" name="password" class="form_control">
                </div>
            </div>
            <div class="row">
                <div class="text_center">
                    <button type="submit" class="btn btn_green">&nbsp;&nbsp;登陆&nbsp;&nbsp;</button>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
