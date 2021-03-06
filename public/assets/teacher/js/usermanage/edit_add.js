var UserManageEditor = function()
{
    this.waiting = false;
}

UserManageEditor.prototype.initForm = function()
{
    var self = this;

    // form验证
    var validator = $('.main-form').validate({
        errorPlacement: function(error, element) {
            error.addClass('errorAlert left');
            if (element[0].type === 'file') {
                error.css('right', '-108px');
                element.closest('.uploader').after(error);
            } else if (element.attr('id') === 'myEditor_input') {
                console.log($('#myEditor_input').val());
                error.css('right', '-74px');
                element.after(error);
            } else if (element.attr('id') === 'timestart') {
                error.css('right', '-324px');
                element.after(error);
            } else if (element.attr('id') === 'timeend') {
                error.css('right', '-324px');
                element.after(error);
            } else {
                element.after(error);
            }
        },
        	rules: {
                phone: {
                	required: true,
                    number:true,
                    minlength:11,
                    maxlength:11,
                },
               password: {
                   required: true,
                   minlength:6,
               },
               cardnum: {
            	   required: true,
               },
               real_name: {
            	   required: true,
               },
            } ,
            messages: {
                phone: {
                	required: '请输入会员手机号',
                    minlength:'请输入11位手机号',
                    maxlength:'请输入11位手机号',
                    number:'请输入数字'
                },
                password: {
                    required: '请输入密码',
                    minlength:'密码不能少于6个字符',	
                },
                cardnum: {
             	   required: '请输入一卡通卡号',
                },
                real_name: {
              	   required: '请输入用户名',
                 },
            }
    });
    $('.main-form input').on('keyup', function() {
        validator.element(this);
    });

    $(window).on('keyup', function(e) {
        var um = UM.getEditor('myEditor');
        if (um.isFocus()) {
            validator.element($('input[name="myEditor_input"]'));
        }
    });
    // ajax提交
    $('.main-form').ajaxForm({
        beforeSubmit: function() {
            if (self.waiting === true) {
                alert('请稍候...有其他操作动作正在执行');
                return false;
            }
            self.waiting = true;
        },
        success: function(response) {
            if (response.result !== true) {
                $.notifyBar({html: response.message, cls: 'error'});
                //alert(response.message);
                return;
            }

            $.notifyBar({html: response.message, cls: 'success'});
            redirect('/admin/usermanage');
        },
        complete: function() {
            self.waiting = false;
        },
        error: function() {
            $.notifyBar({html: '操作失败', cls: 'error'});
        }
    });
}
