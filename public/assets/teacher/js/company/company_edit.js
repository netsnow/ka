var AdEditor = function(){
	this.waiting = false;
}

AdEditor.prototype.initForm = function(){
	// form验证
    var validator = $('form').validate({
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
             company_name:{
             	required: true
             	
             }
        },
        messages: {
            
             company_name:{
            	 required:"请输入企业名称"
             }
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
        success: function(response) {
            if (response.result !== true) {
                $.notifyBar({html: response.message, cls : 'error'});
                return;
            }

            $.notifyBar({html: response.message, cls : 'success'});
            if(returnUrl){
            	redirect(returnUrl);
            }else{
	            redirect('/admin/company');
            }
        }
    });
}
