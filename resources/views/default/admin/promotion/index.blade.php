@extends(tpl('admin._layout.base'))

@section('title', '优惠管理')

@section('title-block')
    <i class="icon-large icon-gift"></i>
    <span>优惠管理</span>
@endsection

@section('breadcrumb')
    <li><i class="icon-large icon-triangle-right"></i></li>
    <li><a href="/admin/promotion">优惠管理</a></li>
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
                <a href="/admin/promotion/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加文章&nbsp;</a>
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
                <th width="100">文章标题</th>
                <th width="120">图片</th>
                <th width="">链接</th>
                <th width="10%">显示</th>
                <th width="20%">添加时间</th>
                <th width="5%">排序</th>

                <th width="20%">操作</th>
            </tr>
            @forelse ($result['promotion'] as $promotion)
                <tr>
                    <td>
                        <div class="icheckbox_red">
                            <input tabindex="13" type="checkbox" name="promotion_id[]" value="{{ $promotion->promotion_id }}">
                        </div>
                    </td>
                    <td>{{ $promotion->promotion_id }}</td>
                    <td>{{$promotion->title}}</td>
                    <td class="logo"><img src="{{$promotion->cover_image}}"></td>
                    <td>
                        <a href="/promotion/detail/{{ $promotion->promotion_id }}">http://weshop.com/promotion/detail/{{ $promotion->promotion_id }}</a>
                    </td>
                    <td>
                        @if($promotion->is_show==1)  是
                        @else  否
                        @endif
                    </td>
                    <td>{{$promotion->created_at}}</td>
                    <td>{{$promotion->sort_order}}</td>
                    <td>
                        <a href="/admin/promotion/edit/{{ $promotion->promotion_id }}" class="btn btn_blue"><i class="icon-pencil white"></i> 编辑</a>
                        <a class="btn btn_red delete-single" data-id="{{ $promotion->promotion_id }}"><i class="icon-icon-bin white"></i> 删除</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colSpan="5">没有优惠数据</td>
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
                        {!! $result['promotion']->appends(['name' => Request::input('name')])->render() !!}
                    @else
                        {!! $result['promotion']->render() !!}
                    @endif
                    <ul>
                        <li><span>共{{ $result['promotion']->lastPage() }}页({{ $result['promotion']->total() }}条)</span></li>
                        <li><span class="page_go_txtl">跳转到第</span></li>
                        <li><span class="page_go"><input type="text" id="page-num"></span></li>
                        <li><span class="page_go_txtr">页</span></li>
                        <li><button href="javascript:void(0);" class="gopage">GO</button></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('foot-assets')
    {!! script('/assets/admin/js/promotion/index.js') !!}
    <script type="text/javascript">
        $(function() {
            $('#pagination').on('submit', function() {
                if ($('#page-num').val() > 1) {
                    $('#pagination input[name="page"]').val($('#page-num').val());
                }
            });

            var promotion = new PromotionIndex();

            $(document).on('click', '#delete-selected', function() {
                promotion.deleteSelected();
                return false;
            });

            $(document).on('click', '.delete-single', function() {
                promotion.deleteSingle(this);
                return false;
            });
        });
    </script>
@endsection
