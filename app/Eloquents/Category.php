<?php

namespace App\Eloquents;

class Category extends \BaseModel
{
    protected $table = 'category';
    protected $primaryKey = 'cat_id';

    public function children()
    {
        return $this->hasMany('App\Eloquents\Category', 'parent_id')
                    ->orderBy('sort_order');
    }

    public function store()
    {
    	return $this->belongsToMany('App\Eloquents\Store', 'store_category', 'cat_id', 'store_id');
    }
}
