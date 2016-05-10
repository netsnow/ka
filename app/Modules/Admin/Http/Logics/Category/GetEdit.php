<?php

namespace App\Modules\Admin\Http\Logics\Category;

use App\Eloquents\Category;
use Exception;
use Request;

class GetEdit extends \BaseLogic
{
    protected function execute()
    {
        $this->getCategory();
        $this->getCategoryInfo();
        $this->getCategoryOption();
    }

    /**
     * 取得分类
     * @return void
     */
    protected function getCategory()
    {
        $getCategory = Category::find($this->categoryId);

        if (!$getCategory) {
            abort(404, '没有这个分类');
        }

        $this->result['category'] = $getCategory;
    }

    /**
     * 取得分类信息
     * @return void
     */
    protected function getCategoryInfo()
    {
        $result = Category::all();

        $categoryInfo = [];
        foreach ($result as $category) {
            $categoryInfo[$category->cat_id] = $category->cat_name;
        }

        $this->result['category_info'] = $categoryInfo;
    }

    /**
     * 取得分类的层级选项
     * @return void
     */
    protected function getCategoryOption()
    {
        $result = Category::where('parent_id', 0)->get();

        $this->makeHtml($result);

        $this->result['opt_html'] = $this->html;
    }

    protected function makeHtml($items, $depth = 1)
    {
        if ($depth === 1) {
            $this->html = '';
        }

        foreach ($items as $item) {
            $this->html .= '<li><a href="javascript:void(0);" data-value="' . $item->cat_id . '">' . e($item->cat_name) . '</a>';
            if ($item->children->count() > 0) {
                $depth++;

                $this->html .= '<ul>';
                $this->makeHtml($item->children, $depth);
                $this->html .= '</ul>';
            }
            $this->html .= '</li>';
        }
    }
}
