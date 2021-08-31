<?php
/**
 * Demo 用户管理 仓库
 *
 * User: Stephen <474949931@qq.com>
 * Date: 2020/6/5
 * Time: 17:03
 */

namespace App\Repositories\Admin\Eloquent;

use App\Http\Model\Admin\VoteInfo;
use App\Repositories\Admin\Contracts\VoteInterface;

class VoteRepository implements VoteInterface
{
    /**
     * 首页列表
     *
     * @param $param
     * @param $perPage
     * @return mixed
     */
    public function getPageData($param, $perPage)
    {
        return VoteInfo::addWhere($param)->paginate($perPage);
    }

    /**
     * 根据条件获取
     *
     * @param $param
     * @return mixed
     */
    public function get($param)
    {
        return VoteInfo::addWhere($param)->get();
    }

    /**
     * 创建
     *
     * @param $param
     * @return mixed
     */
    public function create($param)
    {
        return VoteInfo::create($param);
    }

    /**
     * 根据id查找用户信息
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return VoteInfo::find($id);
    }

    /**
     * 修改用户信息
     *
     * @param $param
     * @return mixed
     * Author: Stephen
     * Date: 2020/7/27 16:41:40
     */
    public function update($param)
    {
        $data = $this->findById($param['id']);

        //处理头像上传
        if (!empty(request()->file('avatar'))) {
            $attachment_avatar = new Attachment();
            $file_avatar       = $attachment_avatar->upload('avatar');
            if ($file_avatar) {
                $data->avatar = $file_avatar->url;
            }
        }
        $data->user_level_id = $param['user_level_id'];
        $data->username      = $param['username'];
        $data->mobile        = $param['mobile'];
        $data->nickname      = $param['nickname'];
        $data->password      = $param['password'];
        $data->status        = $param['status'];
        $data->description   = isset($param['description']) ? $param['description'] : '';

        return $data->save();
    }

    /**
     * 启用
     *
     * @param $id
     * @return mixed
     * Author: Stephen
     * Date: 2020/7/27 16:41:53
     */
    public function enable($id)
    {
        return VoteInfo::whereIn('id', $id)->update(['status' => 1]);
    }

    /**
     * 禁用用户
     *
     * @param $id
     * @return mixed
     * Author: Stephen
     * Date: 2020/7/27 16:42:03
     */
    public function disable($id)
    {
        return VoteInfo::whereIn('id', $id)->update(['status' => 0]);
    }

    /**
     * 删除用户
     *
     * @param $id
     * @return int|mixed|void
     * Author: Stephen
     * Date: 2020/7/27 16:42:15
     */
    public function destroy($id)
    {
        is_string($id) && $id = [$id];

        $noDeletionId = (new User())->getNoDeletionId();

        if (count($noDeletionId) > 0) {
            if (is_array($id)) {
                if (array_intersect($noDeletionId, $id)) {
                    return error('ID为' . implode(',', $noDeletionId) . '的数据无法删除');
                }
            } else if (in_array($id, $noDeletionId)) {
                return error('ID为' . $id . '的数据无法删除');
            }
        }

        $count = User::destroy($id);

        return $count;
    }

}