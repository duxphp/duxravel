<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'member',
    'app' => '会员系统'
], function () {
    Route::post('auth/logout', ['uses' => 'Modules\Member\Api\Auth@logout', 'desc' => '退出登录'])->name('api.member.auth.logout');
    Route::post('auth/info', ['uses' => 'Modules\Member\Api\Auth@info', 'desc' => '会员信息'])->name('api.member.auth.info');
    // Generate Route Make
});