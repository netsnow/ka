var Charging_priceIndex = function()
{
    this.waiting = false;
}

Charging_priceIndex.prototype.deleteSingle = function(target)
{
    var self = this;
    var data = {
        charging_price_id: [$(target).data('id')],
        _token : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中事件吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/charging_price/delete', data, function(response) {
        if (response.result !== true) {
            $.notifyBar({html: response.message, cls : 'error'});
            return false;
        }

        $.notifyBar({html: response.message, cls : 'success'});
        window.location.reload();
    }).complete(function(){
        self.waiting = false;
    }).error(function(){
        $.notifyBar({html: '删除失败', cls : 'error'});
    });
}

Charging_priceIndex.prototype.deleteSelected = function()
{
    var self = this;
    var selected = [];
    $('.checked input[name="charging_price_id[]"]').each(function() {
        selected.push($(this).val());
    });

    if (selected.length < 1) {
        alert('您没有选中要删除事件');
        return;
    }

    var data = {
    	charging_price_id: selected,
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中事件吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/charging_price/delete', data, function(response) {
        if (response.result !== true) {
            $.notifyBar({html: response.message, cls : 'error'});
            return false;
        }

        $.notifyBar({html: response.message, cls : 'success'});
        window.location.reload();
    }).complete(function(){
        self.waiting = false;
    }).error(function(){
        $.notifyBar({html: '删除失败', cls : 'error'});
    });
}
