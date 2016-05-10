@extends(tpl('admin._layout.base'))

@section('title', '商品管理')

@section('title-block')
<i class="icon_large icon_bookmark2"></i>
<span>商品管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/goods">商品管理</a></li>
@endsection

@section('body-nest')
<div class="body_nest radius">
    <div class="row table_control">
        <form method="get">
        <div class="col-lg-12 form_inline">
            <div class="form_group">
                <label class="control_label">商品名称：</label>
            </div>
            <div class="form_group">
                <input type="text" class="form_control" name="goods_name" value="{{ Request::input('goods_name') }}">
            </div>
            <div class="form_group">
                <button class="btn btn_green"><i class="icon-search3 white"></i>&nbsp;查找&nbsp;</button>                                                 
            </div> 
        </div>
        </form> 
         <div class="mr20 pull_right text_right">
            <a href="/admin/goods/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加商品&nbsp;</a>
        </div> 
    </div>

    <table id="responsive-example-table" class="table large-only">
        <tbody>
            <tr class="text-right">
                <th width="10">
                    <div class="icheckbox_red checkAll">
                        <input tabindex="13" type="checkbox" id="checkbox01">
                    </div>
                </th>
                <th width="20%">商品名称</th>
                <th width="22%">商品图片</th>
                <th width="20%">价格</th>
                <th width="18%">商店名称</th>
                <th width="20%">操作</th>
            </tr>
             @forelse ($result['goods'] as $goods)
            <tr>
                 <td>
                    <div class="icheckbox_red">
                        <input tabindex="13" type="checkbox" name="goods_id[]" value="{{ $goods->goods_id }}">
                    </div>
                </td>
                <td>{{ $goods->goods_name }}</td>
                <td class="logo" ><img style="width:50px" src="{{ $goods->goods_img }}"></td>
                <td>{{ $goods->price }}</td>
                <td>{{ $goods->store_name }}</td>
                <td>
                    <a class="btn btn_red delete-single" data-id="{{ $goods->goods_id }}"><i class="icon-icon-bin white"></i> 删除</a>
                    <a href="/admin/goods/edit/{{  $goods->goods_id }}" class="btn btn_blue"><i class="icon-pencil white"></i> 编辑</a>
                    <a href="/admin/goods/copy/{{  $goods->goods_id }}" class="btn btn_green"><i class="icon-pencil white"></i> 复制</a>
                </td>
            </tr>
             @empty
            <tr>
                <td colSpan="9">没有商品数据</td>
            </tr>
             @endforelse
        </tbody>
    </table>

    <div class="table_bottom row">
        <div class="pull_left"><button class="btn btn_red" id="delete-selected"><i class="icon-icon-bin white"></i> 删除选中项</button></div>
        <form method="get" id="pagination">
            @if (Request::has('goods_name'))
            <input type="hidden" name="goods_name" value="{{ Request::input('goods_name') }}">
            @endif
            @if (Request::has('goods_img'))
            <input type="hidden" name="goods_img" value="{{ Request::input('goods_img') }}">
            @endif
            @if (Request::has('price'))
            <input type="hidden" name="price" value="{{ Request::input('price') }}">
            @endif
            <input type="hidden" name="page" value="1">
            
            <div class="pagination pull_right">
                @if (Request::has('goods_name')||Request::has('goods_img')||Request::has('price'))
                {!! $result['goods']->appends(['goods_name' => Request::input('goods_name'),'goods_img' => Request::input('goods_img'),'price' => Request::input('price')])->render() !!}
                @else
                {!! $result['goods']->render() !!}
                @endif
                <ul>
                    <li><span>共{{ $result['goods']->lastPage() }}页({{ $result['goods']->total() }}条)</span></li>
                    <li><span class="page_go_txtl">跳转到第</span></li>
                    <li><span class="page_go"><input type="text" id="page-num"></span></li>
                    <li><span class="total-page">页</span></li>
                    <li><button href="javascript:void(0);" class="gopage">GO</button></li>
                </ul>
            </div>
        </form>
    </div>
</div>
@endsection

@section('foot-assets')
{!! script('/assets/admin/js/goods/index.js') !!}
<script type="text/javascript">
$(function() {
    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 1) {
            $('#pagination input[name="page"]').val($('#page-num').val());
        }
    });

    var goods = new GoodsIndex();

    $(document).on('click', '#delete-selected', function() {
        goods.deleteSelected();
        return false;
    });

    $(document).on('click', '.delete-single', function() {
        
        goods.deleteSingle(this);
        return false;
    });
});
</script>
@endsection
