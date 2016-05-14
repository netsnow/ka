@extends('default.teacher._layout.base') @section('title', '订单管理')

@section('title-block')
<i class="icon_large icon_shopping_cart"></i>
<span>订单管理</span>
@endsection @section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="order">订单管理</a></li>
@endsection @section('foot-assets') {!!
script("third-party/jquery/jquery.validate.min.js")!!} {!!
script("third-party/jquery/jquery.form.min.js")!!} {!!
script('/assets/teacher/js/student/order_index.js') !!}
<script type="text/javascript">
$(function() {
    var order = new OrderIndex();

    $(document).on('click', 'a.gopage', function() {
        $('#pagination').submit();
    });

    $('#pagination').on('submit', function() {
        if ($('#page-num').val() > 0) {
            $('#pagination input[name="page"]').val($('#page-num').val());
        }
    });


    $(document).on('click', '#delete-selected', function() {
    	order.deleteSelected();
        return false;
    });
});

function selectRoom(index)
{
    $('#order_type').val("");
    $('#order_type').val(index);

}
</script>
@endsection @section('body-nest')
<div class="consignee-info p10">
    <ul>
        @forelse ($result['students'] as $student)
        <li>
          <div class="templatemo-content-widget white-bg col-1 text-center">
            <tr class="logo" ><img style="width:100%" src="{{ $student->img }}"></tr>
            <tr>{{ $student->real_name}}</tr>
            <tr><button type="submit" class="btn btn_green">补签</button></tr>
          </div>
        </li>
        @empty
        <tr>
          <td colSpan="9">没有数据</td>
        </tr>
        @endforelse
        <div class="clear"></div>
    </ul>
    <div class="clear"></div>
</div>
@stop

@section('hidden-items')
<input type="hidden" name="_token" value="{{ csrf_token() }}">
@endsection
