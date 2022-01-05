<?php

namespace Modules\Member\Middleware;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Auth extends BaseMiddleware
{
    public function handle($request, \Closure $next)
    {
        config(['auth.defaults.guard' => 'member']);

        // 检查此次请求中是否带有 token
        $this->checkForToken($request);
        try {
            // 检测用户的登录状态
            if ($this->auth->parseToken()->authenticate()) {
                return $next($request);
            }
            app_error('请先进行登录', 401);
        } catch (TokenExpiredException $exception) {
            try{
                // 刷新token
                $token = $this->auth->refresh();
                $request->headers->set('Authorization', 'Bearer ' . $token);
                //使用一次性登录
                auth('member')->onceUsingId(
                    $this->auth->manager()->getPayloadFactory()->buildClaimsCollection()->toPlainArray()['sub']
                );
            }catch(JWTException $exception){
                app_error('登录失效', 401);
            }
        }
        return $this->setAuthenticationHeader($next($request), $token);
    }
}
