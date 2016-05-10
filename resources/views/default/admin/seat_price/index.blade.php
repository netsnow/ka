@extends(tpl('admin._layout.base'))

@section('title', '工位定价')

@section('title-block')
<i class="icon_large icon_pencil"></i>
<span>工位定价</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/seat_price">工位定价</a></li>
@endsection

@section('body-nest')
<div class="body_nest radius">
    <div class="row table_control">
        <!-- <form method="get">
        <div class="col-lg-12 form_inline text_right mb10">
            <div class="form_group">
                <label class="control_label">工位类型：</label>
            </div>
            <div class="form_group mr20">
                <input type="text" class="form_control" name="name" value="{{ Request::input('name') }}">
            </div>
            <div class="form_group">
                <button class="btn btn_green"><i class="icon-search3 white"></i>&nbsp;查找&nbsp;</button>
            </div>
        </div>
        </form> -->
        <div class="col-lg-2 pull_right text_right">
            <a href="/admin/seat_price/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加工位类型&nbsp;</a>
        </div>
    </div>

    <table id="responsive-example-table" class="table large-only">
        <tbody>
            <tr class="text-right">
                <!-- <th width="10">
                    <div class="icheckbox_red checkAll">
                        <input tabindex="13" type="checkbox" id="checkbox01">
                    </div>
                </th> -->
                <th width="20%">工位类型</th>
                <th>价格(元/30天)</th>
                <th width="30%">操作</th>
            </tr>
            @forelse ($result['seat_prices'] as $seat_price)
            <tr>
                <!-- <td>
                    <div class="icheckbox_red">
                        <input tabindex="13" type="checkbox" name="seat_price_id[]" value="{{ $seat_price->seat_type_id }}">
                    </div>
                </td> -->
                <td>{{ $seat_price->seat_type_name }}</td>
                <td>{{ $seat_price->seat_price }}</td>
                <td>
                    <a href="/admin/seat_price/edit/{{ $seat_price->seat_type_id }}" class="btn btn_blue"><i class="icon-pencil white"></i> 编辑</a>
                    <a class="btn btn_red delete-single" data-id="{{ $seat_price->seat_type_id }}"><i class="icon-icon-bin white"></i> 删除</a>
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
                {!! $result['seat_prices']->appends(['name' => Request::input('name')])->render() !!}
                @else
                {!! $result['seat_prices']->render() !!}
                @endif
                <ul>
                    <li><span>共{{ $result['seat_prices']->lastPage() }}页({{ $result['seat_prices']->total() }}条)</span></li>
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
{!! script('/assets/admin/js/seat_price/index.js') !!}

<script type="text/javascript">

$(function() {
    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 1) {
            $('#pagination input[name="page"]').val($('#page-num').val());
        }
    });

    var seat_price = new Seat_priceIndex();

    $(document).on('click', '#delete-selected', function() {
    	seat_price.deleteSelected();
        return false;
    });

    $(document).on('click', '.delete-single', function() {
    	seat_price.deleteSingle(this);
        return false;
    });
});
</script>
@endsection
