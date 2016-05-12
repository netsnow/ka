var CampaignEditor = function()
{
    this.waiting = false;
}

CampaignEditor.prototype.initForm = function()
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
            },
            campaign_timestart: {
                required : function(el){
                    return true;
                }
                //focusGetLost:true
            },
            campaign_timeend: {
                required:true
               /*min : function(){
                    return	 $("#timestart")[0].value
               }*/
            }
        },
        messages: {
            title: {
                required: '请输入活动名称',
                maxlength: '活动名不能超过50字符'
            },
            cover_image: {
                required: '请上传图片'
            },
            myEditor_input: {
                required: '请输入内容'
            },
            campaign_timestart: {
                required: '请选择活动开始时间'
            },
            campaign_timeend: {
                required: '请选择活动结束时间'
                //min:"活动开始时间必须小于结束时间"
            }
        }
    });
    $("input.date").Zebra_DatePicker({
        dateFormat: 'yy-mm-dd',
        onClose:function(date){
            console.log(1);
            this.focus();
            this.blur();
        }
    });


    $('.main-form input').on('keyup', function() {
        validator.element(this);
    });

    $('.main-form input[type="file"]').on('change', function() {
        validator.element(this);
    });

    $('.main-form input[name="campaign_timestart"]').on('focus', function() {
        validator.element(this);
    });
    $('.main-form input[name="campaign_timeend"]').on('focus', function() {
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
            redirect('/admin/campaign');
        },
        complete: function() {
            self.waiting = false;
        },
        error: function() {
            $.notifyBar({html: '操作失败', cls: 'error'});
        }
    });
}
