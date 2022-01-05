<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'member',
    'app' => '会员系统'
], function () {
    Route::group([
        'group' => '会员模块'
    ], function () {
        Route::post('auth/login', ['uses' => 'Modules\Member\Api\Auth@login', 'desc' => '会员登录'])->name('api.member.auth.login');
    });
    // Generate Route Make
});