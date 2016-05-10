var FactIndex = function()
{
    this.waiting = false;
}

FactIndex.prototype.deleteSingle = function(target)
{
    var self = this;
    var data = {
        fact_id: [$(target).data('id')],
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中品牌吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/fact/delete', data, function(response) {
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

FactIndex.prototype.deleteSelected = function()
{
    var self = this;

    var selected = [];
    $('.checked input[name="fact_id[]"]').each(function() {
        selected.push($(this).val());
    });

    if (selected.length < 1) {
        alert('您没有选中要删除品牌');
        return;
    }

    var data = {
        fact_id: selected,
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中品牌吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/fact/delete', data, function(response) {
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
