var LoginIndex = function() {
}

LoginIndex.prototype.formInit = function() {
    // form验证
    var validator = $('form').validate({
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
            user_name: {
                required: true
            },
            password: {
                required: true
            }
       },
       messages: {
            user_name: {
                required: '请输入用户名'
            },
            password: {
                required: '请输入密码'
            }
       }
    });

    $('form input').on('keyup', function() {
        validator.element(this);
    });

    // ajax提交
    $('form').ajaxForm({
        success: function(response) {
            if (response.result !== true) {
                $.notifyBar({html: response.message, cls : 'error'});
                return;
            }

            $.notifyBar({html: response.message, cls : 'success'});
            location.href = '/teacher/admin';
        }
    });
}
