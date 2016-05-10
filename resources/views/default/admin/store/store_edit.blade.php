@extends(tpl('admin._layout.base'))

@section('title', '编辑店铺')

@section('title-block')
<i class='icon_large icon_bookmark2'></i>
<span>编辑店铺</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/store">店铺管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
@if (isset($StoreInfo['content']->store_id))
<li><a href="/admin/store/edit/{{ $StoreInfo['content']->store_id }}">编辑店铺</a></li>
@else
<li><a href="/admin/store/add">添加店铺</a></li>
@endif
<li class="back"><a class="btn btn_red" href="/admin/store"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest">
  <form method="post" class="main-form">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form_group row">
    <label class="col-lg-2 control_label"><span class="must">*</span>店铺名称：</label>
    <div class="col-lg-6">
      <input type="text" name="store_name" class="form_control" value="{{ $StoreInfo['content']->store_name or '' }}">
    </div>
  </div>
<div class="form_group row">
 
    <label class="col-lg-2 control_label"><span class="must">*</span>用户名：</label>
    
    <div class="col-lg-6" id="user_name1">
    @if(isset($StoreInfo['user']))
    @forelse ($StoreInfo['user'] as $user)
      <input type="text" name="user_name" class="form_control" id="user_name" value="{{ $user->user_name }}">   
       @empty
        <input type="text" name="user_name" class="form_control" id="user_name" value="">   
    @endforelse
    @else
    <input type="text" name="user_name" class="form_control" id="user_name" value="">   
    @endif
    </div>
  </div>
  <div class="form_group row">
    <label class="col-lg-2 control_label">店主名：</label>
    <div class="col-lg-6">
      <input type="text" name="owner_name" onFocus="check()" class="form_control" value="{{ $StoreInfo['content']->owner_name or '' }}">
    </div>
  </div>

  <div class="form_group row">
    <label class="col-lg-2 control_label"><span class="must">*</span>联系电话：</label>
    <div class="col-lg-6">
      <input type="text" name="tel" class="form_control" value="{{ $StoreInfo['content']->tel or '' }}">
    </div>
  </div>

  <div class="form_group row">
    <label class="col-lg-2 control_label"><span class="must">*</span>经营范围：</label>
    <div class="col-lg-4 control_select btn_group">
      <button data-toggle="d ropdown" class="btn dropdown_toggle" type="button"> <span class="txt default">请选择</span> <span class="icon_triangle_down"></span> </button>
      <ul role="menu" class="dropdown_menu">
        <li><a href="javascript:selectCategory();" name="menu" class="default">请选择</a></li>
        <li class="divider"></li>
        {!! $StoreInfo['categoriesHTML'] !!}
      </ul>
      <div class="tag_block category_block">
        @if (isset($StoreInfo['currentCategory']))
        @foreach ($StoreInfo['currentCategory'] as $category)
        <span class="label">{{ $category->cat_name }}<i onclick="$(this).parents('.label').remove();" class="icon_x2 white ml10 close_tag"></i><input type="hidden" name="currentCategory[]" value="{{ $category->cat_id }}"></span>
        @endforeach
        @endif
      </div>
    </div>
    <div class="col-lg-1">
      <a href="#" class="btn btn_green add_tag"><i class="icon_plus2 white"></i>&nbsp;添加&nbsp;</a>
    </div>
    <input type="hidden" id="sName" value="currentCategory"/>
    <input type="hidden" id="currentCategory" value=""/>
  </div>

  <div class="form_group row">
    <label class="col-lg-2 control_label"><span class="must">*</span>经营品牌：</label>
    <div class="col-lg-4 control_select btn_group">
      <button data-toggle="d ropdown" class="btn dropdown_toggle" type="button"> <span class="txt default">请选择</span> <span class="icon_triangle_down"></span> </button>
      <ul role="menu" class="dropdown_menu">
        <li><a href="javascript:selectBrand();" name="menu" class="default">请选择</a></li>
        <li class="divider"></li>
        @foreach ($StoreInfo['brands'] as $brand)
        <li><a href="javascript:selectBrand('{{ $brand->brand_id }}');" name="menu01">{{ $brand->brand_name }}</a></li>
        @endforeach
      </ul>
      <div class="tag_block brand_block">
        @if (isset($StoreInfo['currentBrand']))
        @foreach ($StoreInfo['currentBrand'] as $brand)
        <span class="label">{{ $brand->brand_name }}<i onclick="$(this).parents('.label').remove();" class="icon_x2 white ml10 close_tag"></i><input type="hidden" name="currentBrand[]" value="{{ $brand->brand_id }}"></span>
        @endforeach
        @endif
      </div>
    </div>
    <div class="col-lg-1">
      <a href="#" class="btn btn_blue add_tag"><i class="icon_plus2 white"></i>&nbsp;添加&nbsp;</a>
    </div>
    <input type="hidden" id="sName" value="currentBrand"/>
    <input type="hidden" id="currentBrand" value=""/>
  </div>

  <div class="form_group row">
    <label class="col-lg-2 control_label"><span class="must">*</span>店铺介绍：</label>
    <div class="col-lg-6">
      <script type="text/plain" id="myEditor" style="width:100%;height:240px;">{!! $StoreInfo['content']->description or "" !!}</script>
      <input type="text" id="description" name="description" style="position:fixed;" value=""/>
    </div>
  </div>

  <div class="form_group row">
    <label class="col-lg-2 control_label"><span class="must">*</span>上传店铺LOGO：</label>
    <div class="col-lg-2">
      <label class="uploader">
        <span><i class="icon_image white"></i>&nbsp;点击上传图片</span>
        <input type="file"  accept="image/*"  name="storeLogo" multiple title="Click to add Files">
      </label>
      @if (isset($StoreInfo['content']->store_id))
      <div class="img_view"><a class="focus"><img src="{{ $StoreInfo['content']->store_logo }}"></a></div>
      @endif
    </div>
  </div>

  <div class="form_group row">
    <label class="col-lg-2 control_label"><span class="must">*</span>上传店铺背景图：</label>
    <div class="col-lg-2">
      <label class="uploader">
        <span><i class="icon_image white"></i>&nbsp;点击上传图片</span>
        <input type="file" accept="image/*"  name="storeBG" multiple title="Click to add Files">
      </label>
      @if (isset($StoreInfo['content']->store_id))
      <div class="img_view"><a class="focus"><img src="{{ $StoreInfo['content']->store_banner }}"></a></div>
      @endif
    </div>
  </div>

  <div class="form_group row">
    <label class="col-lg-2 control_label"><span class="must">*</span>排序：</label>
    <div class="col-lg-6">
      <input type="text" name="sort_order" class="form_control" value="{{ $StoreInfo['content']->sort_order or '0' }}">
    </div>
  </div>

  <div class="form_group row">
    <label class="col-lg-2 control_label">是否显示：</label>
    <ul class="form radioGroup col-lg-10 clearfix mt5">
      @if ( !isset($StoreInfo['content']->is_show) || $StoreInfo['content']->is_show == 1)
      <li class="clearfix">
        <div class="iradio_red  checked">
          <input tabindex="13" type="radio" id="radio01" name="isShow" value="1" checked>
        </div>
        <label for="radio01" class="">显示</label>
      </li>
      <li class="clearfix">
        <div class="iradio_red">
          <input tabindex="13" type="radio" id="radio02" name="isShow" value="0">
        </div>
        <label for="radio02" class="">不显示</label>
      </li>
      @else
      <li class="clearfix">
        <div class="iradio_red">
          <input tabindex="13" type="radio" id="radio01" name="isShow" value="1">
        </div>
        <label for="radio01" class="">显示</label>
      </li>
      <li class="clearfix">
        <div class="iradio_red checked">
          <input tabindex="13" type="radio" id="radio02" name="isShow" value="0" checked>
        </div>
        <label for="radio02" class="">不显示</label>
      </li>
      @endif
    </ul>
  </div>

  <div class="form_group row"> 
    <div class="col-lg-2"></div>
    <div class="col-lg-1">
      <button class="btn btn_green" id='but'>提交</button>
    </div>
    <div>
      <button class="btn btn_default" onclick="javascript:reset();">重置</button>
    </div>
  </div>
  </form>
