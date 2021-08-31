<?php
/**
 * 投票统计模型
 *
 */

namespace App\Http\Model\Common;

use App\Http\Model\Admin\VoteInfo;
use App\Http\Model\Admin\VoteMemberInfo;

class VoteStatisticsDetail extends BaseModel
{

    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'vote_statistics_detail';

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
     * 不可批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * 关联vote_info
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vote()
    {
        return $this->hasOne(VoteInfo::class,'id','vote_id');
    }

    /**
     * 关联vote_info
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function member()
    {
        return $this->hasOne(VoteMemberInfo::class,'id','member_id');
    }


}
