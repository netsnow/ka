// JavaScript Document

/**************************菜单弹出效果******************
*********************************************************/


$(document).ready(function() {	
	$('#nav-total li').click(function() {
		var active = $(this).hasClass("on");
		var clickLi = $(this).attr("name");
		
		if (active == true){
			$(this).removeClass("on");
			$("#" + clickLi).removeClass("show");
			$(".bg-base").hide();
		}else
		{
			$(".select-nav").removeClass("show");		
			$(".select-btn").removeClass("on");		
			$(this).addClass("on");
			$("#" + clickLi).addClass("show");
			$(".bg-base").show();
		}
	});
	$('.bg-base').click(function() {
		$(".select-nav").removeClass("show");		
		$(".select-btn").removeClass("on");
		$(this).hide();
	});
	$('.select-nav li').click(function() {
		$(".select-nav").removeClass("show");		
		$(".select-btn").removeClass("on");
		$(".bg-base").hide();
	});
	
/********************页面滚动菜单隐藏**********************
**********************************************************/

    var header_change = $(document).scrollTop();
    var header_line = $('.select-block').outerHeight();

    $(window).scroll(function() {
        var header_select = $(document).scrollTop();

        if (header_select > header_line){$('.select-block').addClass('change-inside');} 
        else {$('.select-block').removeClass('change-inside');}

        if (header_select > header_change){$('.select-block').removeClass('change-out');} 
        else {$('.select-block').addClass('change-out');}				

        header_change = $(document).scrollTop();	
     });


/******************************搜索框点击事件************************
**********************************************************************/

	$(".searchi-input").click(function(){
		$(this).find(".searchi-input-holder").hide();
		$(this).find("input").focus();
	});
	
});

/*************************** 地图点击切换页面 Tab*****************
*******************************************************************/
//add_tag
$(document).ready( function () {
	$(".map-sideNav li").click(function(){
		var blockShow = $(this).attr("name");
		$(".map-sideNav li").removeClass("active");
		$(this).addClass("active");
		$(".map-text").removeClass("show");
		$("#" + blockShow).addClass("show");
	});
}); 

