</div>
@endsection

@section('custom-styles')
<style>
    .dropdown_menu {
        min-width: 300px;
        z-index:1001;
    }
    .dropdown_menu li a {
        display: block;
        text-decoration: none!important;
        color: #666!important;
        padding: 10px 20px;
    }
    .dropdown_menu li a:hover {
        background: #f0f0f0;
    }
    .dropdown_menu li > ul {
        padding-left: 20px;
    }
</style>
@endsection

@section('foot-assets')
<link rel="stylesheet" href="/third-party/umeditor/themes/default/css/umeditor.css">

{!! script('/third-party/jquery-validate/jquery.validate.min.js') !!}
{!! script('/third-party/jquery-validate/additional-methods.min.js') !!}
{!! script('/third-party/jquery-form/jquery.form.min.js') !!}
{!! script('/third-party/umeditor/umeditor.config.js') !!}
{!! script('/third-party/umeditor/umeditor.min.js') !!}
{!! script('/third-party/umeditor/lang/zh-cn/zh-cn.js') !!}
{!! script('/assets/admin/js/store/edit.js') !!}

<script type="text/javascript">
$(document).ready(function(){
    //实例化编辑器
    var um = UM.getEditor('myEditor');
    var editForm = new StoreEdit();
    editForm.initForm();
});

function selectCategory(index)
{
    $('#currentCategory').val(index);
}
function selectBrand(index)
{
    $('#currentBrand').val(index);
}
function check()
{
	//StoreEdit.usernameCheck();
	var name=$('#user_name').val()
	var data = {
       user_name: name,
       _token  : $('#csrfToken').val()    
    };
	  $.post('/admin/store/check', data, function(response) {
	    if(response.message=="2")
	    {		 
	    	document.getElementById("user_name1").innerHTML = "";
	    	document.getElementById("user_name1").innerHTML +='<input type="text" name="user_name" class="form_control" id="user_name" value="'+name+'">   ';
	    	document.getElementById("user_name1").innerHTML += '<label id="tel-error" class="error errorAlert left" for="tel">该用户已有商店</label>';	    	
	    	document.getElementById("but").disabled=true; 
		    }
	    if(response.message=="1"){
	    	document.getElementById("user_name1").innerHTML = "";
	    	document.getElementById("user_name1").innerHTML +='<input type="text" name="user_name" class="form_control" id="user_name" value="'+name+'">   ';
	    	document.getElementById("user_name1").innerHTML += '<label id="tel-error" class="error errorAlert left" for="tel">该用户不存在</label>';	    			 
	    	document.getElementById("but").disabled=true; 
		    }
	    if(response.message=="0"){
	    	document.getElementById("user_name1").innerHTML = "";
	    	document.getElementById("user_name1").innerHTML +='<input type="text" name="user_name" class="form_control" id="user_name" value="'+name+'">   ';	    	
	    	document.getElementById("but").disabled=false; 
	 	    }
		    })
}

function reset()
{
  window.location.reload();
}

</script>
@endsection
