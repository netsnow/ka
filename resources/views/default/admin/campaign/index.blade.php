@extends(tpl('admin._layout.base'))

@section('title', '活动管理')

@section('title-block')
<i class="icon_large icon_bookmark2"></i>
<span>活动管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/campaign">活动管理</a></li>
@endsection

@section('body-nest')
    <div class="body_nest radius">
        <div class="row table_control">
            <form method="get">
                <div class="col-lg-6 form_inline">
                    <div class="form_group">
                        <label class="control_label">标题：</label>
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
                <a href="/admin/campaign/add" class="btn btn_green"><i class="icon_plus2 white"></i>&nbsp;添加活动&nbsp;</a>
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
                <th width="5%">ID</th>
                <th width="90">文章标题</th>
                <th width="14%">图片</th>
                <th width="">链接</th>
                <th width="5%">显示</th>
                <th width="15%">活动时间</th>
                <th width="15%">添加时间</th>
                <th width="5%">排序</th>

                <th width="20%">操作</th>
            </tr>
            @forelse ($result['campaign'] as $campaign)
                <tr>
                    <td>
                        <div class="icheckbox_red">
                            <input tabindex="13" type="checkbox" name="campaign_id[]" value="{{ $campaign->campaign_id }}">
                        </div>
                    </td>
                    <td>{{ $campaign->campaign_id }}</td>
                    <td>{{ $campaign->title }}</td>
                    <td class="logo"><img src="{{ $campaign->cover_image }}"></td>
                    <td>
                        <a href="/campaign/detail/{{ $campaign->campaign_id }}">http://weshop.com/campaign/detail/{{ $campaign->campaign_id }}</a>
                    </td>
                    <td>
                        @if($campaign->is_show==1)  是
                        @else  否
                        @endif
                    </td>
                    <td>{{ $campaign->campaign_timestart }} <br />至<br /> {{ $campaign->campaign_timeend }}</td>
                    <td>{{ $campaign->created_at->format('Y-m-d') }}<br /> {{ $campaign->created_at->format('H:i:s') }}</td>
                    <td>{{ $campaign->sort_order }}</td>
                    <td>
                        <a href="/admin/campaign/edit/{{ $campaign->campaign_id }}" class="btn btn_blue"><i class="icon-pencil white"></i> 编辑</a>
                        <a class="btn btn_red delete-single" data-id="{{ $campaign->campaign_id }}"><i class="icon-icon-bin white"></i> 删除</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colSpan="5">没有活动数据</td>
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
                        {!! $result['campaign']->appends(['name' => Request::input('name')])->render() !!}
                    @else
                        {!! $result['campaign']->render() !!}
                    @endif
                    <ul>
                        <li><span>共{{ $result['campaign']->lastPage() }}页({{ $result['campaign']->total() }}条)</span></li>
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
{!! script('/assets/admin/js/campaign/index.js') !!}
<script type="text/javascript">
$(function() {
    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 1) {
            $('#pagination input[name="page"]').val($('#page-num').val());
           // alert($('#page-num').val());
        }
    });

    var campaign = new CampaignIndex();

    $(document).on('click', '#delete-selected', function() {
        campaign.deleteSelected();
        return false;
    });

    $(document).on('click', '.delete-single', function() {
        campaign.deleteSingle(this);
        return false;
    });
});
</script>
@endsection
