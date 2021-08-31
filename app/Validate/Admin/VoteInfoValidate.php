<?php
/**
 * VoteInfoValidate
 */
namespace App\Validate\Admin;

use App\Validate\BaseValidate;

/**
 * AdminUser验证器
 */
class VoteInfoValidate extends BaseValidate {

    //验证规则
    protected $rule =[
        'title'                  => 'required',
        'content'                  => 'required',
        'rule'              => 'required',
        'banner'            => 'required',
        'start_time'        => 'required',
        'end_time'                  => 'required',
        'status'                    => 'required',
    ];

    //自定义验证信息
    protected $message = [
        'title.required'      => '投票名称必填',
        'content.required'      => '投票内容必填',
        'rule.required'       => '投票规则必选',
        'banner.required'       => 'banner主图',
        'start_time.required'       => '开始时间必填必填',
        'end_time.required'       => '结束时间必填',
    ];

    //自定义场景
    protected $scene = [
        'add'      => ['title', 'content', 'rule', 'banner','start_time','end_time'],
        'edit'     => ['title', 'content', 'rule', 'banner','start_time','end_time']
    ];
}