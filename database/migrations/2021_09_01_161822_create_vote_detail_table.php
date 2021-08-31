<?php
/**
 * 用户等级
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Jialeo\LaravelSchemaExtend\Schema;

class CreateVoteDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_statistics_detail', function (Blueprint $table) {

            //表的字段
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('vote_id')->default(0)->comment('关联投票id');
            $table->unsignedInteger('member_id')->default(0)->comment('关联被投票人id');
            $table->string('vote_man_openid',100)->default('')->comment('投票人openId');
            $table->string('vote_man_nicskname',100)->default('')->comment('nickName');
            $table->unsignedBigInteger('vote_man_count')->default(1)->comment('投票数');
            $table->tinyInteger('status')->default('1')->comment('是否启用 0：否 1：是');
            $table->dateTime('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
            $table->dateTime('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新时间');

            //创建索引
            $table->index('member_id','index_member');

            //表的属性
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            //表注释
            $table->comment = '投票参与人信息';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_statistics_detail');
    }
}
