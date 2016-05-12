var AdIndex = function()
{
	this.waiting = false;
}
/**
 * 删除单条数据预处理
 * @param {} target
 */
AdIndex.prototype.deleteSingle = function(target)
{
    var self = this;
    var ad_data = {
        ad_id  : [$(target).data('id')],
        _token : $('#csrfToken').val()
    };

    openModel('您确定要删除此广告吗？', {
        success: function() {
            if (self.waiting === true) {
                openAlert('请稍候...有其他操作动作正在执行');
            }
            self.waiting = true;
            $.post('/admin/ad/delete', ad_data, function(response) {
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
AdIndex.prototype.deleteSelected = function()
{
    var self = this;
    var selected = [];
    $('input:checked[name="ad_id[]"]').each(function() {
        selected.push($(this).val());
    });

    if (selected.length < 1) {
        openAlert('您没有选中要删除广告');
        return;
    }

    var ads_data = {
        ad_id  : selected,
        _token : $('#csrfToken').val()
    };

    openModel('您确定要删除此广告吗？', {
        success: function() {
            if (self.waiting === true) {
                openAlert('请稍候...有其他操作动作正在执行');
            }
            self.waiting = true;
            $.post('/admin/ad/delete', ads_data, function(response) {
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
