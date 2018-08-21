<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsInit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        Schema::connection($connection)->create('voc_taxonomies', function(Blueprint $table){
            $table->increments('id');
            $table->string('vid', 64)->comment('machine name');
            $table->string('name', 64)->comment('name');
            $table->integer('weight')->default(0);
            $table->string('description', 255)->default('');

            $table->timestamps();
        });

        Schema::connection($connection)->create('voc_terms', function(Blueprint $table){
            $table->increments('id');
            $table->string('vid', 64)->comment('machine name');
            $table->integer('parent_id')->default(0);
            $table->string('name', 64)->comment('name');
            $table->integer('weight')->default(0);
            $table->integer('num')->default(0)->comment('引用数量');
            $table->string('description', 255)->default('');

            $table->timestamps();
        });

        Schema::connection($connection)->create('files', function(Blueprint $table){
            $table->increments('id');
            $table->string('name', 255)->nullable()->default('')->comment('显示的文件名');
            $table->string('original_name', 255)->nullable()->default('')->comment('原文件名');
            $table->string('mime', 64)->default('')->comment('mime');
            $table->string('uri', 255)->comment('路径');
            $table->string('extension', 32)->default('')->comment('后缀');
            $table->string('scope', 64)->default('')->comment('对应模型：posts  avatar ');
            $table->timestamps();
        });

        Schema::connection($connection)->create('articles', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title', 255);
            $table->string('excerpt', 255);
            $table->unsignedInteger('hits')->nullable()->default(0)->comment('点击量');
            $table->smallInteger('status')->default(1)->comment('0:未发布  1:发布');
            $table->unsignedSmallInteger('push_front')->default(0)->comment('首页推送');
            $table->timestamp('publish_begin')->nullable();
            $table->timestamp('publish_end')->nullable();
            $table->timestamps();
        });

        Schema::connection($connection)->create('article_images', function(Blueprint $table){
            $table->integer('article_id');
            $table->integer('file_id');
            $table->integer('weight')->nullable()->default(0);

            $table->primary(['article_id', 'file_id']);
        });

        Schema::connection($connection)->create('article_voc_terms', function(Blueprint $table){
            $table->integer('article_id');
            $table->integer('voc_term_id');

            $table->primary(['article_id', 'voc_term_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        Schema::connection($connection)->dropIfExists('voc_taxonomies');
        Schema::connection($connection)->dropIfExists('voc_terms');
        Schema::connection($connection)->dropIfExists('files');
        Schema::connection($connection)->dropIfExists('articles');
        Schema::connection($connection)->dropIfExists('article_images');
        Schema::connection($connection)->dropIfExists('article_voc_terms');
    }
}
