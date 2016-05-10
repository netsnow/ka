<?php

namespace App\Modules\Admin\Http\Logics\Category;

use App\Eloquents\Category;
use Request;

class GetIndex extends \BaseLogic
{
    protected $categoryTag = [
        'category_first',
        'category_second',
        'category_third',
        'category_fourth',
        'category_fifth',
    ];

    protected function execute()
    {
        $this->getCategoryList();
    }

    /**
     * 取得分类列表
     * @return void
     */
    protected function getCategoryList()
    {
        $result = Category::where('parent_id', 0)
                          ->orderBy('sort_order')
                          ->get();

        $this->makeHtml($result);

        $this->result['cat_html'] = $this->html;
    }

    protected function makeHtml($items, $path = '0', $depth = 0)
    {
        if ($depth === 0) {
            $this->html = '';
        }

        foreach ($items as $item) {

            $children = $item->children;

            if ($depth > 4) {
                continue;
            }

            $this->html .= '<tr class="' . $this->categoryTag[$depth] . '" id="category_' . $path . '_' . $item->cat_id . '">';
            $this->html .= '    <td>';
            $this->html .= '        <div class="icheckbox_red">';
            $this->html .= '            <input tabindex="13" type="checkbox" name="cat_id[]" value="' . $item->cat_id . '">';
            $this->html .= '        </div>';
            $this->html .= '    </td>';
            $this->html .= '    <td class="sort"><span class="' . ($children->count() > 0 ? 'tree' : '') . '"><i class="' . ($children->count() > 0 ? 'icon_diff_added' : 'icon_primitive_square') . '"></i>' . $item->cat_name . '</span></td>';
            $this->html .= '    <td>' . $item->cat_id . '</td>';
            $this->html .= '    <td>' . ($item->is_show == 1 ? '是' : '否') . '</td>';
            $this->html .= '    <td>' . $item->sort_order . '</td>';
            $this->html .= '    <td class="text_right">';

            // 最大3级分类
            if ($depth <= 1) {
                $this->html .= '        <a class="btn btn_green" href="/admin/category/add?parent_id=' . $item->cat_id . '"><i class="icon_plus2 white"></i> 新增下级</a>';
            }

            $this->html .= '        <a class="btn btn_blue" href="/admin/category/edit/' . $item->cat_id . '"><i class="icon_pencil white"></i> 编辑</a>';
            $this->html .= '        <a class="btn btn_red delete-single" data-id="' . $item->cat_id . '"><i class="icon_icon_bin white"></i> 删除</a>';
            $this->html .= '    </td>';
            $this->html .= '</tr>';

            if ($children->count() > 0) {
                $this->makeHtml($children, $path . '_' . $item->cat_id,  $depth + 1);
            }
        }
    }
}
