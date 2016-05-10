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
			$("html").removeClass("show");
		}else
		{
			$(".select-nav").removeClass("show");		
			$(".select-btn").removeClass("on");		
			$(this).addClass("on");
			$("#" + clickLi).addClass("show");
			$(".bg-base").show();
			$("html").addClass("show");
		}
	});
	$('.bg-base').click(function() {
		$(".select-nav").removeClass("show");		
		$(".select-btn").removeClass("on");
		$(this).hide();
		$("html").removeClass("show");
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
		$(this).find(".delete-icon").show();
		$(this).find("input").focus();
		
		// $(".delete-icon").click(function(){
		// 	$('input[type="search"]').remove();
		// });	
	});
	
});
/******************************搜索框删除事件************************
**********************************************************************/



/*************************** 地图点击切换页面 Tab*****************
*******************************************************************/
//add_tag
$(document).ready( function () {
	$(".map-sideNav li").click(function(){
		$("#mapGuide").animate({width: '100%', opacity: 'hide'}, 'normal',function(){ $("#mapGuide").hide();});
		var blockShow = $(this).attr("name");
		$(".map-sideNav li").removeClass("active");
		$(this).addClass("active");
		$(".map-text").removeClass("show");
		$("#" + blockShow).addClass("show");
	});
}); 



/*******************************地图拖拽*****************************
***********************************************************************/
/* $(function () {
            $(".mapImg").mousedown(
            function (event) {
                var isMove = true;
                var abs_x = event.pageX - $(".mapImg").offset().left;
                var abs_y = event.pageY - $(".mapImg").offset().top;
                $(document).mousemove(function (event) {
                    if (isMove) {
                        var obj = $(".mapImg");
                        obj.css({ 'left': event.pageX - abs_x, 'top': event.pageY - abs_y });
                    }
                }
                ).mouseup(
                function () {
                    isMove = false;
                }
                );
            }
            );
        });*/
		
/*****************************放大缩小********************************
***********************************************************************/	

      /*  $("#larger").click(function () {
           // alert($(".map").css("background-size"));
            var $map = $(".map-img img");
            var width = $map.css("background-size").split(' ')[0].replace("px", "");
            var height = $map.css("background-size").split(' ')[1].replace("px", "");
            $map.css("background-size", (parseInt(width) + 30) + "px " + (parseInt(height) + 25) + "px");
            $map.width($map.width() + 30);
            $map.height($map.height() + 25);
            
        });
		
		 $("#smaller").click(function () {
            //alert($(".map").css("background-size"));
            var $map = $(".map-img img");
            var width = $map.css("background-size").split(' ')[0].replace("px", "");
            var height = $map.css("background-size").split(' ')[1].replace("px", "");
            $map.css("background-size", (parseInt(width) - 30) + "px " + (parseInt(height) - 25) + "px");
            $map.width($map.width() - 30);
            $map.height($map.height() - 25);
            
        });*/


/*****************************地图点击事件********************************
***********************************************************************/