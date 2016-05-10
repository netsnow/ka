$(function () {
    /*--------------筛选弹出窗口---------------*/
    /*--------点击头部筛选按钮，弹出窗口-------*/
    $(".wrapper .category-list").click(function () {
        $(".header-filter").toggleClass("none");
    });

    /*---------筛选分类的显示与隐藏--------*/
    $(".filter-category .title").click(function () {
        $(this).siblings("ul").toggleClass("none");
        $(this).find("em").toggleClass("down");
    });

    /*------点击列表后的样式-------*/
    $(".filter-category ul li a").click(function () {
        var s = $(this).text();
        $(this).parents("ul").siblings(".title").children(".all").text(s);
        $(this).parents("ul").siblings(".title").children(".all").css("color", "#e87e04");
        $(this).parents("ul").addClass("none");
    });

    /*------屏幕滚动出发置顶按钮------*/
    $(window).scroll(function () {
        if ($(window).scrollTop() > 0) {
            $(".scroll-top").css("display", "block");
        } else {
            $(".scroll-top").css("display", "none");
        }

    });
    $($(".scroll-top a")).click(function () {
//        $(window).scrollTop(0);
        $("body,html").animate({scrollTop:0},400);
    });

    /*---------首页画面的搜索---------*/
    $(".header-search-btn,.category-search").click(function () {
        $(".main-container").css("display", "none");
        $(".search").css("display", "block");
    });
    /*-----点击关闭按钮----*/
    $(".header-bg header .close-btn").click(function () {
        $(".main-container").css("display", "block");
        $(".search").css("display", "none");
    });
    
     /*-------search搜索画面------*/ 
    $(".wrapper div a").click(function(){
        $(this).addClass("colory");
        $(this).siblings().removeClass("colory");
    });
    /*-----------goods.html画面的隐藏导航栏-------*/
    $(".open-menu").click(function () {
        $(".hidden-nav").toggleClass("none");
    });

/*--------user.html画面的tab切换样式-----*/
   $(".user-tabs ul.user-tabs-nav li a.collect").click(function(){
       $(this).addClass("current-tab");
       $(this).parents().siblings().find("a").removeClass("current-tab");
       $(".my-collect").removeClass("none").siblings().addClass("none");
   });
    $(".user-tabs ul.user-tabs-nav li a.comment").click(function(){
        $(this).addClass("current-tab");
        $(this).parents().siblings().find("a").removeClass("current-tab");
        $(".comment-list").removeClass("none").siblings().addClass("none");
    });
    $(".user-tabs ul.user-tabs-nav li a.history").click(function(){
        $(this).addClass("current-tab");
        $(this).parents().siblings().find("a").removeClass("current-tab");
        $(".pro-history").removeClass("none").siblings().addClass("none");
    });
/*-------order_checkout.html画面选项的展开与合并-------*/
    $(".checkout-select a p").click(function(){
        $(this).find("b").toggleClass("down");
    });
       /*------是否有发票------*/
    $(".select-collapse ul li.is-invoice span").click(function(){
        var s=$(this).find("ins").text();
        //判断ins的内容是还是否
        if(s=="是"){
        //ins的内容"是"，就把文字修改为"否"，并把内容放在右边
            $(this).find("ins").text("否");
            $(this).find("b").css("float","left");
        }else{
            //ins的内容为"否"，就把文字修改为“是”，并把内容放在左边
            $(this).find("ins").text("是");
            $(this).find("b").css("float","right");
        }
    });

     /*------确认订单画面选项的展开与隐藏-------*/
    $(".checkout-select a").click(function(){
        $(this).next(".select-collapse").toggleClass("none")
    });

    /*-----category.html画面的子分类的展开与隐藏------*/
    $(".category-all ul li .category-content").click(function(){
        $(this).siblings(".category-child").toggleClass("none");
        $(this).find("i").toggleClass("down");
    });
});