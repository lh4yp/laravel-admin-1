<?php
/**
 * 用户等级
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Jialeo\LaravelSchemaExtend\Schema;

class CreateVoteRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_rule', function (Blueprint $table) {

            //表的字段
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('rule', 50)->collation('utf8mb4_unicode_ci')->default('')->comment('投票标题');
            $table->tinyInteger('count')->default(1)->comment('最多投票数');
            $table->tinyInteger('is_per_day')->default(0)->comment('投票数是否每天重置');
            $table->tinyInteger('per_day_count')->default(0)->comment('每日允许投票数');
            $table->tinyInteger('status')->default('1')->comment('是否启用 0：否 1：是');
            $table->dateTime('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
            $table->dateTime('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新时间');

            //表的属性
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            //表注释
            $table->comment = '投票规则列表';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_rule');
    }
}
