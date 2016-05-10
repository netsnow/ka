@extends(tpl('admin._layout.base'))

@section('title', '优惠管理')

@section('title-block')
    <i class="icon-large icon-gift"></i>
    <span>优惠管理</span>
@endsection

@section('breadcrumb')
    <li><i class="icon-large icon-triangle-right"></i></li>
    <li><a href="/admin/promotion">编辑优惠管理</a></li>
@endsection

@section('body-nest')

    <div class="body_nest">
        <form method="post" class="main-form">
            <div>
                <h3> {!! $result['promotion']->title or '' !!} </h3>
            </div>
            <div>
                <h5>&nbsp;&nbsp;&nbsp;&nbsp;{!! $result['promotion']->created_at or '' !!}</h5>
                <hr>
            </div>
            <div>
                <div class="img_view"><a class="focus"><img src="{{ $result['promotion']->cover_image }}"></a></div>
            </div>
            <div>
                <h4> {!! $result['promotion']->content or '' !!} </h4>
            </div>
        </form>

    </div><!-- /.body_nest -->
@endsection
