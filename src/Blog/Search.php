<?php declare(strict_types=1);

namespace App\Blog;

use App\Blog\Category;
use App\Blog\Interface\ICategorizable;

class Search
{
    public static function hasCategory(ICategorizable $object, Category $category): bool
    {
        if ($object->getCategory() == $category) {
            return true;
        }

        return false;
    }
}