var mallPositionIndex = function() {
}

mallPositionIndex.prototype.formInit = function() {
    // form验证
    $('form').validate({
    	errorPlacement: function(error, element) {
            error.addClass('errorAlert left');
            if (element[0].type === 'file') {
                error.css('right', '-108px');
                element.closest('.uploader').after(error);
            } else {
                element.after(error);
            }
        },
       rules: {
    	   mall_address: {
                required: true
            }
       },
       messages: {
    	   mall_address: {
                required: '请输入商城地址'
            }
       }
    });

    // ajax提交
    $('form').ajaxForm({
        success: function(response) {
            if (response.result !== true) {
                $.notifyBar({html: response.message, cls : 'error'});
                return;
            }

            $.notifyBar({html: response.message, cls : 'success'});
            location.href='location';
        }
    });
}
