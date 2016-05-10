@extends(tpl('admin._layout.base'))

@section('title-block')
    <i class="icon_large icon_flag2"></i>
    <span>楼层管理</span>
@endsection

@section('breadcrumb')
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/floor">楼层管理</a></li>
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="">楼层编辑</a></li>
@endsection

@section('title', '楼层编辑')
@section('foot-assets')
    {!! script("third-party/jquery/jquery.validate.min.js")!!}
    {!! script("third-party/jquery/jquery.form.min.js")!!}
    {!! script("assets/admin/js/floor/edit.js")!!}
    <!-- CSS -->
    <script type="text/javascript">
        $(function () {
            var floor = new floorEdit();

            floor.formInit();
        });

    </script>
@endsection
@section('body-nest')
    <div class="body_nest">
        <form method="post" class="main-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form_group row">
                <label class="col-lg-3 control_label"><span class="must">*</span>楼层：</label>
              <div class="col-lg-6">
                 <input type="text" class="form_control" name="floor_name" value="{{ $result['foor']->floor_name or '' }}">
            </div>
            </div>

            
            <div class="form_group row">
			<label class="col-lg-3 control_label">图片：</label>
			<div class="col-lg-3">
            <label class="uploader">
                <span><i class="icon_image white"></i>&nbsp;点击上传图片</span>
                <input type="file" name="floor_pic" accept="image/*" multiple title="Click to add Files">
            </label>
            
           </div>
		   </div>
            <div class="form_group row">
                <div class="col-lg-3"></div>
                <div class="col-lg-1">
                    <button class="btn btn_green">提交</button>
                </div>

            </div>

        </form>
    </div>
@endsection
