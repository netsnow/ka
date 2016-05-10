@extends(tpl('admin._layout.base'))

@section('title', '编辑支付')

@section('title-block')
    <i class="icon_large icon_credit"></i>
    <span>编辑支付</span>
@endsection

@section('breadcrumb')
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/setting">系统设置</a></li>
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/payment">支付方式管理</a></li>
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/payment/edit/{{ $result['payment']->payment_id }}">编辑支付</a></li>
    <li class="back"><a class="btn btn_red" href="/admin/payment"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
    <div class="body_nest">
        <form method="post" class="main-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form_group row">
                <label class="col-lg-3 control_label"><span class="must">*</span>支付方式名称：</label>
                <div class="col-lg-6">
                    <input type="text" class="form_control" name="payment_name" value="{{ $result['payment']->payment_name or '' }}">
                </div>
            </div><!-- /.form_group -->


            <div class="form_group row ">
                <label class="col-lg-3 control_label"><span class="must">*</span>是否开启：</label>
                <ul class="form radioGroup clearfix form_group mt5 col-lg-6">
                    @if($result['payment']->is_enabled==1)
                        <li class="clearfix">
                            <div class="iradio_red checked">

                                <input tabindex="13" type="radio" id="radio01" name="is_enabled" value="1" checked>
                            </div>
                            <label for="radio01" class="">是</label>
                        </li>
                        <li class="clearfix">
                            <div class="iradio_red">
                                <input tabindex="13" type="radio" id="radio02" name="is_enabled" value="0">
                            </div>
                            <label for="radio02" class="">否</label>
                        </li>
                    @else
                        <li class="clearfix">
                            <div class="iradio_red">

                                <input tabindex="13" type="radio" id="radio01" name="is_enabled" value="1">
                            </div>
                            <label for="radio01" class="">是</label>
                        </li>
                        <li class="clearfix">
                            <div class="iradio_red  checked">
                                <input tabindex="13" type="radio" id="radio02" name="is_enabled" value="0" checked>
                            </div>
                            <label for="radio02" class="">否</label>
                        </li>
                    @endif
                </ul>
            </div>


            <div class="form_group row">
                <label class="col-lg-3 control_label"><span class="must">*</span>排序：</label>
                <div class="col-lg-6">
                    <input type="text" class="form_control" name="sort_order" value="{{ $result['payment']->sort_order or '' }}">
                </div>
            </div><!-- /.form_group -->

            <div class="form_group row">
                <label class="col-lg-3 control_label">描述：</label>
                <div class="col-lg-6">
                    <textarea rows= "5" class="col-lg-12"  name="payment_desc" id="payment_desc"></textarea>
                </div>
            </div><!-- /.form_group -->
            
            <div class="form_group row">
                <div class="col-lg-3"></div>
                <div class="col-lg-1">
                    <button class="btn btn_green">提交</button>
                </div>
            </div><!-- /.form_group -->
        </form>
    </div>
@endsection

@section('foot-assets')
    {!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
    {!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
    {!! script('/third-party/jquery-form/jquery.form.min.js') !!}

    {!! script('/assets/admin/js/payment/edit.js') !!}
    <script type="text/javascript">
        $(function() {
            var editor = new BrandEditor();
            editor.initForm();
        });
    </script>
@endsection
