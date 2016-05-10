var OrderIndex = function()
{
	this.waiting = false;
}

/**
 * 删除多条数据预处理
 */
OrderIndex.prototype.deleteSelected = function()
{
    var self = this;
	var selected = [];
    $('input:checked[name="order_id[]"]').each(function() {
        selected.push($(this).val());
    });

    if (selected.length < 1) {
        openAlert('您没有选中要删除的订单');
        return;
    }
    var orders_data = {
        order_id: selected,
        _token  : $('#csrfToken').val()
    };
    openModel('您确定要删除选中订单吗？', {
    	success: function() {
			if (self.waiting === true) {
		        openAlert('请稍候...有其他操作动作正在执行');
		    }
		    self.waiting = true;
		    $.post('/admin/order/delete', orders_data, function(response) {
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
    });
}

