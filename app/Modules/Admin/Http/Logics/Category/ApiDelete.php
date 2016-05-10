<?php

namespace App\Modules\Admin\Http\Logics\Category;

use App\Eloquents\Category;
use Exception;
use Request;

class ApiDelete extends \BaseLogic
{
    protected function execute()
    {
        try {

            $this->validate();
            $this->deleteCategory();

            $this->result['result'] = true;

        } catch (Exception $e) {

            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();

        }
    }

    protected function validate()
    {
        foreach (Request::input('category_id') as $value) {
            if (!is_numeric($value)) {
                throw new Exception('system error');
            }

            if ($category = Category::find($value)) {
                if (count($category->children) > 0) {
                    throw new Exception('选择的分类有下级，不能删除');
                }
            }
        }
    }

    /**
     * 删除分类
     * @return void
     */
    protected function deleteCategory()
    {
        Category::destroy(Request::input('category_id'));
        $this->result['message'] = '分类删除成功';
    }
}
