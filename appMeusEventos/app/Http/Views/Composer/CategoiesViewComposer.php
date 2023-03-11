<?php

namespace App\Http\Views\Composer;

use App\Models\Category;

class CategoiesViewComposer
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function composer($view)
    {
        return $view->with('categories', $this->category->all(['nome', 'slug']));
    }
}
