var StoreEdit = function()
{
    this.waiting = false;
}

StoreEdit.prototype.initForm = function()
{
    var self = this;

    // form验证
    var validator = $('.main-form').validate({
        errorPlacement: function(error, element) {
            error.addClass('errorAlert left');
            // element.after(error);
            if (element[0].type === 'file') {
            	error.css('right', '-108px');
            	element.closest('.uploader').after(error);
            } else if (element.attr('id') === 'description') {
            	// console.log($('#description').val());
            	error.css('right', '-74px');
            	element.after(error);
            } else {
            	element.after(error);
            }
        },
        rules: {
            store_name: {
                required: true,
                maxlength: 50
            },
            owner_name: {
            	maxlength: 50
            },
            tel: {
            	required: true,
            	maxlength: 20  
            },
            description: {
            	required: function(el) {
            		var content = UM.getEditor('myEditor').getContent();
            		$('#description').val(content);
            		if (content.length) {
            			return false;
            		}
            		return true;
            	}
            },
            storeLogo: {
            	required: function(el) {
					if ($('.main-form .img_view').length) {
                        return $(el).closest('.uploader').siblings('.img_view').is(':hidden');
                    }
                    return true;
            	}
            },
            storeBG: {
				required: function(el) {
					if ($('.main-form .img_view').length) {
                        return $(el).closest('.uploader').siblings('.img_view').is(':hidden');
                    }
                    return true;
            	}
            },

        },
        messages: {
            store_name: {
                required: '请输入店铺名称',
                maxlength: '店铺名称不能超过50字符'
            },
            owner_name: {
            	maxlength: '店主名称不能超过50字符'
            },
            tel: {
            	required: '请输入电话号码',
            	// sss: '电话号码格式不正确',
            	maxlength: '电话号码不能超过20位'
            },
            description: {
            	required: '请输入店铺描述'
            },
            storeLogo: {
            	required: '请选择店铺Logo'
            },
            storeBG: {
            	required: '请选择店铺背景'
            }         
        }
    });

    // $('.main-form input').on('keyup', function() {
    //     validator.element(this);
    // });

    // $(window).on('keyup', function(e) {
    //     var um = UM.getEditor('myEditor');
    //     if (um.isFocus()) {
    //         validator.element($('input[name="description"]'));
    //     }
    // });

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
            redirect('/admin/store');
        },
        complete: function() {
            self.waiting = false;
        },
        error: function(e) {
        	console.log(e);
            $.notifyBar({html: '操作失败', cls: 'error'});
        }
    });
}

 