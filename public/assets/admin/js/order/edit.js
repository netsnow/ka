var OrderEditor = function()
{
    this.waiting = false;
}


OrderEditor.prototype.initForm = function()
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
	    	order_amount:
	        {
	            required: true,
	        }, 
	    },
	
	    messages:
	    {
	    	order_amount:
	        {
	            required: '请输入金额',
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
            redirect('/admin/order');
        },
        complete: function() {
            self.waiting = false;
        },
        error: function() {
            $.notifyBar({html: '操作失败', cls: 'error'});
        }
    });
}
