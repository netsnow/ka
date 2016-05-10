var GoodsEditor = function()
{
    this.waiting = false;
}

GoodsEditor.prototype.initForm = function()
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
        rules:
        {
        	goods_name:
        	{
                required: true,
            },
            price:
        	{
                required: true,
                number:true,
            },
            store_name:
            {
            	required: true,
            },
            goods_img:
        	{
                required: true,
            },
            
        },
        messages:
        {
        	goods_name:
        	{
                required: '请输入商品名称',
            },
            price:
        	{
                required: '请输入商品价格',
                number:'请填入数字',
            },
            store_name:
        	{
                required: '请输入店铺名称',
            },
            goods_img:
        	{
                required: '请上传图片',
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
            redirect('/admin/goods');
        },
        complete: function() {
            self.waiting = false;
        },
        error: function() {
            $.notifyBar({html: '操作失败', cls: 'error'});
        }
    });
}
