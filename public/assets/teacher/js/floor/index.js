var floorIndex = function()
{
	this.waiting = false;
}
/**
 * 删除单条数据预处理
 * @param {} target
 */
floorIndex.prototype.deleteSingle = function(target)
{
	var self = this;
    var floor_data = {
    		floor_id: [$(target).data('id')],
        _token  : $('#csrfToken').val()
    };
    
    openModel('您确定要删除此楼层吗？', {
    	success: function() {
			if (self.waiting === true) {
		        alert('请稍候...有其他操作动作正在执行');
		    }
		    self.waiting = true;
			$.post('/admin/floor/delete', floor_data, function(response) {
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

/**
 * 删除多条数据预处理
 */
floorIndex.prototype.deleteSelected = function()
{
    var self = this;
	var selected = [];
    $('input:checked[name="floor_id[]"]').each(function() {
        selected.push($(this).val());
    });

    if (selected.length < 1) {
        openAlert('您没有选中要删除楼层');
        return;
    }

    var floors_data = {
    	floor_id: selected,
        _token  : $('#csrfToken').val()
    };

    openModel('您确定要删除此楼层吗？', {
    	success: function() {
			if (self.waiting === true) {
		        alert('请稍候...有其他操作动作正在执行');
		    }
		    self.waiting = true;
		    $.post('/admin/floor/delete', floors_data, function(response) {
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

