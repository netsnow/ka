@extends(tpl('admin._layout.base'))

@section('title', '账号管理')

@section('title-block')
<i class="icon_large icon_user2"></i>
<span>账号管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/usermanage">账号管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/usermanage/add">添加教师</a></li>
<li class="back"><a class="btn btn_red" href="javascript:void(0)" onclick="history.go(-1);"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')

<div class="body_nest">
    <form method="post" class="main-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form_group row">
            <label class="col-lg-3 control_label"><span class="must">*</span>手机号：</label>
            <div class="col-lg-6">
                <input type="text" name="phone" class="form_control" placeholder="手机号">
            </div>
        </div>

        <div class="form_group row">
            <label class="col-lg-3 control_label"><span class="must">*</span>姓名：</label>
            <div class="col-lg-6">
                <input type="text" name="real_name" class="form_control" >
            </div>
        </div>

        <div class="form_group row">
            <label class="col-lg-3 control_label"><span class="must">*</span>会员密码：</label>
            <div class="col-lg-6">
                <input type="password" name="password"  id="pw2" class="form_control">
            </div>
        </div>
        <!-- <div class="form_group row">
            <label class="col-lg-3 control_label"><span class="must">*</span>门禁卡号:</label>
            <div class="col-lg-6">
                <input type="text"  class="form_control" name="cardroomnum" value="{{$result['user']->card_room_num or ''}}">
            </div>
        </div> -->
         <div class="form_group row">
            <label class="col-lg-3 control_label"><span class="must">*</span>一卡通卡号：</label>
            <div class="col-lg-6">
                <input type="text" name="cardnum"  class="form_control">
            </div>
         </div>

        <div class="form_group row">
            <label class="col-lg-3 control_label text_right">班级：</label>
            <div class="control_select btn_group search_list col-lg-6">
                <button data-toggle="dropdown" class="btn dropdown_toggle " type="button">
                    <span class="txt" id="categoryTxt">请选择</span>
                    <span class="icon-triangle-down"></span>
                </button>
                <ul role="menu" class="dropdown_menu search_content" >
                    <input type="text" class="form_control">
                    <li class="divider"></li>
                    @foreach ($result['company'] as $company)
                    <li>
                         <a href="javascript:selectFloor('{{$company->company_name}}');" >{{$company->company_name}}</a>
                    </li>
                    @endforeach
                </ul>
                <input type="hidden" name="company" id="company" value="无">
            </div>
        </div>
        <div class="form_group row">
          <label class="col-lg-3 control_label"><span class="must">*</span>教师照片：</label>
          <div class="col-lg-3">
            <label class="uploader">
               <span><i class="icon_image white"></i>&nbsp;点击上传图片</span>
               <input type="file" name="img" accept="image/*" multiple title="Click to add Files">
           </label>

          </div>
        </div>
        <div class="form_group row">
            <div class="col-lg-3"></div>
            <div class="col-lg-1">
                <button class="btn btn_green">提交</button>
            </div>
            <div>
                <button type="reset" id="reset" class="btn btn_default">重置</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('foot-assets')
{!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
{!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
{!! script('/third-party/jquery-form/jquery.form.min.js') !!}

{!! script('/assets/admin/js/usermanage/edit_add.js') !!}
<script type="text/javascript">
$(function() {
    var editor = new UserManageEditor();
    editor.initForm();
});
function selectFloor(index)
{
    $('#company').val(index);
}
</script>
@endsection
