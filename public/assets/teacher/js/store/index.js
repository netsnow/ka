var StoreIndex = function()
{
    this.waiting = false;
}
/**
 * 删除单条数据预处理
 * @param {} target
 */
StoreIndex.prototype.deleteSingle = function(target)
{
    var self = this;
    var data = {
        storeDelId: [$(target).data('id')],
        _token  : $('#csrfToken').val()
    };

    openModel('您确定要删除此店铺吗？', {
        success: function() {

            if (self.waiting === true) {
                alert('请稍候...有其他操作动作正在执行');
            }
            self.waiting = true;
            $.post('/admin/store/delete', data, function(response) {
                if (response.status != 1) {
                    $.notifyBar({html: response.message, cls : 'error'});
                    return false;
                }

                $.notifyBar({html: response.message, cls : 'success'});
                setTimeout('window.location.reload()', 2000);
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
StoreIndex.prototype.deleteSelected = function()
{
    var self = this;
    var selected = [];
    $('input:checked[name="storeCheckbox[]').each(function() {
        selected.push($(this).val());
    });

    if (selected.length < 1) {
        openAlert('您没有选中要删除店铺');
        return;
    }

    var data = {
        storeDelId: selected,
        _token  : $('#csrfToken').val()
    };

    openModel('您确定要删除选中的店铺吗？', {
        success: function() {
            if (self.waiting === true) {
                alert('请稍候...有其他操作动作正在执行');
            }
            self.waiting = true;
            $.post('/admin/store/delete', data, function(response) {
                if (response.status != 1) {
                    $.notifyBar({html: response.message, cls : 'error'});
                    return false;
                }

                $.notifyBar({html: response.message, cls : 'success'});
                setTimeout('window.location.reload()', 2000);
            }).complete(function(){
                self.waiting = false;
            }).error(function(){
                $.notifyBar({html: '删除失败', cls : 'error'});
            });
        }
    });
}

