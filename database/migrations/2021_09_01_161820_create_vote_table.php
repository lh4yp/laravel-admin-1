<?php
/**
 * 用户等级
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Jialeo\LaravelSchemaExtend\Schema;

class CreateVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_info', function (Blueprint $table) {

            //表的字段
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('title', 30)->collation('utf8mb4_unicode_ci')->default('')->comment('投票标题');
            $table->string('content', 500)->collation('utf8mb4_unicode_ci')->default('')->comment('投票说明');
            $table->tinyInteger('rule_id')->default(1)->comment('投票规则');
            $table->string('banner', 255)->collation('utf8mb4_unicode_ci')->default('')->comment('banner图片');
            $table->string('start_time',50)->default('0000-00-00 00:00:00')->comment('开始时间');
            $table->string('end_time',50)->default('0000-00-00 00:00:00')->comment('结束时间');
            $table->tinyInteger('status')->default('1')->comment('是否启用 0：否 1：是');
            $table->dateTime('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
            $table->dateTime('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新时间');

            //表的属性
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            //表注释
            $table->comment = '投票信息';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_info');
    }
}
