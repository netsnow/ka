@extends(tpl('admin._layout.base'))

@section('title', '账户管理')

@section('title-block')
<i class="icon_large icon_user2"></i>
<span>账户管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/usermanage">账户管理</a></li>
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/company">企业账户</a></li>
@endsection

@section('body-nest')
<div class="title">
    <a href="/admin/usermanage">&nbsp;会员账户&nbsp;</a>
    <a href="/admin/company" class="selected">&nbsp;企业账户&nbsp;</a>
    <div class="clear"></div>
</div>
<div class="body_nest radius">
    <div class="row">
        <form method="get">
            <div class="col-lg-7 form_inline mb10">
                <div class="form_group">
                    <label class="control_label">企业名称：</label>
                </div>
                <div class="form_group mr20">
                    <input type="text" class="form_control" name="name" value="{{ Request::input('name') }}">
                </div>
                <div class="form_group">
                    <button class="btn btn_green"><i class="icon-search3 white"></i>&nbsp;查找&nbsp;</button>
                </div>
            </div>
        </form>
        <div class="pull_right text_right mb10">
            <a href="/admin/company/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加企业&nbsp;</a>
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
                <th >企业名称</th>
                <th >企业简介</th>
                <th >注册时间</th>
                <th width="20%">操作</th>
            </tr>
            @forelse ($result['company'] as $company)
            <tr>
                <td>
                    <div class="icheckbox_red">
                        <input tabindex="13" type="checkbox" name="company_id[]" value="{{ $company->company_id}}">
                    </div>
                </td>
                <td>{{ $company->company_name}}</td>
                <td>{{ $company->company_information}}</td>
                <td>{{ $company->created_at}}</td>           
                <td>
                    <a href="/admin/company/edit/{{  $company->company_id }}" class="btn btn_blue"><i class="icon-pencil white"></i> 编辑</a>
                    <a class="btn btn_red delete-single" data-id="{{  $company->company_id }}"><i class="icon-icon-bin white"></i> 删除</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colSpan="5">没有数据</td>
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
                {!! $result['company']->appends(['name' => Request::input('name')])->render() !!}
                @else
                {!! $result['company']->render() !!}
                @endif
                <ul>
                    <li><span>共{{ $result['company']->lastPage() }}页({{ $result['company']->total() }}条)</span></li>
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
{!! script('/assets/admin/js/company/company_index.js') !!}
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
