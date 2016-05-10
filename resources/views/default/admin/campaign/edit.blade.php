@extends(tpl('admin._layout.base'))

@section('title', '添加活动')

@section('title-block')
    <i class="icon_large icon_bookmark2"></i>
    <span>添加活动</span>
@endsection

@section('breadcrumb')
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/campaign">活动管理</a></li>
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/campaign/add">添加活动</a></li>
    <li class="back"><a class="btn btn_red" href="/admin/campaign"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
    <div class="body_nest">
        <form method="post" class="main-form" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form_group row">
                <label class="col-lg-2 control_label"><span class="must">*</span>标题：</label>
                <div class="col-lg-6">
                    <input type="text" class="form_control" name="title" value="{{ $result['campaign']->title or '' }}">
                </div>
            </div>
            <div class="form_group row">
                <label class="col-lg-2 control_label">副标题：</label>
                <div class="col-lg-6">
                    <input type="text" class="form_control" name="subtitle" value="{{ $result['campaign']->subtitle or '' }}">
                </div>
            </div>

            <!-------------------------------------- 活动时间待加入-------------------------------------------------------------------------->

            <div class="form_group row">

                <label class="col-lg-2 control_label"><span class="must">*</span>活动时间：</label>

                <div class="col-lg-6">
                    <div class="form_inline">
                        <div class="form_group">
                            <input type="text" class="form_control datepicker" id="timestart" name="campaign_timestart" value="{{ $result['campaign']->campaign_timestart }}"/>
                        </div>
                        <div class="form_group"> — </div>
                        <div class="form_group">
                            <input type="text" class="form_control datepicker" id="timeend" name="campaign_timeend" value="{{ $result['campaign']->campaign_timeend }}"/>
                        </div>
                    </div>
                </div>
            </div>


            <!-------------------------------------- 活动时间待加入-------------------------------------------------------------------------->

            <div class="form_group row">
                <label class="col-lg-2 control_label"><span class="must">*</span>封面图片：</label>
                <div class="col-lg-2">
                    <label class="uploader">
                        <span><i class="icon_image white"></i>&nbsp;点击上传图片</span>
                        <input type="file" name="cover_image" multiple title="Click to add Files">
                    </label>
                    <div class="img_view"><a class="focus"><img src="{{ $result['campaign']->cover_image }}"></a></div>
                </div>
            </div>


            <div class="form_group row">
                <label class="col-lg-2 control_label">排序：</label>
                <div class="col-lg-6">
                    <input type="text" class="form_control" name="sort_order" value="{{ $result['campaign']->sort_order or 0 }}">
                </div>
            </div>

            <div class="form_group row">
                <label class="col-lg-2 control_label"><span class="must">*</span>内容：</label>
                <div class="col-lg-6">
                    <script type="text/plain" id="myEditor" style="width:100%;height:240px;">{!! $result['campaign']->content !!}</script>
                    <input type="text" id="myEditor_input" name="myEditor_input" style="position:fixed;" value=""/>
                </div>
            </div>

            <div class="form_group row">
                <label class="col-lg-2 control_label">是否显示：</label>
                <ul class="form radioGroup col-lg-10 clearfix mt5">
                    @if($result['campaign']->is_show==1)
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
            <div class="form_group row">
                <div class="col-lg-2"></div>
                <div class="col-lg-1">
                    <button class="btn btn_green">提交</button>
                </div>
                <div>
                    <button class="btn btn_default" type="reset">重置</button>
                </div>
            </div>


    </div>
    </form>
@endsection

@section('foot-assets')
    <script type="text/javascript" charset="utf-8" src="/third-party/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/third-party/umeditor/umeditor.min.js"></script>
    <link rel="stylesheet" href="/third-party/umeditor/themes/default/css/umeditor.css">
    <link rel="stylesheet" href="/third-party/zebra_datepicker/css/datapicker.css">
    <script type="text/javascript" charset="utf-8" src="/third-party/zebra_datepicker/zebra_datepicker.js"></script>
    <script type="text/javascript" charset="utf-8" src="/third-party/calendar/date.js"></script>
    <script type="text/javascript" charset="utf-8" src="/third-party/clock/jquery.clock.js"></script>
    {!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
    {!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
    {!! script('/third-party/jquery-form/jquery.form.min.js') !!}

    {!! script('/assets/admin/js/campaign/edit.js') !!}
    <script type="text/javascript">
        $(function() {
            $(".datepicker").Zebra_DatePicker();
            $('#timestart').Zebra_DatePicker({
                direction:true,
                pair: $('#timeend')
            });
            $('#timeend').Zebra_DatePicker({
                direction:true
            });
            var um = UM.getEditor('myEditor');
            var editor = new CampaignEditor();
            editor.initForm();
            var content= UM.getEditor('myEditor').getContent();
            $('#myEditor_input').val(content);
        });
    </script>
@endsection
