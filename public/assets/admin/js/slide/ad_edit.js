var AdEditor = function(){
	this.waiting = false;
}

AdEditor.prototype.initForm = function(){
    // form验证
    var validator = $('form').validate({
        errorPlacement: function(error, element) {
            error.addClass('errorAlert left');

            if (element[0].type === 'file') {
                error.css('right', '-108px');
                element.closest('.uploader').after(error);
            }
            else {
                element.after(error);
            }
        },

        rules: {
             /*ad_pic: {
                 required: function(el) {
                    if ($('.main-form .img_view').length) {
                        return $(el).closest('.uploader').siblings('.img_view').is(':hidden');
                    }
                    return true;
                }
             },*/

             ad_link:{
                required: true,
                url:true
             },

             sort_order:{
                digits:true
             }
        },

        messages: {
             /*ad_pic: {
                 required: '请上传广告图片'
             },*/

             ad_link: {
                 required: '请输入链接地址',
                 url:"请输入有效的链接地址"
             },

             sort_order: {
                digits:"请输入有效的正整数"
             }
        }
    });

    $('.main-form input').on('keyup', function() {
        validator.element(this);
    });

    $('.main-form input[type="file"]').on('change', function() {
        validator.element(this);
    });
    // ajax提交
    $('.main-form').ajaxForm({
        success: function(response) {
            if (response.result !== true) {
                $.notifyBar({html: response.message, cls : 'error'});
                return;
            }

            $.notifyBar({html: response.message, cls : 'success'});
            if(returnUrl){
                redirect(returnUrl);
            }
            else{
                redirect('/admin/ad');
            }
        }
    });
}
