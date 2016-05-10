@extends(tpl('admin._layout.base'))

@section('title', '会员充值')

@section('title-block')
<i class="icon_large icon_user2"></i>
<span>会员充值</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/usermanage">会员管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/usermanage/edit/{{$result['user']->user_id}}">会员充值</a></li>
<li class="back"><a class="btn btn_red" href="/admin/usermanage"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest">
    <form method="post" class="main-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form_group row">
            <label class="col-lg control_label">手机号:</label>
            <label class="col-lg control_label">{{$result['user']->phone}}</label>
        </div>
        <hr>
        <div class="form_group row">
            <label class="col-lg-2 control_label">账户充值:</label>
        </div>
        <div class="form_group row">
            <label class="col-lg-3 control_label">账户余额:</label>
            <label class="col-lg-1 control_label">{{$result['user']->account or "0.00"}}</label>
        </div>
        <div class="form_group row">
            <label class="col-lg-3 control_label">充值金额:</label>
            <div class="col-lg-6"> 
                <input type="text" name="account" class="form_control">
            </div>
        </div>
        <hr>
        <div class="form_group row">
            <label class="col-lg-2 control_label">优惠金充值:</label>
        </div>
        <div class="form_group row">
            <label class="col-lg-3 control_label">优惠金余额:</label>
            <label class="col-lg-1 control_label">{{$result['user']->other_account or "0.00"}}</label>
        </div>
        <div class="form_group row">
            <label class="col-lg-3 control_label">充值金额:</label>
            <div class="col-lg-6"> 
                <input type="text" name="other_account" class="form_control">
            </div>
        </div>
        <div class="form_group row">
            <div class="col-lg-3"></div>
            <div class="col-lg-1">
                <button class="btn btn_green">提交</button>
            </div>
        </div><!-- /.form_group -->
    </form>
</div><!-- /.body_nest -->
@endsection

@section('foot-assets')
{!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
{!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
{!! script('/third-party/jquery-form/jquery.form.min.js') !!}

{!! script('/assets/admin/js/usermanage/recharge.js') !!}
<script type="text/javascript">
$(function() {
    var editor = new UserManageEditor();
    editor.initForm();
});
</script>
@endsection

