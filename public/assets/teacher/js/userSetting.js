var UserIndex = function() {
}

UserIndex.prototype.formInit = function() {
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
            password: {
                required: true,
                minlength: 6
            },
            new_password: {
                required: true,
                minlength: 6
            },
            new_password_check: {
                required: true,
                minlength: 6,
                equalTo: 'input[name="new_password"]'
            }
       },
       messages: {
            password: {
                required: '请输入密码',
                minlength: $.validator.format('密码不能小于{0}个字符')
            },
            new_password: {
                required: '请输入新密码',
                minlength: $.validator.format('密码不能小于{0}个字符')
            },
            new_password_check: {
                required: '请输入确认密码',
                minlength: $.validator.format('密码不能小于{0}个字符'),
                equalTo:'新密码与确认密码一致'
            }
       }
    });

    $('form input').on('blur', function() {
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
            location.replace("/teacher/admin");
        }
    });
}
