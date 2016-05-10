var Order_addEditor = function()
{
    this.waiting = false;
}

Order_addEditor.prototype.initForm = function()
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
        		user_name:{
                	required: true,
                },
                phone: {
                    required: true,
                    number:true,
                    minlength:11,
                    maxlength:11,
                },
                start_date:{
                	required: true,
                },
                end_date:{
                	required: true,
                }
                
            } ,
            messages: {
            	user_name:{
                	required: '请输入用户名',
                },
                phone: {
                    required: '请输入会手机号',
                    minlength:'请输入11位手机号',
                    maxlength:'请输入11位手机号',
                    number:'请输入数字'
                },
                start_date:{
                	required: '请输入开始时间',
                },
                end_date:{
                	required: '请输入结束时间',
                }
                
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
            redirect('/admin/seat');
        },
        complete: function() {
            self.waiting = false;
        },
        error: function() {
            $.notifyBar({html: '操作失败', cls: 'error'});
        }
    });
}
