@extends('default.admin._layout.base') 
@section('title', '404') 

@section('title-block')
<i class="icon_large icon_image"></i>
<span>404画面</span>
@endsection 

@section('breadcrumb')
<li><i class="icon_large icon_triangle_right"></i></li>
<li><a href="">404</a></li>
@endsection 

@section('body-nest')
    <div id="404_content">
        <div class="page_error text_center">
            <h2 >404.Page not found.</h2>
            <p>无法找到您想要指定的页面，您可以<a class="orange" href="/admin/admin">回到首页</a>看看。</p>
            <pre>
                .----.
         _.'__        `.
 .--($)($$)---/#\
.' @                    /###\
:                 ,     #####
`-..__.-' _.-\###/
            `;_:        `"'
        .'"""""`.
     /,    ya ,\\
    //    404!    \\
    `-._______.-'
    ___`. | .'___
 (______|______)
            </pre>
        </div>
    </div>
@endsection