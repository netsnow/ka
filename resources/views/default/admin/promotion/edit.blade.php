@extends(tpl('admin._layout.base'))

@section('title', '优惠管理')

@section('title-block')
    <i class="icon-large icon-gift"></i>
    <span>优惠管理</span>
@endsection

@section('breadcrumb')
    <li><i class="icon-large icon-triangle-right"></i></li>
    <li><a href="/admin/promotion">编辑优惠管理</a></li>
@endsection

@section('body-nest')

    <div class="body_nest">
        <form method="post" class="main-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form_group row">
                <label class="col-lg-2 control_label"><span class="must">*</span>标题：</label>
                <div class="col-lg-6">
                    <input type="text" class="form_control" name="title" value="{{ $result['promotion']->title or '' }}">
                </div>
            </div><!-- /.form_group -->

            <div class="form_group row">
                <label class="col-lg-2 control_label"><span class="must">*</span>副标题：</label>
                <div class="col-lg-6">
                    <input type="text" class="form_control" name="subtitle" value="{{ $result['promotion']->subtitle or '' }}">
                </div>
            </div>
            <div class="form_group row">
                <label class="col-lg-2 control_label"><span class="must">*</span>封面照片：</label>
                <div class="col-lg-2">

                    <label class="uploader">
                        <span><i class="icon_image white"></i>&nbsp;点击上传图片</span>
                        <input type="file" name="cover_image" accept="image/*"  multiple title="Click to add Files">
                    </label>
                    <div class="img_view"><a class="focus"><img src="{{ $result['promotion']->cover_image }}"></a></div>

                </div>
            </div>
            <div class="form_group row">
                <label class="col-lg-2 control_label">排序：</label>
                <div class="col-lg-6">
                    <input type="text" class="form_control" name="sort_order" value="{{ $result['promotion']->sort_order or '0' }}">
                </div>
            </div>
            <div class="form_group row">
                <label class="col-lg-2 control_label"><span class="must">*</span>内容：</label>
                <div class="col-lg-6">
                    <script type="text/plain" id="myEditor" style="width:100%;height:240px;" name="content">{!! $result['promotion']->content !!}</script>
                    <input type="text" id="myEditor_input" name="myEditor_input" style="position:fixed;" value=""/>
                </div>
            </div>
            <div class="form_group row">
                <label class="col-lg-2 control_label">是否显示：</label>
                <ul class="form radioGroup col-lg-10 clearfix mt5">
                    @if($result['promotion']->is_show==1)
                        <li class="clearfix">
                            <div class="iradio_red checked">

                                <input tabindex="13" type="radio" id="radio01" name="is_show" value="1" checked="true">
                            </div>
                            <label for="radio01" class="">显示</label>
                        </li>
                        <li class="clearfix">
                            <div class="iradio_red">
                                <input tabindex="13" type="radio" id="radio02" name="is_show" value="0">
                            </div>
                            <label for="radio01" class="">不显示</label>
                        </li>
                    @else
                        <li class="clearfix">
                            <div class="iradio_red">

                                <input tabindex="13" type="radio" id="radio01" name="is_show" value="1">
                            </div>
                            <label for="radio01" class="">显示</label>
                        </li>
                        <li class="clearfix">
                            <div class="iradio_red  checked">
                                <input tabindex="13" type="radio" id="radio02" name="is_show" value="0" checked="true">
                            </div>
                            <label for="radio01" class="">不显示</label>
                        </li>
                    @endif

                </ul>
            </div>
            <!-- /.form_group -->

            <div class="form_group row">
                <div class="col-lg-2"></div>
                <div class="col-lg-1">
                    <button class="btn btn_green">提交</button>
                </div>
            </div><!-- /.form_group -->
        </form>
    </div><!-- /.body_nest -->
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
            var um = UM.getEditor('myEditor');
            var editor = new PromotionEditor();
            editor.initForm();
        });
    </script>
@endsection
