var UserManageIndex = function()
{
    this.waiting = false;
}

UserManageIndex.prototype.deleteSingle = function(target)
{
    var self = this;
    var data = {
        company_id: [$(target).data('id')],
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除该企业吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/company/delete', data, function(response) {
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

UserManageIndex.prototype.deleteSelected = function()
{
    var self = this;

    var selected = [];
    $('.checked input[name="company_id[]"]').each(function() {
        selected.push($(this).val());
    });

    if (selected.length < 1) {
        alert('您没有选中要删除企业');
        return;
    }

    var data = {
        company_id: selected,
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除这些企业吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/company/delete', data, function(response) {
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
