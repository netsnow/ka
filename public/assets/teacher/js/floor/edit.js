var floorEdit = function() {
}

floorEdit.prototype.formInit = function() {
    // form验证
	 var validator = $('form').validate({
    	errorPlacement: function(error, element) {
            error.addClass('errorAlert left');
            if (element[0].type === 'file') {
                error.css('right', '-70px');
                element.closest('.uploader').after(error);
            } else {
                element.after(error);
            }
        },
       rules: {
    	   "floor_name": {
                required: true
            }
            
            
       },
       messages: {
    	   "floor_name": {
                required: '请输入楼房名称'
            }
            
            
       }
    });
    $('.main-form input').on('keyup', function() {
        validator.element(this);
    });

    // ajax提交
    $('form').ajaxForm({
        success: function(response) {
            if (response.result !== true) {
                $.notifyBar({html: response.message, cls : 'error'});
                return;
            }

            $.notifyBar({html: response.message, cls : 'success'});
            location.href='/admin/floor';
        }
    
    });
}
