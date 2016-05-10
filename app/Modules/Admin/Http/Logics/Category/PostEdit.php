<?php

namespace App\Modules\Admin\Http\Logics\Category;

use App\Eloquents\Category;
use Exception;
use Request;
use Validator;

class PostEdit extends \BaseLogic
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

        // 判断id是否存在
        $this->category = Category::find($this->categoryId);
        if (!$this->category) {
            throw new Exception('分类不存在');
        }

        // 判断上级分类是否存在
        if (Request::has('parent_id') && Request::input('parent_id') > 0) {
            $parent = Category::find(Request::input('parent_id'));

            if (!$parent) {
                throw new Exception('上级分类不存在');
            }

            $this->parent = $parent;
        }
    }

    /**
     * 保存分类
     * @return void
     */
    protected function saveCategory()
    {
        $this->category->cat_name   = Request::input('cat_name');

        if (Request::has('parent_id') && Request::input('parent_id') > 0) {
            $this->category->parent_id  = Request::input('parent_id');

            $oriPath = $this->category->path . '-';
            $this->category->path       = $this->parent->path . '-' . $this->category->cat_id;

            // 更新所有子分类的path
            $allChildren = Category::whereRaw('path like "' . $oriPath . '%"')
                                     ->get();

            foreach ($allChildren as $child) {
                $child->path = $this->parent->path . '-' . $child->path;
                $child->save();
            }
        } elseif ($this->category->parent_id > 0) {
            $this->category->parent_id  = 0;

            $oriPath = $this->category->path . '-';
            $this->category->path       = $this->category->cat_id;

            // 更新所有子分类的path
            $allChildren = Category::whereRaw('path like "' . $oriPath . '%"')
                                     ->get();

            foreach ($allChildren as $child) {
                $paths = explode('-' . $this->category->cat_id . '-', $child->path);
                $child->path = $this->category->cat_id . '-' . $paths[1];
                $child->save();
            }
        }

        if (Request::has('sort_order')) {
            $this->category->sort_order = Request::input('sort_order');
        } else {
            $this->category->sort_order = 0;
        }

        $this->category->save();

        $this->result['message'] = '分类编辑成功';
    }
}
