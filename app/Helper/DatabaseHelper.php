<?php

namespace App\Helper;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class DatabaseHelper
{
    public static function getBlogCountByCategoryId($categoryId)
    {
        $count = Blog::where('category_id', $categoryId)->count();

        return $count;
    }
}
