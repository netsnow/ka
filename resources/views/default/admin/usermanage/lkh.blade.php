@extends(tpl('admin._layout.base'))

@section('title', '充值')

@section('title-block')
<i class="icon_large icon_user2"></i>
<span>充值记录</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/usermanage">会员管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/usermanage/lkh/{{ $result['user']->user_id }}">充值记录</a></li>
<li class="back"><a class="btn btn_red" href="/admin/usermanage"><i class="icon_arrow_bold_left"></i>&nbsp;返回</a></li>
@endsection

@section('body-nest')
<div class="body_nest">
    <form method="post" class="main-form">
        <div class="col-lg-12 mb10"><label  >用户名：</label>{{$result['user']->phone}}</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
       
        <table id="responsive-example-table" class="table large-only">
            <tbody>
                <tr class="text-right">
                    <th>充值类型</th>
                    <th>充值金额</th>
                    <th >充值时间</th>
                    <th>操作员</th>
                </tr>
            @forelse ($result['history'] as $history)
                <tr>
                @if($history->charge_name == 'account')
                    <td>余额充值</td>
                @elseif($history->charge_name == 'other_account')
                    <td>优惠金充值</td>
                @else
                    <td>其他</td>
                @endif
                    <td>{{ $history->account}}</td>
                    <td>{{ $history->created_at}}</td>
                    <td>{{ $history->operator_name or '系统充值'}}</td>
                </tr>
            @empty
                <tr>
                    <td colSpan="5">没有数据</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </form>
</div><!-- /.body_nest -->
    <div class="table_bottom row">
        <form method="get" id="pagination">
            @if (Request::has('name'))
            <input type="hidden" name="name" value="{{ Request::input('name') }}">
            @endif
            <input type="hidden" name="page" value="1">
            <div class="pagination pull_right">
                @if (Request::has('name'))
                {!! $result['history']->appends(['name' => Request::input('name')])->render() !!}
                @else
                {!! $result['history']->render() !!}
                @endif
                <ul>
                    <li><span>共{{ $result['history']->lastPage() }}页({{ $result['history']->total() }}条)</span></li>
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
{!! script('/assets/admin/js/usermanage/index.js') !!}
<script type="text/javascript">
$(function() {
    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 1) {
        	$('#pagination input[name="page"]').val($('#page-num').val());
        }
    });

    var usermanage = new UserManageIndex();

    $(document).on('click', '#delete-selected', function() {
        usermanage.deleteSelected();
        return false;
    });

    $(document).on('click', '.delete-single', function() {
        usermanage.deleteSingle(this);
        return false;
    });
});
</script>
@endsection

