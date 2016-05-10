@extends(tpl('admin._layout.base'))

@section('title', '经营范围管理')

@section('title-block')
<i class="icon_large icon_list2"></i>
<span>经营范围管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/category">经营范围管理</a></li>
@endsection

@section('body-nest')
<div class="body_nest radius">
    <div class="row table_control">
        <div class="col-lg-2 pull_right text_right">
            <a href="/admin/category/add" class="btn btn_green"><i class="icon_plus2 white"></i>&nbsp;添加分类&nbsp;</a>
        </div>
    </div>
    <table id="responsive-example-table" class="table large-only category_table">
        <tbody>
        <tr class="text-right">
            <th width="10">
                <div class="icheckbox_red checkAll">
                    <input tabindex="13" type="checkbox" id="checkbox01">
                </div>
            </th>
            <th>导航</th>  
            <th width="80">ID</th>
            <th width="80">显示</th>
            <th width="80">排序</th>
            <th width="300">操作</th>
        </tr>
        {!! $result['cat_html'] !!}
        </tbody>
    </table>
   <div class="table_bottom row">
        <div class="pull_left">
            <a class="btn btn_red" id="delete-selected"><i class="icon_icon_bin white"></i> 删除选中项</a>
        </div>
    </div> 
</div>
@endsection

@section('foot-assets')
{!! script('/assets/admin/js/category/index.js') !!}
<script type="text/javascript">
$(function() {
    var category = new CategoryIndex();

    $(document).on('click', '#delete-selected', function() {
        category.deleteSelected();
        return false;
    });

    $(document).on('click', '.delete-single', function() {
        category.deleteSingle(this);
        return false;
    });
});
</script>
@endsection
