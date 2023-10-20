<?php

namespace App\Models\Base\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseBlogPostLocalisation extends Model
{
    use HasFactory;
    protected $table = 'base_blog_posts_localisations';
}
