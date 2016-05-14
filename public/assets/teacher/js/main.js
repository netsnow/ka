$(document).ready(function() {
//-------------------------------------------------------------
// reset html height

var htmlH = $(document.body).height();
var navbH = $(".navbar").outerHeight();
var paper_topH = $("#paper_top").outerHeight();
var breadcrumbH = $("#breadcrumb").outerHeight();
var mainH = htmlH - navbH - 20;
$(".main_bg").css("min-height",mainH);

$(window).resize(function() {
	var htmlH = $(document.body).height();
    var navbH = $(".navbar").outerHeight();
    var paper_topH = $("#paper_top").outerHeight();
    var breadcrumbH = $("#breadcrumb").outerHeight();
    var mainH = htmlH - navbH - 20;
    $(".main_bg").css("min-height", mainH);
});



//-------------------------------------------------------------
// submenu
    $(".sub_menu").click(function(){
        var menuOpen = $(this).hasClass("open");
        var menuOpened = $("#side_Nav .menu_left_nest .open");
        if( menuOpen == false){
            menuOpened.next("ul").slideUp(500,function(){
                menuOpened.children(".dot").removeClass("minus").addClass("plus");
            });
            menuOpened.removeClass("open");
            $(this).addClass("open");
            $(this).next("ul").slideDown(500,function(){
                $(this).prev().children(".dot").removeClass("plus").addClass("minus");
            });
        }else{
            $(this).removeClass("open");
            $(this).next("ul").slideUp(500,function(){
                $(this).prev().children(".dot").removeClass("minus").addClass("plus");
            });
        }
    });

//-------------------------------------------------------------
//checkbox  radio  allcheck

    $("td .icheckbox_red").click(function(){
    	//获取选中个数
        var s=$("#responsive-example-table tr td .icheckbox_red input").length;
        var bool=$(this).find("input").prop("checked");//判断当前的复选框是否选中

        if (bool) {//复选框选中就添加Class
        	$(this).addClass("checked");
        }else{//没选中就删除Class
        	$(this).removeClass("checked");
        }
        //判断选中的个数是否等于总数
    	if(s==$("#responsive-example-table tr td .icheckbox_red input[type='checkbox']:checked").length){
            //等于就把第一行总的复选框选中，并添加Class
            $(".checkAll").addClass("checked").children("input").prop("checked",true);
        }
        else{//不等，就把取消第一行复选框的选中状态，并删除Class
            $(".checkAll").removeClass("checked").children("input").prop("checked",false);
        }
    });
    $(".checkAll").click(function(){
    	 var bool=$(this).find("input").prop("checked");//获取当前按钮选中状态

        if (bool) {  //选中时，给本身添加Class，并把所有数据都选中
        	$(this).addClass("checked");
        	$("#responsive-example-table tr td .icheckbox_red").addClass("checked").find("input").prop("checked",true);
        }else{//没选中，就把自己的Class删除，并把所有数据都取消
        	$(this).removeClass("checked");
        	$("#responsive-example-table tr td .icheckbox_red").removeClass("checked").find("input").prop("checked",false);

        }
    });

    $(".iradio_red").click(function(){
    	/*var bool=$(this).children("input").prop("checked");
    	if(bool){
    		$(this).addClass("checked");
    	}else{
    		$(this).removeClass("checked");
    	}*/

        var disable = $(this).hasClass("disabled");
        var checked = $(this).hasClass("checked");
        if( disable == false){
            $(".radioGroup .checked").children("input").removeAttr("checked");
            $(".radioGroup .checked").not(".disabled").removeClass("checked");
            $(this).addClass("checked");
            $(this).children("input").attr("checked",'true');
        };
    });

//-------------------------------------------------------------
//dropdown menu

    $(".dropdown_toggle").click(function(){
        var dropdown_open = $(this).parent(".btn_group").hasClass("open");
        if( dropdown_open == false){
            $(".btn_group").removeClass("open");
            $(this).parent(".btn_group").addClass("open");
        }else{
            $(this).parent(".btn_group").removeClass("open");
        };

    });

    $(".dropdown_menu a").click(function(){
        var menu_select = $(this).html();
        var menu_value = $(this).data("value");
		var menu_class = $(this).attr("class");
        if( menu_class == "default"){
	        $(this).parents(".dropdown_menu").prev(".dropdown_toggle").children(".txt").addClass("default");
        }else{
	        $(this).parents(".dropdown_menu").prev(".dropdown_toggle").children(".txt").removeClass("default");
        };
        $(".btn_group").removeClass("open");
        $(this).parents(".dropdown_menu").prev(".dropdown_toggle").children(".txt").html(menu_select);
        $(this).parents(".dropdown_menu").next("input[type='hidden']").val(menu_value);
    });
    $(document).click(function(e){
        e = window.event || e; // 兼容IE7
        obj = $(e.srcElement || e.target);
        if ($(obj).is(".btn_group,.btn_group *")) {
        } else {
            $(".btn_group").removeClass("open");
        }
    });

//-------------------------------------------------------------
//submenu move

    $(window).scroll(function () {
       if ($(document).scrollTop()>90) {
           $("#side_Nav").css("position","fixed");
       }else{
           $("#side_Nav").css("position","absolute");
       };
   });

//-------------------------------------------------------------

//clock
    $('#digital_clock').clock({
        offset: '+8',
        type: 'digital'
    });

    $('#digital_clock').show();

//-------------------------------------------------------------
//weather
    var cityUrl = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js';
    $.getScript(cityUrl, function(script, textStatus, jqXHR) {
        var citytq = remote_ip_info.city ;// 获取城市
        var url = "http://php.weather.sina.com.cn/iframe/index/w_cl.php?code=js&city=" + citytq + "&day=0&dfc=3";
        $.ajax({
            url : url,
            dataType : "script",
            scriptCharset : "gbk",
            success : function(data) {
                var _w = window.SWther.w[citytq][0];
                var _f= _w.f1+"_0.png";
                if(new Date().getHours() > 17){
                     _f= _w.f2+"_1.png";
                }
                var img = "<img width='16px' height='16px' src='http://i2.sinaimg.cn/dy/main/weather/weatherplugin/wthIco/20_20/" +_f
                + "' />";
                var tq = citytq + " " + img + " " + _w.s1 + " " + _w.t1 + "℃～" + _w.t2 + "℃  " + _w.d1 + _w.p1 + "级";
                $('#weather').html(tq);
            }
        });
    });
//-------------------------------------------------------------
//fileup
    $("input[type='file']").change(function(){
        $(this).parent(".uploader").next("p").remove();
        $(this).parent(".uploader").siblings('.img_view').hide();
        var str;
            str=$(this).val();
        var arr=str.split('\\');//注split可以用字符或字符串分割
        var myfile=arr[arr.length-1];//这就是要取得的图片名称
        $(this).parent(".uploader").after("<p class='myFileName'>" + myfile + "</p>");
        $(this).blur();
    });

//-------------------------------------------------------------
//category

	$(".category_table .sort .tree").click(function(){
		var categoryName =  ['category_first', 'category_second', 'category_third', 'category_fourth', 'category_fifth'];
		var state = $(this).children("i").hasClass("icon_diff_added");
		var fatherTr = $(this).parents("tr").attr("id");
		var fatherTrClass = $(this).parents("tr").attr("class");
		var childOpen;
		$.each(categoryName,function(name,value) {
			if ( value == fatherTrClass){
				childOpen = categoryName[name + 1];
			}
        });
		if (state == true){
			$(this).children("i").addClass("icon_diff_removed").removeClass("icon_diff_added");
			$("." + childOpen).each(function(){
				var trName = $(this).attr("id");
				var trTag = trName.substring(0,trName.length-4);
				if (trTag == fatherTr){
					$(this).show(200);
				};
			});
		}else{
			$(this).children("i").addClass("icon_diff_added").removeClass("icon_diff_removed");
			$("." + childOpen).each(function(){
				var trName = $(this).attr("id");
				var childState = $(this).find("i").hasClass("icon_diff_added");
				var trTag = trName.substring(0,trName.length-4);
				if (trTag == fatherTr){
					if(childState == true){
						$(this).hide(200);
					}else{
						$(this).find(".tree").click();
						$(this).hide(200);
					}
				};
			});
		}
	});

//-------------------------------------------------------------
//add_tag
	$(".add_tag").click(function(){
		var tagName = $(this).parents(".form_group").find(".dropdown_toggle .txt").html();
		var tagNochange = $(this).parents(".form_group").find(".dropdown_toggle .txt").hasClass("default");
		var addTag = "<span class='label'>" + tagName + "<i class='icon_x2 white ml10 close_tag'></i></span>"
		if (tagNochange == false){
			$(this).parents(".form_group").find(".tag_block").append(addTag);
			$(".close_tag").click(function(){
				$(this).parents(".label").remove();
			});
		};
	});

});


