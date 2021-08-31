<?php
/**
 * 被投票人信息
 */

namespace App\Http\Model\Admin;

class VoteDetailStore extends BaseModel
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'vote_detail_store';

    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * 事件
     */
    protected static function booted()
    {
        //保存
        static::creating(function ($vote) {
            //验重
            if(self::where('store_code',$vote->store_code)->count() > 0){
                error('该店代码已存在');
            }
        });
    }


}