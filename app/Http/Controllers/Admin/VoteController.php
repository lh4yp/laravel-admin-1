<?php
/**
 * 投票管理
 */

namespace App\Http\Controllers\Admin;

use App\Services\VoteService;

class VoteController extends BaseController
{
    /**
     * @var VoteService 投票管理服务
     */
    protected $VoteService;

    /**
     * UserController 构造函数.
     *
     * @param VoteService $VoteService
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct(VoteService $VoteService)
    {
        parent::__construct();

        $this->VoteService = $VoteService;
    }

    /**
     * 投票管理列表页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

     */
    public function index()
    {
        $data = $this->VoteService->getPageData();

        return view('admin.user.index',$data);
    }

    /**
     * 导出
     *
     * @return string|void
     */
    public function export()
    {
        return $this->VoteService->export();
    }

    /**
     * 添加投票界面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        $userLevelList = $this->VoteService->getUserLevel();

        return view('admin.user.add',['user_level_list' => $userLevelList]);
    }

    /**
     * 创建投票
     *
     * Author: Stephen
     * Date: 2020/7/24 16:20:39
     */
    public function create()
    {
        return $this->VoteService->create();
    }

    /**
     * 编辑投票
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Author: Stephen
     * Date: 2020/7/24 16:20:52
     */
    public function edit($id)
    {
        $data  = $this->VoteService->edit($id);

        return view('admin.user.edit',['data' => $data]);
    }

    /**
     * 更新投票
     *
     * Author: Stephen
     * Date: 2020/7/24 16:21:15
     */
    public function update()
    {
        return $this->VoteService->update();
    }

    /**
     * 启用
     *
     * Author: Stephen
     * Date: 2020/7/24 16:21:28
     */
    public function enable()
    {
        return $this->VoteService->enable();
    }

    /**
     * 禁用
     *
     * Author: Stephen
     * Date: 2020/5/18 16:13
     */
    public function disable()
    {
        return $this->VoteService->disable();
    }

}