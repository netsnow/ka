@extends(tpl('admin._layout.base'))

@section('title', '商品管理')

@section('title-block')
<i class="icon_large icon_bookmark2"></i>
<span>商品管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/brand">商品管理</a></li>
@endsection

@section('body-nest')
<div class="body_nest radius">
    <div class="row table_control">
        <form method="get">
        <div class="col-lg-6 form_inline">
            <div class="form_group">
                <label class="control_label">商品名称：</label>
            </div>
            <div class="form_group">
                <input type="text" class="form_control" name="name" value="{{ Request::input('name') }}">
            </div>
            <div class="form_group">
                <button class="btn btn_green"><i class="icon-search3 white"></i>&nbsp;查找&nbsp;</button>
            </div>
        </div>
        </form>

        <div class="col-lg-2 pull_right text_right">
            <a href="/admin/brand/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加商品&nbsp;</a>
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
                <th width="30%">商品名称</th>
                <th width="15%">LOGO</th>

                <th>排序</th>
                <th width="20%">操作</th>
            </tr>
            @forelse ($result['brands'] as $brand)
            <tr>
                <td>
                    <div class="icheckbox_red">
                        <input tabindex="13" type="checkbox" name="brand_id[]" value="{{ $brand->brand_id }}">
                    </div>
                </td>
                <td>{{ $brand->brand_name }}</td>
                <td class="logo"><img src="{{ $brand->brand_logo }}"></td>

                <td>{{ $brand->sort_order }}</td>
                <td>
                    <a href="/admin/brand/edit/{{ $brand->brand_id }}" class="btn btn_blue"><i class="icon-pencil white"></i> 编辑</a>
                    <a class="btn btn_red delete-single" data-id="{{ $brand->brand_id }}"><i class="icon-icon-bin white"></i> 删除</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colSpan="5">没有商品数据</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="table_bottom row">
        <div class="pull_left"><button class="btn btn_red" id="delete-selected"><i class="icon-icon-bin white"></i> 删除选中项</button></div>
        <form method="get" id="pagination">
            @if (Request::has('name'))
            <input type="hidden" name="name" value="{{ Request::input('name') }}">
            @endif
            <input type="hidden" name="page" value="1">
            <div class="pagination pull_right">
                @if (Request::has('name'))
                {!! $result['brands']->appends(['name' => Request::input('name')])->render() !!}
                @else
                {!! $result['brands']->render() !!}
                @endif
                <ul>
                    <li><span>共{{ $result['brands']->lastPage() }}页({{ $result['brands']->total() }}条)</span></li>
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
{!! script('/assets/admin/js/brand/index.js') !!}
<script type="text/javascript">
$(function() {
    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 1) {
           // $('#pagination input[name="page"]').val($('#page-num').val());
            alert($('#page-num').val());
        }
    });

    var brand = new BrandIndex();

    $(document).on('click', '#delete-selected', function() {
        brand.deleteSelected();
        return false;
    });

    $(document).on('click', '.delete-single', function() {
        brand.deleteSingle(this);
        return false;
    });
});
</script>
@endsection
