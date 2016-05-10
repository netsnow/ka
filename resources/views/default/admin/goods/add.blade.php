@extends(tpl('admin._layout.base'))

@section('title-block')
    <i class="icon_large icon_flag2"></i>
    <span>商品管理</span>
@endsection

@section('breadcrumb')
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/goods">商品管理</a></li>
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="">商品新增</a></li>
    <li class="back"><a class="btn btn_red" href="/admin/goods"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('title', '商品新增')
@section('foot-assets')
    {!! script("third-party/jquery/jquery.validate.min.js")!!}
    {!! script("third-party/jquery/jquery.form.min.js")!!}
    {!! script("assets/admin/js/goods/add.js")!!}
    <!-- CSS -->
    <script type="text/javascript">
        $(function () {
            var editor = new GoodsEditor();
            editor.initForm();
        });

    </script>
@endsection
@section('body-nest')
    <div class="body_nest">
        <form method="post" class="main-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form_group row">
                <label class="col-lg-3 control_label"><span class="must">*</span>商品名称：</label>
              <div class="col-lg-6">
                 <input type="text" class="form_control" name="goods_name" value="{{ $result['goods']->goods_name or '' }}">
              </div>
            </div>

            <div class="form_group row">
			<label class="col-lg-3 control_label"><span class="must">*</span>商品图片：</label>
			<div class="col-lg-3">
            <label class="uploader">
                <span><i class="icon_image white"></i>&nbsp;点击上传图片</span>
                <input type="file" name="goods_img" accept="image/*" multiple title="Click to add Files">
            </label>
            
           </div>
		   </div>
		   <div class="form_group row">
              <label class="col-lg-3 control_label"><span class="must">*</span>商品价格：</label>
              <div class="col-lg-6">
                 <input type="text" class="form_control" name="price" value="{{ $result['goods']->price or '' }}">
              </div>
            </div>
            
   		   <div class="form_group row">
              <label class="col-lg-3 control_label"><span class="must">*</span>商店名称：</label>
              <div class="col-lg-6">
                 <input type="text" class="form_control" name="store_name" value="{{ $result['goods']->store_name or '' }}">
              </div>
           </div>
           
            <div class="form_group row">
			    <label class="col-lg-3 control_label">商品简介：</label>
			    <div class="col-lg-6">
			        <textarea rows="5" class="col-lg-12" name="goods_brief"></textarea>	
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
