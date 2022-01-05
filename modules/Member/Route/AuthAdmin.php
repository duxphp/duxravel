<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'   => 'member',
    'auth_app' => '会员中心'
], function () {
    Route::group([
        'auth_group' => '用户管理'
    ], function () {
        Route::manage(\Modules\Member\Admin\User::class)->make();
    });
    Route::group([
        'auth_group' => '等级管理'
    ], function () {
        Route::manage(\Modules\Member\Admin\Level::class)->make();
    });
    // Generate Route Make
});

