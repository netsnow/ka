var PaymentIndex = function()
{
    this.waiting = false;
}

PaymentIndex.prototype.changeed = function(target)
{
    var self = this;
    var data = {
        payment_id: [$(target).data('id')],
        _token  : $('#csrfToken').val()
    };

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/payment/change', data, function(response) {
        if (response.result !== true) {
            $.notifyBar({html: response.message, cls : 'error'});
            return false;
        }

        $.notifyBar({html: response.message, cls : 'success'});
        window.location.reload();
    }).complete(function(){
        self.waiting = false;
    }).error(function(){
        $.notifyBar({html: '操作失败', cls : 'error'});
    });
}
