var Seat_priceIndex = function()
{
    this.waiting = false;
}

Seat_priceIndex.prototype.deleteSingle = function(target)
{
    var self = this;
    var data = {
    	seat_price_id: [$(target).data('id')],
        _token : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中工位类型吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/seat_price/delete', data, function(response) {
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

Seat_priceIndex.prototype.deleteSelected = function()
{
    var self = this;
    var selected = [];
    $('.checked input[name="seat_price_id[]"]').each(function() {
        selected.push($(this).val());
    });

    if (selected.length < 1) {
        alert('您没有选中要删除工位类型');
        return;
    }

    var data = {
    	seat_price_id: selected,
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中工位类型吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/seat_price/delete', data, function(response) {
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
