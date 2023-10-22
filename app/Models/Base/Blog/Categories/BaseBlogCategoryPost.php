<?php

namespace App\Models\Base\Blog\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseBlogCategoryPost extends Model
{
    use HasFactory;
    protected $table = 'base_blog_categories_posts';
}
