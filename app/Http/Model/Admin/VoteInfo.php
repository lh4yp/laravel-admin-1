<?php
/**
 * 投票信息
 */

namespace App\Http\Model\Admin;

use App\Http\Model\Common\VoteStatistics;
use App\Http\Model\Common\VoteStatisticsDetail;

class VoteInfo extends BaseModel
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'vote_info';

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
            if(self::where('title',$vote->title)->count() > 0){
                error('该title已存在');
            }
        });
    }

    /**
     * 关联member_info
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function member()
    {
        return $this->hasMany(VoteMemberInfo::class,'vote_id','id');
    }

    /**
     * 关联statistics
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statistics()
    {
        return $this->hasMany(VoteStatistics::class,'vote_id','id');
    }

    /**
     * 关联statisticsDetail
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statisticsDetail()
    {
        return $this->hasMany(VoteStatisticsDetail::class,'vote_id','id');
    }


}