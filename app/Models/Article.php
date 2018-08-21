<?php
namespace App\Models;

class Article extends BaseModel
{
    protected $fillable = ['user_id', 'title', 'excerpt', 'hits', 'status', 'push_front',
        'publish_begin', 'publish_end'];
}
