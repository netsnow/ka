@extends(tpl('admin._layout.base'))

@section('title', '事件管理')

@section('title-block')
<i class="icon_large icon_image"></i>
<span>事件管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/fact">事件管理</a></li>
@endsection

@section('body-nest')
<div class="body_nest radius">
    <div class="row table_control">
        <form method="get">
        <div class="col-lg-6 form_inline">
            <div class="form_group">
                <label class="control_label">事件名称：</label>
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
            <a href="/admin/fact/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加事件&nbsp;</a>
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
                <th width="30%">事件名称</th>

                <th>价格</th>
                <th width="20%">操作</th>
            </tr>
            @forelse ($result['facts'] as $fact)
            <tr>
                <td>
                    <div class="icheckbox_red">
                        <input tabindex="13" type="checkbox" name="fact_id[]" value="{{ $fact->fact_id }}">
                    </div>
                </td>
                <td>{{ $fact->fact_name }}</td>
                <td>{{ $fact->fact_price }}</td>
                <td>
                    <a href="/admin/fact/edit/{{ $fact->fact_id }}" class="btn btn_blue"><i class="icon-pencil white"></i> 编辑</a>
                    <a class="btn btn_red delete-single" data-id="{{ $fact->fact_id }}"><i class="icon-icon-bin white"></i> 删除</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colSpan="5">没有品牌数据</td>
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
            <input type="hidden" name="page" value="{{ Request::input('page') or 1 }}">
            <div class="pagination pull_right">
                @if (Request::has('name'))
                {!! $result['facts']->appends(['name' => Request::input('name')])->render() !!}
                @else
                {!! $result['facts']->render() !!}
                @endif
                <ul>
                    <li><span>共{{ $result['facts']->lastPage() }}页({{ $result['facts']->total() }}条)</span></li>
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
{!! script('/assets/admin/js/fact/index.js') !!}

<script type="text/javascript">

$(function() {
    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 1) {
            $('#pagination input[name="page"]').val($('#page-num').val());
        }
    });

    var fact = new FactIndex();

    $(document).on('click', '#delete-selected', function() {
        fact.deleteSelected();
        return false;
    });

    $(document).on('click', '.delete-single', function() {
        fact.deleteSingle(this);
        return false;
    });
});
</script>
@endsection
