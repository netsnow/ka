@extends(tpl('admin._layout.base'))

@section('title', '优惠管理')

@section('title-block')
    <i class="icon-large icon-gift"></i>
    <span>优惠管理</span>
@endsection

@section('breadcrumb')
    <li><i class="icon-large icon-triangle-right"></i></li>
    <li><a href="/admin/promotion">新增优惠管理</a></li>
@endsection

@section('body-nest')

    <div class="body_nest">
        <form method="post" class="main-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form_group row">
                <label class="col-lg-2 control_label"><span class="must">*</span>标题：</label>
                <div class="col-lg-6">
                    <input type="text" class="form_control" name="title" id="title">
                </div>
            </div>
            <div class="form_group row">
                <label class="col-lg-2 control_label">副标题：</label>
                <div class="col-lg-6">
                    <input type="text" class="form_control" name="subtitle">
                </div>
            </div>
            <div class="form_group row">
                <label class="col-lg-2 control_label"><span class="must">*</span>封面照片：</label>
                <div class="col-lg-2">
                    <label class="uploader">
                        <span><i class="icon_image white"></i>&nbsp;点击上传图片</span>
                        <input type="file"  accept="image/*"  name="cover_image" multiple title="Click to add Files" id="cover_image">
                    </label>
                </div>
            </div>


            <div class="form_group row">
                <label class="col-lg-2 control_label">排序：</label>
                <div class="col-lg-6">
                    <input type="text" class="form_control" name="sort_order" value="0">
                </div>
            </div>

            <div class="form_group row">
                <label class="col-lg-2 control_label"><span class="must">*</span>内容：</label>
                <div class="col-lg-6">
                    <script type="text/plain" id="myEditor" style="width:100%;height:240px;" name="content" class="content"></script>
                    <input type="text" id="myEditor_input" name="myEditor_input" style="position:fixed;" value=""/>
                </div>
            </div>

            <div class="form_group row">
                <label class="col-lg-2 control_label">是否显示：</label>
                <ul class="form radioGroup col-lg-10 clearfix mt5">
                    <li class="clearfix">
                        <div class="iradio_red  checked">
                            <input tabindex="13" type="radio" id="radio01" name="is_show" value="1" checked>
                        </div>
                        <label for="radio01" class="">显示</label>
                    </li>
                    <li class="clearfix">
                        <div class="iradio_red">
                            <input tabindex="13" type="radio" id="radio02" name="is_show" value="0">
                        </div>
                        <label for="radio01" class="">不显示</label>
                    </li>
                </ul>
            </div>
            <div class="form_group row">
                <div class="col-lg-2"></div>
                <div class="col-lg-1">
                    <button class="btn btn_green">提交</button>
                </div>
                <div>
                    <button class="btn btn_default" type="reset">重置</button>
                </div>
            </div>
        </form>
    </div><!-- /.body_nest -->
@endsection
@endsection


@section('foot-assets')
    <script type="text/javascript" charset="utf-8" src="/third-party/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/third-party/umeditor/umeditor.min.js"></script>
    <link rel="stylesheet" href="/third-party/umeditor/themes/default/css/umeditor.css">
    {!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
    {!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
    {!! script('/third-party/jquery-form/jquery.form.min.js') !!}

    {!! script('/assets/admin/js/promotion/edit.js') !!}
    <script type="text/javascript">
        $(function() {
            //文本编辑框
            var um = UM.getEditor('myEditor');
            var editor = new PromotionEditor();
            editor.initForm();
        });

    </script>
@endsection
