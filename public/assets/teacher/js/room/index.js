var RoomIndex = function()
{
    this.waiting = false;
}

RoomIndex.prototype.deleteSingle = function(target)
{
    var self = this;
    var data = {
        room_id: [$(target).data('id')],
        _token  : $('#csrfToken').val()
    };
//alert(data[0]);
    if (!confirm('您确定要删除选中房间吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/room/delete', data, function(response) {
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
/*GoodsIndex.prototype.editSingle = function(target){	
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
	
}*/

RoomIndex.prototype.deleteSelected = function()
{
    var self = this;

    var selected = [];
    $('input:checked[name="room_id[]"]').each(function() {
        selected.push($(this).val());
    });

    if (selected.length < 1) {
        alert('您没有选中要删除房间');
        return;
    }

    var data = {
        room_id: selected,
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中房间吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/room/delete', data, function(response) {
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
