<?php

use \Duxravel\Core\Facades\Menu;

Menu::add('member', [
    'name'  => '用户',
    'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>',
    'order' => 101,
], function () {
    Menu::group([
        'name' => '用户管理',
        'order' => 0,
    ], function () {
        Menu::link('用户管理', 'admin.member.user');
        Menu::link('用户等级', 'admin.member.level');
    });
});
