@extends(tpl('admin._layout.base'))

@section('title', '卡机管理')

@section('title-block')
<i class="icon_large icon_shop"></i>
<span>卡机管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/room">卡机管理</a></li>
@endsection

@section('body-nest')
<div class="body_nest radius">
    <div class="row table_control">
        <form method="get">
        <div class="form_inline mb10 text_right">


            <div class="form_group">
                <label class="control_label">卡机号：</label>
            </div>
            <div class="form_group mr20">
                <input type="text" class="form_control" name="id" value="{{ Request::input('id') }}">
            </div>
            <div class="form_group">
                <button class="btn btn_green"><i class="icon-search3 white"></i>&nbsp;查找&nbsp;</button>
            </div>
        </div>
        </form>
         <!-- <div class="pull_right text_right">
            <a href="/admin/room/fast" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;快速添加&nbsp;</a>
        </div> -->
         <div class="mr20 pull_right text_right">
            <a href="/admin/room/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加卡机&nbsp;</a>
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
                <th width="25%">卡机号</th>
                <th width="50%">卡机描述</th>
                <th width="25%">操作</th>
            </tr>
            @forelse ($result['room'] as $room)
            <tr>
                <td>
                    <div class="icheckbox_red">
                        <input tabindex="13" type="checkbox" name="room_id[]" value="{{ $room->room_id }}">
                    </div>
                </td>
                <td>{{ $room->room_num }}</td>
                <td>{{ $room->room_descript  }}</td>
                <td>
                    <a href="/admin/room/edit/{{ $room->room_id }}" class="btn btn_green"><i class="icon-pencil white"></i> 编辑</a>
                    <a class="btn btn_red delete-single" data-id="{{ $room->room_id }}"><i class="icon-icon-bin white"></i> 删除</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colSpan="8">没有房间数据</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="table_bottom row">
        <div class="pull_left"><button class="btn btn_red" id="delete-selected"><i class="icon-icon-bin white"></i> 删除选中项</button></div>
        <form method="get" id="pagination">
        	@if (Request::has('room_type'))
            <input type="hidden" name="room_type" value="{{ Request::input('room_type') }}">
            @endif
            @if (Request::has('floor'))
            <input type="hidden" name="floor" value="{{ Request::input('floor') }}">
            @endif
            @if (Request::has('id'))
            <input type="hidden" name="id" value="{{ Request::input('id') }}">
            @endif

            <!-- @if (Request::has('name'))
            <input type="hidden" name="name" value="{{ Request::input('name') }}">
            @endif -->
            <input type="hidden" name="page" value="1">
            <div class="pagination pull_right">
                @if (Request::has('id')||Request::has('floor')||Request::has('room_type'))
                {!! $result['room']->appends(['room_type' => Request::input('room_type'),'id' => Request::input('id'),'floor' => Request::input('floor')])->render() !!}
                @else
                {!! $result['room']->render() !!}
                @endif
                <ul>
                    <li><span>共{{ $result['room']->lastPage() }}页({{ $result['room']->total() }}条)</span></li>
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

@section('foot-assets'){!!
script("third-party/jquery/jquery.validate.min.js")!!} {!!
script("third-party/jquery/jquery.form.min.js")!!} {!!
script('/assets/admin/js/room/index.js') !!}
<script type="text/javascript">
$(function() {
    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 1) {
           $('#pagination input[name="page"]').val($('#page-num').val());
        }
    });

    var room = new RoomIndex();

    $(document).on('click', '#delete-selected', function() {

    	room.deleteSelected();
        return false;
    });

    $(document).on('click', '.delete-single', function() {

    	room.deleteSingle(this);
        //room.editSingle(this)
        return false;
    });
});
function selectRoom(index)
{
    $('#room_type').val("");
    $('#room_type').val(index);
}
</script>
@endsection
