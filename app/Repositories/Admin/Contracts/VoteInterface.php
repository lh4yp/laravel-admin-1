<?php
/**
 * 投票接口
 */

namespace App\Repositories\Admin\Contracts;


interface VoteInterface
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
     * 根据条件获取列表
     *
     * @param $param
     * @return mixed
     */
    public function get($param);

    /**
     * 创建
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

    /**
     * 启用
     *
     * @param $id
     * @return mixed
     */
    public function enable($id);

    /**
     * 禁用
     *
     * @param $id
     * @return mixed
     */
    public function disable($id);

}