<?php
namespace Modules\Backend\Entities;

class Article extends BaseEntity
{
    protected $fillable = ['user_id', 'title', 'excerpt', 'hits', 'status', 'push_front',
        'publish_begin', 'publish_end'];
}
