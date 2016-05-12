var SettingEditor = function()
{
    this.waiting = false;
}

SettingEditor.prototype.initForm = function()
{
    var self = this;
        // form验证
    var validator = $('.main-form').validate({
        errorPlacement: function(error, element)
        {
            error.addClass('errorAlert left');

            if (element[0].type === 'file')
            {
                error.css('right', '-108px');
                element.closest('.uploader').after(error);
            }

            else
            {
                element.after(error);
            }
        },

        rules:
        {
            version_message:
            {
                required: true,
            },

            key:
            {
                required: true,
            },
 
            update_url:
            {
                required:true,
                url:true,
            },

            version_number:
            {
                required:true,
            },
        },

        messages:
        {
            version_message:
            {
                required: '请输入版本介绍',
            },

            key:
            {
                required: '请输入系统名称',
            },

            update_url:
            {
                required: '请输入URL',
                url: '请输入正确格式的URL地址',
            },

            version_number:
            {
                required: '请输入新版本号',
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
        beforeSubmit: function()
        {
            if (self.waiting === true)
            {
                alert('请稍候...有其他操作动作正在执行');
                return false;
            }

            self.waiting = true;
        },

        success: function(response)
        {
            if (response.result !== true)
            {
                $.notifyBar({html: response.message, cls: 'error'});
                return;
            }

            $.notifyBar({html: response.message, cls: 'success'});
            redirect('/admin/setting');
        },

        complete: function()
        {
            self.waiting = false;
        },

        error: function()
        {
            $.notifyBar({html: '操作失败', cls: 'error'});
        }
    });
}
