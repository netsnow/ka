var PromotionEditor = function()
{
    this.waiting = false;
}

PromotionEditor.prototype.initForm = function()
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
                error.css('right', '-74px');
                element.after(error);
            } else {
                element.after(error);
            }
        },
        rules: {
            title: {
                required: true,
                maxlength: 50
            },
            cover_image: {
                required: function(el) {
                    if ($('.main-form .img_view').length) {
                        return $(el).closest('.uploader').siblings('.img_view').is(':hidden');
                    }
                    return true;
                }
            },
            myEditor_input: {
                required: function(el) {
                    var content = UM.getEditor('myEditor').getContent();
                    $('#myEditor_input').val(content);
                    if (content.length) {
                        return false;
                    }
                    return true;
                }
            }
        },
        messages: {
            title: {
                required: '请输入优惠标题',
                maxlength: '优惠标题不能超过50字符'
            },
            cover_image: {
                required: '请上传图片'
            },
            myEditor_input: {
                required: '请输入内容'
            }
        }
    });

    $('.main-form input').on('keyup', function() {
        validator.element(this);
    });

    $('.main-form input[type="file"]').on('change', function() {
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
            redirect('/admin/promotion');
        },
        complete: function() {
            self.waiting = false;
        },
        error: function() {
            $.notifyBar({html: '操作失败', cls: 'error'});
        }
    });
}
