var GoodsIndex = function()
{
    this.waiting = false;
}

GoodsIndex.prototype.deleteSingle = function(target)
{
    var self = this;
    var data = {
        goods_id: [$(target).data('id')],
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中商品吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/goods/delete', data, function(response) {
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
GoodsIndex.prototype.editSingle = function(target){	
	 var self = this;
	    var data = {
	        goods_id: [$(target).data('id')],
	        _token  : $('#csrfToken').val()
	    };

	    if (!confirm('确定执行该操作？')) {
	        return;
	    }
	    if (self.waiting === true) {
	        alert('请稍候...有其他操作动作正在执行');
	    }
	    self.waiting = true;
	    $.post('/admin/goods/edit', data, function(response) {
	        if (response.result == true) {
	        	
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

GoodsIndex.prototype.deleteSelected = function()
{
    var self = this;

    var selected = [];
    $('input:checked[name="goods_id[]"]').each(function() {
        selected.push($(this).val());
    });

    if (selected.length < 1) {
        alert('您没有选中要删除商品');
        return;
    }

    var data = {
        goods_id: selected,
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中商品吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/goods/delete', data, function(response) {
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
