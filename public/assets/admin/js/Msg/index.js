var MsgIndex = function()
{
    this.waiting = false;
}

MsgIndex.prototype.deleteSingle = function(target)
{
    var self = this;
    var data = {
        msg_id: [$(target).data('id')],
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中留言吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/Msg/delete', data, function(response) {
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


MsgIndex.prototype.changeSingle = function(target)
{
    var self = this;
    var data = {
        msg_id: [$(target).data('id')],
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要标记选中留言吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/Msg/Change', data, function(response) {
        if (response.result !== true) {
            $.notifyBar({html: response.message, cls : 'error'});
            return false;
        }

        $.notifyBar({html: response.message, cls : 'success'});
        window.location.reload();
    }).complete(function(){
        self.waiting = false;
    }).error(function(){
        $.notifyBar({html: '标记失败', cls : 'error'});
    });
}


