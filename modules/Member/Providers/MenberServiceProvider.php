<?php

namespace Modules\Project\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Member\Middleware\Auth;

class MemberServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app('config')->set('auth.guards.member', [
            'driver' => 'jwt',
            'provider' => 'members',
        ]);

        app('config')->set('auth.providers.members', [
            'driver' => 'eloquent',
            'model' => \Modules\Menber\Model\MemberUser::class,
        ]);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        // 注册会员路由
        $router->group(['prefix' => 'api', 'middleware' => ['api', Auth::class], 'statis' => true], function () {
            $list = \Duxravel\Core\Util\Cache::routeList('Member');
            foreach ($list as $file) {
                if (is_file($file)) {
                    $this->loadRoutesFrom($file);
                }
            }
        });
    }
}
