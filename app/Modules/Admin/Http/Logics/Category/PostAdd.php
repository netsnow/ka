<?php

namespace App\Modules\Admin\Http\Logics\Category;

use App\Eloquents\Category;
use Exception;
use Request;
use Validator;

class PostAdd extends \BaseLogic
{
    protected function execute()
    {
        try {

            $this->validate();
            $this->saveCategory();

            $this->result['result'] = true;

        } catch (Exception $e) {

            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();

        }
    }

    protected function validate()
    {
        $validator = Validator::make(Request::all(), [
            'cat_name'   => 'required|max:50',
            'parent_id'  => 'numeric',
            'sort_order' => 'numeric',
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages()->first());
        }

        if (Request::has('parent_id') && Request::input('parent_id') > 0) {
            $parent = Category::find(Request::input('parent_id'));

            if (!$parent) {
                throw new Exception('上级分类不存在');
            }

            if (count(explode('-', $parent->path)) >= 3) {
                throw new Exception('分类最高支持三级');
            }

            $this->parent = $parent;
        }
    }

    /**
     * 保存分类信息
     * @return void
     */
    protected function saveCategory()
    {
        $newCategory = new Category;
        $newCategory->cat_name   = Request::input('cat_name');

        if (Request::has('parent_id')) {
            $newCategory->parent_id  = Request::input('parent_id');
        }

        if (Request::has('sort_order')) {
            $newCategory->sort_order = Request::input('sort_order');
        }

        $newCategory->save();

        if (Request::has('parent_id') && Request::input('parent_id') > 0) {
            $newCategory->path = $this->parent->path . '-' . $newCategory->cat_id;
        } else {
            $newCategory->path = $newCategory->cat_id;
        }

        $newCategory->save();

        $this->result['message'] = '分类添加成功';
    }
}
