var ImportDataIndex = function()
{
    this.waiting = false;
}

ImportDataIndex.prototype.initForm = function()
{
    var self = this;

    // ajax提交
    $('.main-form').ajaxForm({
        beforeSubmit: function() {
            if (self.waiting === true) {
                alert('请稍候...有其他操作动作正在执行');
                return false;
            }

            if ($('#studentFile').val() == '' &&
                $('#teacherFile').val() == '') {
                $.notifyBar({html: '请选择教师信息或者学生信息Excel文件', cls: 'error'});
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
        },
        complete: function() {
            self.waiting = false;
        },
        error: function() {
            $.notifyBar({html: '操作失败', cls: 'error'});
        }
    });
}
