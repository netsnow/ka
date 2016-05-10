@extends(tpl('admin._layout.base'))

@section('title', '账号管理')

@section('title-block')
<i class="icon_large icon_user2"></i>
<span>账号管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/usermanage">账号管理</a></li>
@endsection

@section('body-nest')
<div class="title">
    <a href="/admin/usermanage">&nbsp;教师账号&nbsp;</a>
    <a href="/admin/studentmanage" class="selected">&nbsp;学生账号&nbsp;</a>
    <a href="/admin/company">&nbsp;班级管理&nbsp;</a>
    <div class="clear"></div>
</div>
<div class="body_nest radius">
    <div class="row">
        <form method="get">
            <div class="pull_left form_inline mb10">
                <div class="form_group">
                    <label class="control_label">卡号：</label>
                </div>
                <div class="form_group mr20">
                    <input type="text" class="form_control" name="name" value="{{ Request::input('name') }}">
                </div>
                <div class="form_group">
                    <button class="btn btn_green"><i class="icon-search3 white"></i>&nbsp;查找&nbsp;</button>
                </div>
            </div>
        </form>
        <div class="pull_right mb10">
            <a href="/admin/studentmanage/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加学生&nbsp;</a>
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
                <th >学号</th>
                <th >姓名</th>
                <!-- <th >注册时间</th>
                <th >账户余额</th>
                <th>优惠金余额</th> -->
                <th >班级</th>
                <th width="20%">操作</th>
            </tr>
            @forelse ($result['students'] as $student)
            <tr>
                <td>
                    <div class="icheckbox_red">
                        <input tabindex="13" type="checkbox" name="student_id[]" value="{{ $student->student_id}}">
                    </div>
                </td>
                <td>{{ $student->phone}}</td>
                @if($student->role_id == 1 && $student->real_name != '')
                <td>{{ $student->real_name}}(管理员{{ $student->student_name}})</td>
                @elseif($student->role_id == 1 && $student->real_name == '')
                <td>管理员{{ $student->student_name}}</td>
                @else
                <td>{{ $student->real_name}}</td>
                @endif
                <!-- <td>{{ $user->created_at}}</td>
                <td>{{ $user->account or '0.00 '}}</td>
                <td>{{$user->other_account or '0.00'}}</td> -->
                <td>{{ $student->company_name }}</td>
                <td>
                    <!-- <a href="/admin/usermanage/recharge/{{  $user->user_id }}" class="btn btn_green"><i class="icon-pencil white"></i> 充值</a> -->
                    <a href="/admin/studentmanage/edit/{{ $student->student_id }}" class="btn btn_blue"><i class="icon-pencil white"></i> 编辑</a>
                    <a class="btn btn_red delete-single" data-id="{{ $student->student_id }}"><i class="icon-icon-bin white"></i> 删除</a>
                    <!-- <a href="/admin/usermanage/lkh/{{ $user->user_id }}" class="btn btn_pink"><i class="icon-pencil white"></i> 查看充值记录</a> -->
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
                {!! $result['students']->appends(['name' => Request::input('name')])->render() !!}
                @else
                {!! $result['students']->render() !!}
                @endif
                <ul>
                    <li><span>共{{ $result['students']->lastPage() }}页({{ $result['students']->total() }}条)</span></li>
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
