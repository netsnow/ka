@extends(tpl('admin._layout.base'))

@section('title', '计费管理')

@section('title-block')
    <i class="icon_large icon_credit"></i>
    <span>计费管理</span>
@endsection

@section('breadcrumb')
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/charging">计费管理</a></li>
@endsection

@section('body-nest')
    <div class="body_nest radius">
    <div class="row table_control">
        <form method="get">
        <div class="col-lg-12 form_inline text_right mb10">
            <div class="form_group">
                <label class="control_label">超分钟数：</label>
            </div>
            <div class="form_group mr20">
                <input type="text" class="form_control" name="minute" value="{{ Request::input('minute') }}">
            </div>
            <div class="form_group">
                <button class="btn btn_green"><i class="icon-search3 white"></i>&nbsp;查询&nbsp;</button>
            </div>
        </div>
        </form>
    </div>
    
        <table id="responsive-example-table" class="table large-only">
            <tbody>
            <tr class="text-right">
                <th>用户卡号</th>
                <th width="15%">用户姓名</th>
                <th width="20%">开始时间</th>
                <th width="20%">结束时间</th>
                <th width="15%">事件名称</th>
                <th width="15%">价格(元/{{ LIMIT_CHARGING_PRICE }}分钟)</th>
            </tr>
            @forelse ($result['chargings'] as $charging)
                <tr>
                   
                     <td>{{ $charging->UserManage->card_num }}</td>
                      @if(isset($charging->UserManage->real_name ))
                    <td>{{ $charging->UserManage->real_name }}</td>
                    @else
                     <td>无</td>
                     @endif
                    <td>{{ $charging->start_time }}</td>
                    <td>{{ $charging->end_time }}</td>
                    @if(isset($charging->charging_type_name ))
                     <td>{{ $charging->charging_type_name }}</td>
                     @else
                     <td>无</td>
                     @endif
                      @if(isset($charging->charging_price ))
                    <td>{{ $charging->charging_price }}</td>
                    @else
                     <td>无价格</td>
                     @endif
                </tr>
            @empty
                <tr>
                    <td colSpan="6">没有计费管理数据</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    <div class="table_bottom row">
        <form method="get" id="pagination">
        @if (Request::has('minute'))
            <input type="hidden" name="minute" value="{{ Request::input('minute') }}">
        @endif 
        
            <input type="hidden" name="page" value="1">
            <div class="pagination pull_right">
                @if (Request::has('minute'))
                {!! $result['chargings']->appends(['minute' => Request::input('minute')])->render() !!}
                @else
                {!! $result['chargings']->render() !!}
                @endif
                <ul>
                    <li><span>共{{ $result['chargings']->lastPage() }}页({{ $result['chargings']->total() }}条)</span></li>
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
{!! script('/assets/admin/js/charging/index.js') !!}

<script type="text/javascript">

$(function() {
    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 1) {
            $('#pagination input[name="page"]').val($('#page-num').val());
        }
    });
});
</script>
@endsection
