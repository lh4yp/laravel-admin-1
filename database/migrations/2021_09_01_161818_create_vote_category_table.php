<?php
/**
 * 用户等级
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Jialeo\LaravelSchemaExtend\Schema;

class CreateVoteCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_detail_category', function (Blueprint $table) {

            //表的字段
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('vote_id')->default(0)->comment('关联投票id');
            $table->string('category',50)->default('')->comment('分类名称');
            $table->tinyInteger('status')->default('1')->comment('是否启用 0：否 1：是');
            $table->dateTime('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
            $table->dateTime('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新时间');

            //创建索引
            $table->index('vote_id','index_vote_id');

            //表的属性
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            //表注释
            $table->comment = '投票类型分类';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_detail_category');
    }
}
