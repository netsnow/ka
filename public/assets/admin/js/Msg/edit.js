var TextEditor = function()
{
    this.waiting = false;
}

TextEditor.prototype.initForm = function()
{
    var self = this;

    // form验证
    var validator = $('.main-form').validate({
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
                required: true,
                maxlength: 50
            },
        },
        messages: {
            user_name: {
                required: '请输入品牌名称',
                maxlength: '品牌名不能超过50字符'
            },
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
                return;
            }

            $.notifyBar({html: response.message, cls: 'success'});
            redirect('/admin/Text');
        },
        complete: function() {
            self.waiting = false;
        },
        error: function() {
            $.notifyBar({html: '操作失败', cls: 'error'});
        }
    });
}
