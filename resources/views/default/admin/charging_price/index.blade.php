@extends(tpl('admin._layout.base'))

@section('title', '计费定价')

@section('title-block')
<i class="icon_large icon_pencil"></i>
<span>计费定价</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/charging_price">计费定价</a></li>
@endsection

@section('body-nest')
<div class="body_nest radius">
    <!-- <div class="row table_control">
        <form method="get">
        <div class="col-lg-12 form_inline text_right mb10">
            <div class="form_group">
                <label class="control_label">事件名称：</label>
            </div>
            <div class="form_group mr20">
                <input type="text" class="form_control" name="name" value="{{ Request::input('name') }}">
            </div>
            <div class="form_group">
                <button class="btn btn_green"><i class="icon-search3 white"></i>&nbsp;查找&nbsp;</button>
            </div>
        </div>
        </form>
        <div class="col-lg-2 pull_right text_right">
            <a href="/admin/charging_price/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加事件&nbsp;</a>
        </div>
    </div> -->

    <table id="responsive-example-table" class="table large-only">
        <tbody>
            <tr class="text-right">
                <!-- <th width="10">
                    <div class="icheckbox_red checkAll">
                        <input tabindex="13" type="checkbox" id="checkbox01">
                    </div>
                </th> -->
                <th width="20%">事件名称</th>
                <th>价格(元/{{ LIMIT_CHARGING_PRICE }}分钟)</th>
                <th width="40%">简介</th>
                <th width="20%">操作</th>
            </tr>
            @forelse ($result['charging_prices'] as $charging_price)
            <tr>
                <!-- <td>
                    <div class="icheckbox_red">
                        <input tabindex="13" type="checkbox" name="charging_price_id[]" value="{{ $charging_price->charging_type_id }}">
                    </div>
                </td> -->
                <td>{{ $charging_price->charging_type_name }}</td>
                <td>{{ $charging_price->charging_price }}</td>
                <td>{{ $charging_price->describe }}</td>
                <td>
                    <a href="/admin/charging_price/edit/{{ $charging_price->charging_type_id }}" class="btn btn_blue"><i class="icon-pencil white"></i> 编辑</a>
                    <a href="/admin/charging_price/bundcardid/{{ $charging_price->charging_type_id }}" class="btn btn_blue"><i class="icon-pencil white"></i> 绑定卡机</a>
                    <!-- <a class="btn btn_red delete-single" data-id="{{ $charging_price->charging_type_id }}"><i class="icon-icon-bin white"></i> 删除</a> -->
                </td>
            </tr>
            @empty
            <tr>
                <td colSpan="5">没有事件数据</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="table_bottom row">
        <!-- <div class="pull_left"><button class="btn btn_red" id="delete-selected"><i class="icon-icon-bin white"></i> 删除选中项</button></div> -->
        <form method="get" id="pagination">
            @if (Request::has('name'))
            <input type="hidden" name="name" value="{{ Request::input('name') }}">
            @endif
            <input type="hidden" name="page" value="{{ Request::input('page') or 1 }}">
            <div class="pagination pull_right">
                @if (Request::has('name'))
                {!! $result['charging_prices']->appends(['name' => Request::input('name')])->render() !!}
                @else
                {!! $result['charging_prices']->render() !!}
                @endif
                <ul>
                    <li><span>共{{ $result['charging_prices']->lastPage() }}页({{ $result['charging_prices']->total() }}条)</span></li>
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
{!! script('/assets/admin/js/charging_price/index.js') !!}

<script type="text/javascript">

$(function() {
    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 1) {
            $('#pagination input[name="page"]').val($('#page-num').val());
        }
    });

    var charging_price = new Charging_priceIndex();

    $(document).on('click', '#delete-selected', function() {
        charging_price.deleteSelected();
        return false;
    });

    $(document).on('click', '.delete-single', function() {
        charging_price.deleteSingle(this);
        return false;
    });
});
</script>
@endsection
