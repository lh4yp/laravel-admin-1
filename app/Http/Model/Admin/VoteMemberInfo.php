<?php
/**
 * 被投票人信息
 */

namespace App\Http\Model\Admin;

use App\Http\Model\Common\VoteStatisticsDetail;

class VoteMemberInfo extends BaseModel
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'vote_member_info';

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
            if(self::where('name',$vote->name)->count() > 0){
                error('该人员已存在');
            }
        });
    }

    /**
     * 关联vote_info
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vote()
    {
        return $this->hasOne(VoteInfo::class,'id','vote_id');
    }

    /**
     * 关联category
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(VoteDetailCategory::class,'id','category_id');
    }

    /**
     * 关联category
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function store()
    {
        return $this->hasOne(VoteDetailStore::class,'id','store_id');
    }

    /**
     * 关联member_info
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statistics()
    {
        return $this->hasMany(VoteStatisticsDetail::class,'member_id','id');
    }


}