@extends(tpl('admin._layout.base'))

@section('title', '楼层管理')

@section('title-block')
    <i class="icon_large icon_flag2"></i>
    <span>楼层管理</span>
@endsection

@section('breadcrumb')
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/floor">楼层管理</a></li>
@endsection

@section('body-nest')
    <div class="body_nest radius">
        <div class="pull_right text_right">
                <a href="/admin/floor/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加楼层&nbsp;</a>
         </div>
        <div class="row table_control">
        </div>
        <table id="responsive-example-table" class="table large-only">
            <tbody>
            <tr class="text-right">
                <th width="10">
                    <div class="icheckbox_red checkAll">
                        <input tabindex="13" type="checkbox" id="checkbox01">
                    </div>
                </th>
                <th>楼层</th>
                <th width="20%">楼层示意图</th>


                <th width="35%">操作</th>
            </tr>
            @forelse ($result['floor'] as $floor)
                <tr>
                    <td>
                        <div class="icheckbox_red">
                            <input tabindex="13" type="checkbox" name="floor_id[]" value="{{ $floor->floor_id }}">
                        </div>
                    </td>
                    <td>{{ $floor->floor_name }}</td>
                    <td class="logo"><img src="{{ $floor->floor_map_url }}"></td>


                    <td>
                        <a href="flooredit/{{ $floor->floor_id }}">
                            <button class="btn btn_blue"><i class="icon-large icon-cog white"></i> 编辑</button>
                        </a>
                        <a class="btn btn_red delete-single" data-id="{{ $floor->floor_id }}"><i
                                    class="icon-icon-bin white"></i> 删除</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colSpan="4">空数据</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="table_bottom row">
            <div class="pull_left">
                <button class="btn btn_red" id="delete-selected"><i class="icon-icon-bin white"></i> 删除选中项</button>
            </div>
            <form method="get" id="pagination">
                @if (Request::has('name'))
                    <input type="hidden" name="name" value="{{ Request::input('name') }}">
                @endif
                <input type="hidden" name="page" value="{{ Request::input('page') or 1 }}">

                <div class="pagination pull_right">
                    @if (Request::has('name'))
                        {!! $result['floor']->appends(['name' => Request::input('name')])->render() !!}
                    @else
                        {!! $result['floor']->render() !!}
                    @endif
                    <ul>
                        <li><span>共{{ $result['floor']->lastPage() }}页({{ $result['floor']->total() }}条)</span></li>
                        <li><span class="page_go_txtl">跳转到第</span></li>
                        <li><span class="page_go"><input type="text" id="page-num"></span></li>
                        <li><span class="page_go_txtr">页</span></li>
                        <li><a href="javascript:void(0);" class="gopage">GO</a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('hidden-items')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="total-page" value="{{ $result['floor']->lastPage() }}">
@endsection

@section('foot-assets')
    {!! script('/assets/admin/js/floor/index.js') !!}
    <script type="text/javascript">
        $(function () {
            $(document).on('click', 'a.gopage', function () {
                $('#pagination').submit();
            });

            $('#pagination').on('submit', function () {
                if ($('#page-num').val() > 1) {
                    $('#pagination input[name="page"]').val($('#page-num').val());
                }
            });

            var floor = new floorIndex();

            $(document).on('click', '#delete-selected', function () {
                floor.deleteSelected();
                return false;
            });

            $(document).on('click', '.delete-single', function () {
                floor.deleteSingle(this);
                return false;
            });
        });
    </script>
@endsection
