@extends(tpl('admin._layout.base'))

@section('title', '如何到达')

@section('title-block')
<i class="icon_large icon_credit"></i>
<span>如何到达</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="location">如何到达</a></li>
@endsection 

@section('foot-assets')
    {!! script("third-party/jquery/jquery.validate.min.js")!!}
    {!! script("third-party/jquery/jquery.form.min.js")!!}
    {!! script("assets/admin/js/mallposition/edit.js")!!}
    <!-- CSS -->
    <script type="text/javascript">
        $(function () {
            var mall = new mallPositionIndex();

            mall.formInit();


            $("#maplink").click(function(){
        		var mall_name = $("#mall_name").val();
        		var mall_address = $("#mall_address").val();
				if(mall_name != ''){
					window.open('http://map.baidu.com/mobile/webapp/search/search/qt=s&wd='+mall_name+'&c=332&searchFlag=bigBox&version=5&exptype=dep/vt=map?from=singlemessage&isappinstalled=0&_mid=99','_blank');
				}else if(mall_address != ''){
					window.open('http://map.baidu.com/mobile/webapp/search/search/qt=s&wd='+mall_address+'&c=332&searchFlag=bigBox&version=5&exptype=dep/vt=map?from=singlemessage&isappinstalled=0&_mid=99','_blank');
				}
        	});
        });

    </script>
@endsection
@section('body-nest')
    <div class="nest">
        <div class="body_nest">
            <form action="mapupdate" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form_group row">
                    <label class="col-lg-2 control_label">商城名称：</label>

                    <div class="col-lg-6">
                        <input type="text" class="form_control" placeholder="不输入商城名称，默认搜索商城地址" id="mall_name" name="mall_name" value="{{$result->mall_name}}">
                    </div>
                </div>


                <div class="form_group row">
                    <label class="col-lg-2 control_label">商城地址：</label>

                    <div class="col-lg-6">
                        <input type="text" class="form_control" id="mall_address" name="mall_address" value="{{$result->mall_address}}">
                    </div>
                </div>
<!-- 
                <div class="form_group row">
                    <label class="col-lg-2 control_label">百度KEY：</label>

                    <div class="col-lg-6">
                        <input type="text" class="form_control" name="key" value="{{$result->key}}">
                    </div>
                </div>
 -->
                <!------------------------------ 弹出地图框设置---------------------------------------------->

                <div class="form_group row">
                    <label class="col-lg-2 control_label"></label>

                    <div class="col-lg-6">
                        <a id="maplink" href="javascript:void()" target="_blank">在地图中查看/设置</a><br/>
                    </div>
                </div>

                <!------------------------------ 弹出地图框设置---------------------------------------------->


                <div class="form_group row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-1">
                        <button class="btn btn_green">保存</button>
                    </div>
                    </div>
            </form>
        </div>


    </div>
@endsection