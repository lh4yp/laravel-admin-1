<?php
/**
 * 投票详细分类
 *
 */

namespace App\Http\Model\Admin;

class VoteDetailCategory extends BaseModel
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'vote_detail_category';

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
        //添加
        static::creating(function ($vote) {
            //验重
            if(self::where('category',$vote->title)->count() > 0){
                error('该category已存在');
            }
        });
    }


}