@extends(tpl('admin._layout.base'))

@section('title', '编辑学生')

@section('title-block')
<i class="icon_large icon_user2"></i>
<span>编辑学生</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/usermanage">帐号管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/studentmanage/edit/{{$result['student']->student_id}}">编辑学生</a></li>
<li class="back"><a class="btn btn_red" href="/admin/studentmanage"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest">
    <form method="post" class="main-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form_group row">
            <label class="col-lg-3 control_label"><span class="must">*</span>卡号：</label>
            <div class="col-lg-6">
                <input type="text" name="phone" class="form_control"  value="{{$result['student']->phone}}">
            </div>
        </div>

        <div class="form_group row normal_name">
            <label class="col-lg-3 control_label"><span class="must">*</span>姓名：</label>
            <div class="col-lg-6">
                <input type="text" name="real_name" class="form_control" value="{{$result['student']->real_name}}">
            </div>
        </div>

        <div class="form_group row none admin_name">
            <label class="col-lg-3 control_label"><span class="must">*</span>管理员登陆账号：</label>
            <div class="col-lg-6">
                <input type="text" name="student_name" class="form_control" value="{{$result['student']->student_name}}">
            </div>
        </div>

        <div class="form_group row none admin_name">
            <label class="col-lg-3 control_label">管理员真实姓名：</label>
            <div class="col-lg-6">
                <input type="text" name="real_studentname" class="form_control" value="{{$result['student']->real_name}}">
            </div>
        </div>


        <div class="form_group row">
            <label class="col-lg-3 control_label"><span class="must">*</span>一卡通卡号：</label>
            <div class="col-lg-6">
                <input type="text"  class="form_control" name="cardnum" value="{{$result['student']->card_num or ''}}">
            </div>
        </div>
        <div class="form_group row">
            <label class="col-lg-3 control_label"><span class="must">*</span>家长电话：</label>
            <div class="col-lg-6">
                <input type="text"  class="form_control" name="parentphone" value="{{$result['student']->store_name or ''}}">
            </div>
        </div>
         <div class="form_group row">
            <label class="col-lg-3 control_label text_right">班级：</label>
            <div class="control_select btn_group search_list col-lg-6">
            	 <button data-toggle="dropdown" class="btn dropdown_toggle" type="button">
                    <span class="txt" id="categoryTxt">{{$result['student']->company_name or '请选择'}}</span>
                    <span class="icon-triangle-down"></span>
                </button>
                <ul role="menu" class="dropdown_menu search_content" >
                    <input type="text" class="form_control">
                    <li><a href="javascript:selectFloor();" name="menu">请选择</a></li>
                    <li class="divider"></li>
                    @foreach ($result['company'] as $company)
                    <li>

                         <a href="javascript:selectFloor('{{$company->company_name}}');" >{{$company->company_name}}</a>
                    </li>
                    @endforeach
                </ul>
                <input type="hidden" name="company" id="company" value="{{$result['student']->company_name}}">
            </div>

        </div>
        <div class="form_group row">
          <label class="col-lg-3 control_label"><span class="must">*</span>学生照片：</label>
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
        </div><!-- /.form_group -->
    </form>
</div><!-- /.body_nest -->
@endsection

@section('foot-assets')
{!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
{!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
{!! script('/third-party/jquery-form/jquery.form.min.js') !!}

{!! script('/assets/admin/js/studentmanage/edit.js') !!}
<script type="text/javascript">
$(function() {
    var editor = new UserManageEditor();
    editor.initForm();

    var id=$(".iradio_red input:checked").attr("id");
    if(id=="radio02"){
    	$(".admin_name").removeClass("none");
    	$(".normal_name").addClass("none");
      }

    $(".iradio_red input").click(function(){
    	var id=$(".iradio_red input:checked").attr("id");
    	if(id=="radio02"){
        	$(".admin_name").removeClass("none");
        	$(".normal_name").addClass("none");
        	}
    	else{
        		$(".admin_name").addClass("none");
        		$(".normal_name").removeClass("none");
            	}
    	console.log(id);
        });
});
function selectFloor(index)
{
    $('#company').val(index);
}
</script>
@endsection