//-------------------------------------------------------------
//openModel
    function openModel(msg, opt) {
		var height = $(document).height();
        var model = "<div class='popup_container'><div class='popup_base'></div><div class='popup_block'><div class='popup_tit'><p>提示信息</p><i class='icon_x2 white'></i></div><div class='popup_content'><div class='form_group row'><div class='col-lg-12'><p class='tit'>"+msg+"</p></div></div><div class='row'><div class='col-lg-5 col-lg-offset-1'><button id='sure' class='btn btn_green yes'>&nbsp;&nbsp;确定&nbsp;&nbsp;</button></div><div class='col-lg-5 text_right'><button id='cancel' class='btn btn_red cancel'>&nbsp;&nbsp;取消&nbsp;&nbsp;</button></div></div></div></div></div>";
        $("body").append(model);
        $(".popup_container").height(height);
        $(".popup_container").show();

        $(".popup_tit .icon_x2").click(function(){
            $(".popup_container").remove();
        });

		$("#sure").click(function(){
	        $(".popup_container").remove();
	        opt.success();
			return true;
		})
		$("#cancel").click(function () {
	        $(".popup_container").remove();
			return false;
		});
};

function openAlert(msg) {
        var height = $(document).height();
        var model = "<div class='popup_container'><div class='popup_base'></div><div class='popup_block'><div class='popup_tit'><p>提示</p><i class='icon_x2 white'></i></div><div class='popup_content'><div class='form_group row'><div class='col-lg-12'><p class='tit'>"+msg+"</p></div></div><div class='row'><div class='col-lg-12 text_center'><button id='true' class='btn btn_green yes'>&nbsp;&nbsp;确定&nbsp;&nbsp;</button></div></div></div></div></div>";
        $("body").append(model);
        $(".popup_container").height(height);
        $(".popup_container").show();
        $("#true").click(function(){
            $(".popup_container").remove();
        });
        $(".popup_tit .icon_x2").click(function(){
            $(".popup_container").remove();
        });
    };

//-------------------------------------------------------------
//logout
    $("#logout").click(function(){
    	openModel('是否确认退出登陆?', {
    		success: function() {location.replace("/teacher/logout");}
    	});
    });

//-------------------------------------------------------------
// reset
 $("#reset").click(function(){
 	// 上传
 	$(".myFileName").remove();
 })


var s="<div class='form_group row'><label class='col-lg-3'><input type='text' class='form_control' name='weather_name[]' value=''></label><div class='col-lg-6'><input type='text' class='form_control' name='weather_remind[]' value=''>"+"</div></div>";
$(".add_weather").click(function(){
    $(".form_list").append(s);
});

// 下拉搜索
$(".search_list button").click(function(){
    $(".search_content input").val('');//每次搜索框都要置空
    $(".search_content li").show();//所有的数据都要正常显示
});
//输入筛选
$(".search_content input").keyup(function(){
    var s=$(".search_content input").val();

    if($(this).val()!=''){
        $(".search_content li").hide().filter(':contains("' +s +'")').show();
    }else{
        $(".search_content li").show()
    }
});
