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
               account: {
                   number: true,
            },
             other_account: {
                number: true,
            },
          },
            messages: {
            	account: {
                    number:   '请输入数字'
            	},
            	other_account: {
                    number: '请输入数字'
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
