var SeatIndex = function()
{
    this.waiting = false;
}

SeatIndex.prototype.deleteSingle = function(target)
{
    var self = this;
    var data = {
       seat_id: [$(target).data('id')],
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中工位吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/seat/delete', data, function(response) {
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

//定义批量删除函数
SeatIndex.prototype.deleteSelected = function()
{
    var self = this;

    var selected = [];//定义一个数组
    $('input:checked[name="seat_id[]"]').each(function() {
        selected.push($(this).val());//遍历添加，把这个要删除的放入删除的数组中
    });

    if (selected.length < 1) {
        alert('您没有选中要删除工位');
        return;
    }

    var data = {
        seat_id: selected,
        _token  : $('#csrfToken').val()
    };

    if (!confirm('您确定要删除选中工位吗？')) {
        return;
    }

    if (self.waiting === true) {
        alert('请稍候...有其他操作动作正在执行');
    }
    self.waiting = true;
    $.post('/admin/seat/delete', data, function(response) {
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

SeatIndex.prototype.addorderSelected = function()
{
    var self = this;
    
    var selected = [];
    
    $('.checked input[name="seat_id[]"]').each(function() {
        selected.push($(this).val());
    });
    
    var data = {
            seat_id: selected,
            _token  : $('#csrfToken').val()
        };
    
    if (selected.length < 1) {
        alert('您没有选中要添加的工位');
        return;
    }



    // ajax提交
    $('.main-form').ajaxForm({
        beforeSubmit: function() {
            if (self.waiting === true) {
                alert('请稍候...有其他操作动作正在执行');
                return false;
            }
            self.waiting = true;
        },
        success: function(response) {
            if (response.result !== true) {
                $.notifyBar({html: response.message, cls: 'error'});
                return;
            }

            $.notifyBar({html: response.message, cls: 'success'});
            //redirect('/admin/seat');
        },
        complete: function() {
            self.waiting = false;
        },
        error: function() {
            $.notifyBar({html: '操作失败', cls: 'error'});
        }
    });
}
