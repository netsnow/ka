@extends('default.admin._layout.base')
@section('title', '广告管理')

@section('title-block')
<i class="icon_large icon_display"></i>
<span>广告管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/ad">广告管理</a></li>
@endsection

@section('foot-assets')
{!! script("third-party/jquery/jquery.validate.min.js")!!}
{!! script("third-party/jquery/jquery.form.min.js")!!}
{!! script('/assets/admin/js/slide/ad_index.js') !!}
<script type="text/javascript">
$(function() {
    var ad = new AdIndex();

    $(document).on('click', 'a.gopage', function() {
        $('#pagination').submit();
    });

    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 0) {
            $('#pagination input[name="page"]').val($('#page-num').val());
        }
    });


    $(document).on('click', '#delete-selected', function() {
    	ad.deleteSelected();
        return false;
    });

    $(document).on('click', '.delete-single', function() {
    	ad.deleteSingle(this);
        return false;
    });
});
function selectFloor(index)
{
    $('#room').val(index);
}
</script>
@endsection

@section('body-nest')
		<div class="body_nest radius">
			<div class="row">
			<!-- <form method="get">
        <div class="pull_left form_inline mb10">
            <div class="form_group">
                <label class="control_label">房间号：</label>
            </div>

            <div class="form_group">
                <div class="control_select btn_group search_list col-lg-6">
            <button data-toggle="dropdown" class="btn dropdown_toggle " type="button">
                <span class="txt" id="categoryTxt">请选择</span>
                <span class="icon-triangle-down"></span>
            </button>
            <ul role="menu" class="dropdown_menu search_content" >
                <input type="text" class="form_control">
                <li class="divider"></li>
                @foreach ($result['room'] as $room)
                <li>
                     <a href="javascript:selectFloor('{{$room->room_id}}');" >{{$room->room_num}}</a>
                </li>
                @endforeach
            </ul>
            <input type="hidden" name="room" id="room" value="">

        </div>
            </div>

            <div class="form_group">
                <button class="btn btn_green"><i class="icon-search3 white"></i>&nbsp;查找&nbsp;</button>
            </div>
        </div>
        </form> -->
				<div class="col-lg-2 pull_right text_right">
					<a href="/admin/ad/add" class="btn btn_green">
						<i class="icon-plus2 white"></i>&nbsp;添加广告&nbsp;
					</a>
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
						<!-- <th width="10%">位置</th>
						<th width="10%">房间号</th> -->
						<th width="35%">图片</th>
						<!-- <th>链接</th> -->
						<th width="35%">排序</th>
						<th width="20%">操作</th>
					</tr>
					@forelse ($result['ads'] as $ad)
					<tr>
						<td>
							<div class="icheckbox_red">
								<input tabindex="13" type="checkbox" id="checkbox01" name="ad_id[]" value="{{ $ad->ad_id }}">
							</div>
						</td>
						<!-- <td>{{ $ad->side_path }}</td>
						@if(isset( $ad->room->room_num))
						<td>{{ $ad->room->room_num }}</td>
						@else
						<td>未查到房间</td>
						@endif -->
						<td class="logo" width="120"><img width="120" src="{{ $ad->ad_pic }}"></td>
						<!-- <td>{{ $ad->ad_link }}</td> -->
						<td>{{ $ad->sort_order }}</td>
						<td>
							<a href="/admin/ad/edit/{{ $ad->ad_id }}" class="btn btn_blue"><i class="icon-pencil white"></i> 编辑</a>
                    		<a class="btn btn_red delete-single" data-id="{{ $ad->ad_id }}"><i class="icon-icon-bin white"></i> 删除</a>
						</td>
					</tr>
					@empty
					<tr>
						<td colSpan="7">没有广告数据</td>
					</tr>
					@endforelse
				</tbody>
			</table>
			<div class="table_bottom row">
				<div class="pull_left">
					<button class="btn btn_red" id="delete-selected">
						<i class="icon-icon-bin white"></i> 删除选中项
					</button>
				</div>
				<form method="get" id="pagination">
					@if (Request::has('room'))
						<input type="hidden" name="room" value="{{ Request::input('room') }}">
					@endif
					@if (Request::has('name'))
						<input type="hidden" name="name" value="{{ Request::input('name') }}">
					@endif
						<input type="hidden" name="page" value="{{ Request::input('page') or 1 }}">
					<div class="pagination pull_right">
						@if (Request::has('room'))
							{!! $result['ads']->appends(['room' => Request::input('room')])->render() !!}
						@else
							{!! $result['ads']->render() !!}
						@endif
						<ul>
							<li><span>共{{ $result['ads']->lastPage() }}页({{ $result['ads']->total() }}条)</span></li>
							<li><span class="page_go_txtl">跳转到第</span></li>
							<li><span class="page_go"><input type="text" id="page-num"> </span>
							</li>
							<li><span class="page_go_txtr">页</span></li>
							<li><a href="javascript:void(0);" class="gopage">GO</a></li>
						</ul>
					</div>
				</form>
			</div>
		</div>

@stop

@section('hidden-items')
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="total-page" value="{{ $result['ads']->lastPage() }}">
@endsection
