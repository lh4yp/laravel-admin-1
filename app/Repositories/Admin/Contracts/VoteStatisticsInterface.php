<?php
/**
 * 投票接口
 */

namespace App\Repositories\Admin\Contracts;


interface VoteStatisticsInterface
{
    /**
     * 首页
     *
     * @param $param
     * @param $perPage
     * @return mixed
     */
    public function getPageData($param,$perPage);

    /**
     * 根据条件获取投票列表
     *
     * @param $param
     * @return mixed
     */
    public function get($param);

    /**
     * 创建计划
     *
     * @param $param
     * @return mixed
     */
    public function create($param);

    /**
     * 根据id查找投票信息
     *
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * 修改投票信息
     *
     * @param $param
     * @return mixed
     */
    public function update($param);



}