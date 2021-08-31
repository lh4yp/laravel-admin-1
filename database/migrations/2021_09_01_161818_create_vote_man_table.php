<?php
/**
 * 用户等级
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Jialeo\LaravelSchemaExtend\Schema;

class CreateVoteManTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_member_info', function (Blueprint $table) {

            //表的字段
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('vote_id')->default(0)->comment('关联投票id');
            $table->unsignedInteger('category_id')->default(0)->comment('关联投票类型id');
            $table->unsignedInteger('store_id')->default(0)->comment('关联店id');
            $table->string('name', 30)->collation('utf8mb4_unicode_ci')->default('')->comment('投票人姓名');
            $table->string('img', 255)->collation('utf8mb4_unicode_ci')->default('')->comment('投票展示图片');
            $table->unsignedInteger('sort')->default(1)->comment('指定排序');
            $table->tinyInteger('status')->default('1')->comment('是否启用 0：否 1：是');
            $table->dateTime('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
            $table->dateTime('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新时间');

            //创建索引
            $table->index('vote_id','index_vote_id');
            $table->unique('name');

            //表的属性
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            //表注释
            $table->comment = '被投票人信息';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_member_info');
    }
}
