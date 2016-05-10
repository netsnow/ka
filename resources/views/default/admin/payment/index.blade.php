@extends(tpl('admin._layout.base'))

@section('title', '支付方式管理')

@section('title-block')
    <i class="icon_large icon_credit"></i>
    <span>支付方式管理</span>
@endsection

@section('breadcrumb')
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/setting">系统设置</a></li>
    <li><i class="icon_large icon_triangle_right"></i></li>
    <li><a href="/admin/payment">支付方式管理</a></li>
@endsection

@section('body-nest')
    <div class="body_nest radius">
        <div class="row table_control">
            <div class="pull_right">
                <a href="/admin/payment/add" class="btn btn_green"><i class="icon-plus2 white"></i>&nbsp;添加支付方式&nbsp;</a>
            </div>
        </div>
        <table id="responsive-example-table" class="table large-only">
            <tbody>
            <tr class="text-right">
                <th width="20%">支付方式</th>
                <th>支付方式描述</th>
                <!-- <th>账号配置</th> -->
                <th width="15%">是否启用</th>
                <th width="10%">排序</th>
                <th width="20%">操作</th>
            </tr>
            @forelse ($result['payments'] as $payment)
                <tr>
                    <td>{{ $payment->payment_name }}</td>
                    <td>{{ $payment->payment_desc }}</td>
                    <!-- <td>{{ $payment->config }}</td> -->
                    <td>{{ $payment->is_enabled }}</td>
                    <td>{{ $payment->sort_order }}</td>
                    <td>
                        @if($payment->is_enabled == 1)
                            <a class="btn btn_red change" data-id="{{ $payment->payment_id }}"><i class="icon_pencil white"></i>&nbsp;禁用&nbsp;</a>
                        @else
                            <a class="btn btn_blue change" data-id="{{ $payment->payment_id }}"><i class="icon_pencil white"></i>&nbsp;启用&nbsp;</a>
                        @endif
                            <a href="/admin/payment/edit/{{ $payment->payment_id }}" class="btn btn_blue"><i class="icon-pencil white"></i> 编辑</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colSpan="5">没有支付方式数据</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('foot-assets')
    {!! script('/assets/admin/js/payment/index.js') !!}
    <script type="text/javascript">
        $(function() {
            var payment = new PaymentIndex();

            $(document).on('click', '.change', function() {
                payment.changeed(this);
                return false;
            });
        });
    </script>
@endsection
