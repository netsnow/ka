var CategoryEdit = function()
{
    this.waiting = false;
}

CategoryEdit.prototype.initForm = function()
{
    var self = this;

    // form验证
    var validator = $('.main-form').validate({
        errorPlacement: function(error, element) {
            error.addClass('errorAlert left');
            element.after(error);
        },
        rules: {
            cat_name: {
                required: true,
                maxlength: 50
            }
        },
        messages: {
            cat_name: {
                required: '请输入分类名称',
                maxlength: '分类名称不能超过50字符'
            }
        }
    });

    $('.main-form input').on('keyup', function() {
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
            redirect('/admin/category');
        },
        complete: function() {
            self.waiting = false;
        },
        error: function() {
            $.notifyBar({html: '操作失败', cls: 'error'});
        }
    });
}
