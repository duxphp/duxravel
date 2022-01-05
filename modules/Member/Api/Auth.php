<?php

namespace Modules\Member\Api;

use Duxravel\Core\Api\Api;
use Illuminate\Contracts\Container\BindingResolutionException;

class Auth extends Api
{

    /**
     * 登录
     * @return mixed 
     * @throws BindingResolutionException 
     */
    public function login()
    {
        $credentials = request(['tel', 'password']);
        if (!auth('user')->attempt($credentials)) {
            return $this->error('登录失败', 401);
        }
        return $this->info();
    }

    /**
     * 用户信息
     * @return mixed 
     * @throws BindingResolutionException 
     */
    public function info()
    {
        $user = auth('user')->user();
        return $this->success([
            'userInfo' => [
                'user_id' => $user->user_id,
                'avatar' => $user->avatar,
                'avatar_text' => strtoupper(substr($user->nikcname, 0, 1)),
                'tel' => $user->tel,
                'email' => $user->email,
                'nickname' => $user->nickname,
                'levelname' => $user->level->name,
                'growth' => $user->growth,
                'data' => $user->data,
            ],
            'token' => 'Bearer ' . auth('user')->tokenById($user->user_id),
        ]);
    }

    /**
     * 退出登录
     * @return mixed 
     */
    public function logout()
    {
        auth('user')->logout();
        return $this->success([], '退出登录成功');
    }
}