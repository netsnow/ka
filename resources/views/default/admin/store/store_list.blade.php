@extends(tpl('admin._layout.base'))

@section('title', '店铺管理')

@section('title-block')
<i class="icon_large icon_bookmark2"></i>
<span>店铺管理</span>
@endsection

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="/admin/store">店铺管理</a></li>
@endsection

@section('body-nest')
<div class="body_nest radius">
    <form method="get" id="storeForm">
    <div class="row table_control">
        <div class="col-lg-10 form_inline">
            <div class="form_group">
                <label class="control_label">店铺名称：</label>
            </div>                    
            <div class="form_group">
                <input type="text" class="form_control" name="storeName" value="{{ $StoreList['params']['storeName'] }}">
            </div>                    
            <div class="form_group ml10">
                <label class="control_label">品牌：</label>
            </div>
            <div class="form_group">
                <input type="text" class="form_control" name="storeBrand" value="{{ $StoreList['params']['storeBrand'] }}">                                                 
            </div> 
            <div class="form_group ml10">
                <label class="control_label">经营范围：</label>
            </div>                    
            <div class="form_group">
                <div class="control_select btn_group">
                    <button data-toggle="dropdown" class="btn dropdown_toggle" type="button">
                        <span class="txt" id="categoryTxt">请选择</span>
                        <span class="icon-triangle-down"></span>
                    </button>
                    <ul role="menu" class="dropdown_menu left0" id="categorySelect">
                        <li><a href="javascript:selectCategory();" name="menu">请选择</a></li>
                        <li class="divider"></li>
                        @foreach ($StoreList['categories'] as $category)
                        <li>
                            <a href="javascript:selectCategory({{ $category->cat_id }});" id="{{ $category->cat_id }}">{{ $category->cat_name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <input type="hidden" name="storeCategory" id="storeCategory" value="{{ $StoreList['params']['storeCategory'] }}"/>
                </div>                                                            
            </div>                    
            <div class="form_group ml10">
                <label class="control_label">楼层：</label>
            </div>                    
            <div class="form_group">
                <div class="control_select btn_group">
                    <button data-toggle="dropdown" class="btn dropdown_toggle" type="button">
                        <span class="txt" id="floorTxt">请选择</span>
                        <span class="icon-triangle-down"></span>
                    </button>
                    <ul role="menu" class="dropdown_menu left0" id="floorSelect">
                        <li><a href="javascript:javascript:selectFloor();" name="menu">请选择</a></li>
                        <li class="divider"></li>
                        @foreach ($StoreList['floors'] as $floor)
                        <li><a href="javascript:selectFloor({{ $floor->floor_id }});" id="{{ $floor->floor_id }}" name="menu01">{{ $floor->floor_name }}</a></li>
                        @endforeach
                    </ul>
                    <input type="hidden" name="storeFloor" id="storeFloor" value="{{ $StoreList['params']['storeFloor'] }}"/>
                </div>                                                            
            </div>                    
            <div class="form_group">
                <button class="btn btn_green"><i class="icon-search3 white"></i>&nbsp;查找&nbsp;</button>
            </div>                    
        </div>
        <div class="col-lg-2 pull_right text_right">                                          
            <a href="/admin/store/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加商铺&nbsp;</a>
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
            <th width="100">店铺名称</th>
            <th width="10%">所在楼层</th>
            <th width="10%">具体位置</th>
            <th>经营范围</th>
            <th>品牌</th>
            <th width="5%">排序</th>
            <th width="14%">店铺LOGO</th>
            <th width="20%">操作</th>
        </tr>
        @forelse ($StoreList['stores'] as $store)
        <tr>
            <td><div class="icheckbox_red"><input tabindex="13" type="checkbox" name="storeCheckbox[]" id="storeCheckbox[]" value="{{ $store->store_id }}"></div></td>
            <td>{{ $store->store_id }}</td>
            <td>{{ $store->store_name }}</td>
            <td>{{ $store->floor_number }}</td>
            <td>{{ $store->address }}</td>
            <td>{{ $store->cat_name }}</td>
            <td>{{ $store->brand_name }}</td>
            <td>{{ $store->sort_order }}</td>
            <td class="logo"><img src="{{ $store->store_logo }}"></td>
            <td>
                <a class="btn btn_blue" href="javascript:window.location.href='/admin/store/edit/{{ $store->store_id }}'"><i class="icon-pencil white"></i> 编辑</a>
                <a class="btn btn_red delete-single" data-id="{{ $store->store_id }}" ><i class="icon-icon-bin white"></i> 删除</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">没有店铺数据</td>
        </tr>
        @endforelse
        </tbody>
    </table>
    <div class="table_bottom row">
        <div class="pull_left">
            <a class="btn btn_red" href="javascript:delStore();" id="delete-selected"><i class="icon-icon-bin white"></i> 删除选中项</a>
        </div>
        <input type="hidden" name="page" id="page" value="{{ $StoreList['stores']->currentPage() }}"/>
        <div class="pagination pull_right">
            <ul>
                @if ($StoreList['stores']->currentPage() <= 1)
                <li class="disabled"><a data-page="first" href="#first">«</a></li>
                <li class="disabled"><a data-page="prev" href="#prev">‹</a></li>
                @else
                <li><a data-page="first" href="javascript:goPage('f');">«</a></li>
                <li><a data-page="prev" href="javascript:goPage('p');">‹</a></li>
                @endif
                @for ($i = 1; $i <= $StoreList['stores']->lastPage(); $i++)
                @if ($i == $StoreList['stores']->currentPage())
                <li class="active"><a data-page="0" href="#">{{ $i }}</a></li>
                @else
                <li><a data-page="1" href="javascript:goPage('{{ $i }}');">{{ $i }}</a></li>
                @endif
                @endfor
                @if ($StoreList['stores']->currentPage() >= $StoreList['stores']->lastPage())
                <li class="disabled"><a data-page="next" href="#next">›</a></li>
                <li class="disabled"><a data-page="last" href="#last">»</a></li>
                @else
                <li><a data-page="next" href="javascript:goPage('n');">›</a></li>
                <li><a data-page="last" href="javascript:goPage('m');">»</a></li>
                @endif
                <li><span>共{{ $StoreList['stores']->total() }}条记录</span></li>
                <li><span>共{{ $StoreList['stores']->lastPage() }}页</span></li>
                <li><span>当前第{{ $StoreList['stores']->currentPage() }}页</span></li>
                <li><span class="page_go_txtl">跳转到第</span></li>
                <li><span class="page_go"><input type="text" id="targetPage" value=""></span></li>
                <li><span class="page_go_txtr">页</span></li>
                <li><a href="javascript:goPage($('#targetPage').val());" class="gopage" >GO</a></li>
            </ul>
        </div>
    </div>
    </form>
</div>
@endsection

@section('foot-assets')
{!! script('/assets/admin/js/store/index.js') !!}
<script type='text/javascript'>
$(document).ready(function() {

    var categoryId = "{{ $StoreList['params']['storeCategory'] }}";
    var floorId = "{{ $StoreList['params']['storeFloor'] }}";

    var items = $('#categorySelect a');
    for(var i = 0; i < items.length; i++)
    {
        if (items[i].id == categoryId) {
            $('#categoryTxt').html(items[i].innerHTML);
            break;
        }
    }

    items = $('#floorSelect a');
    for(var i = 0; i < items.length; i++)
    {
        if (items[i].id == floorId) {
            $('#floorTxt').html(items[i].innerHTML);
            break;
        }
    }

    var store = new StoreIndex();

    $(document).on('click', '#delete-selected', function() {
        store.deleteSelected();
        return false;
    });

    $(document).on('click', '.delete-single', function() {
        store.deleteSingle(this);
        return false;
    });

});


function goPage(p) 
{
    var page = 1;
    var currentPage = {{ $StoreList['stores']->currentPage() }};
    var lastPage = {{ $StoreList['stores']->lastPage() }};
    
    if (p == 'f') {
        page = 1;
    } else if (p == 'p') {
        page = currentPage - 1;
    } else if (p == 'n') {
        page = currentPage + 1;
    } else if (p == 'm') {
        page = lastPage;
    } else if (!isNaN(parseInt(p))) {
        page = p;
    }

    $('#page').val(page);
    $('#storeForm').submit();
}
// function delStore(id)
// {
//     var ind = parseInt(id);
//     var storeIds = [];
//     if (isNaN(ind)) {
//         var cks = document.forms['storeForm']['storeCheckbox'];
//         for (var i = 0; i < cks.length; i++) {
//             if (cks[i].checked) {
//                 storeIds.push(cks[i].value);
//             }
//         }
//     } else {
//         storeIds.push(id);
//     }

//     if (storeIds.length <= 0) {
//         alert("请选择删除店铺");
//         return;
//     }

//     if (confirm("是否删除所选店铺？")) {
//         var data = {
//             storeDelId:storeIds,
//             _token:$('#csrfToken').val()
//         };

//         $.post('/admin/store/delete', data, function(response, status) {
//             if (response.status == 1) {
//                 window.location.reload();
//             } else {
//                 alert(response.message);
//             }
//         });
//     }
// }
function selectCategory(index)
{
    $('#storeCategory').val(index);
}
function selectFloor(index)
{
    $('#storeFloor').val(index);
}
</script>
@endsection
