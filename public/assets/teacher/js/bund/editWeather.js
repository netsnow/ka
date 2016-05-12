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
            weather_name:
            {
                required: true,
            },

            weather_remind:
            {
                required: true,
            },
        },

        messages:
        {
            weather_name:
            {
                required: '请输入天气名称',
            },

            weather_remind:
            {
                required: '请输入天气提醒',
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
            redirect('/admin/charging_price');
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
