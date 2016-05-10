var RoomEditor = function()
{
    this.waiting = false;
}

RoomEditor.prototype.initForm = function()
{
    var self = this;

    // form验证
    var validator = $('.main-form').validate({
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
            room_num: {
                required: true,
                maxlength: 50
            },
            room_size: {
                required: true,
                number:true
            },
            room_descript: {
            	maxlength: 225         
            },
            room_price: {
                required: true         
            }
            
        },
        messages: {
        	room_num: {
                required: '请输入房间号',
                maxlength: '房间号不能超过50字符'
            },
            room_size: {
                required: '请输入房间规格',  
                number:'请填入数字'
            },
            room_descript: {
                maxlength: '不能超过225字符'
            },
            room_price: {
                required: '请输入房间定价',   
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
            if(response.message=="请选择楼层")
            	{
            	 $.notifyBar({html: response.message, cls: 'error'});
                 return;
            	}
            if(response.message!="该楼层房间已存在")
            	{
            $.notifyBar({html: response.message, cls: 'success'});
            redirect('/admin/room');
            }
            else{
            	 $.notifyBar({html: response.message, cls: 'error'});
                 return;
                 }
       
        },
        complete: function() {
            self.waiting = false;
        },
        error: function() {
            $.notifyBar({html: '操作失败', cls: 'error'});
        }
    });
}
