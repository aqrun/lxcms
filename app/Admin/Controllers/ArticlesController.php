<?php
namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Grid;

class ArticlesController extends BaseController
{
    public function index(){

        return Admin::content(function(Content $content){
            $content->header('Articles');
            $content->description('User Articles');
            $content->breadcrumb(
                ['text' => 'Articles', 'url' => '/admin/articles']
            );

            $grid = Admin::grid(Article::class, function(Grid $grid){
                $grid->id('ID')->sortable();
                $grid->column('title', 'Title');
                $grid->hits()->sortable();
                $grid->status();
                $grid->created_at();
            });
            $content->body($grid);
        });
    }
}
