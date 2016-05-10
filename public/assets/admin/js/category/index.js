var CategoryIndex = function()
{
    this.waiting = false;
}

CategoryIndex.prototype.deleteSingle = function(target)
{
    var self = this;
    var data = {
        category_id: [$(target).data('id')],
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中分类吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/category/delete', data, function(response) {
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

CategoryIndex.prototype.deleteSelected = function()
{
    var self = this;

    var selected = [];
    $('input:checked[name="cat_id[]"]').each(function() {
        selected.push($(this).val());
    });

    if (selected.length < 1) {
        alert('您没有选中要删除分类');
        return;
    }

    var data = {
        category_id: selected,
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中分类吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/category/delete', data, function(response) {
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
