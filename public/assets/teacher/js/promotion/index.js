var PromotionIndex = function()
{
    this.waiting = false;
}
/**
 * 删除单条数据预处理
 * @param {} target
 */
PromotionIndex.prototype.deleteSingle = function(target)
{
    var self = this;
    var data = {
        promotion_id: [$(target).data('id')],
        _token  : $('#csrfToken').val()
    };

    openModel('您确定要删除此优惠吗？', {
        success: function() {

            if (self.waiting === true) {
                alert('请稍候...有其他操作动作正在执行');
            }
            self.waiting = true;
            $.post('/admin/promotion/delete', data, function(response) {
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
PromotionIndex.prototype.deleteSelected = function()
{
    var self = this;
    var selected = [];
    $('input:checked[name="promotion_id[]').each(function() {
        selected.push($(this).val());
    });

    if (selected.length < 1) {
        alert('您没有选中要删除优惠吗');
        return;
    }

    var data = {
        promotion_id: selected,
        _token  : $('#csrfToken').val()
    };

    openModel('您确定要删除此优惠吗？', {
        success: function() {
            if (self.waiting === true) {
                alert('请稍候...有其他操作动作正在执行');
            }
            self.waiting = true;
            $.post('/admin/promotion/delete', data, function(response) {
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

