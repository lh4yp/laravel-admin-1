<?php
/**
 * 投票统计模型
 *
 */

namespace App\Http\Model\Common;

use App\Http\Model\Admin\VoteInfo;
use App\Http\Model\Admin\VoteMemberInfo;

class VoteStatistics extends BaseModel
{

    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'vote_statistics';

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
     * @var array  可搜索字段
     */
    //protected $searchField = ['name', 'description',];

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

    /**
     * 模型事件
     *
     * Author: Stephen
     * Date: 2020/5/18 16:58
     */
    protected static function booted()
    {
        //添加首页，系统管理，个人资料菜单/权限
        static::creating(function ($settingGroup) {
            //名称验重
            if(VoteStatistics::where('code',$settingGroup->code)->count() > 0){
                error('code已存在');
            }
        });
    }


}
