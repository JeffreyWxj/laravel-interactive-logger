<?php
$namespace = 'JeffreyWxj\LaravelInteractiveLogger\Controllers\\';

// 获取路由配置参数
$routeParams = [
    'prefix' => config('interactive-logger.route.prefix') ? config('interactive-logger.route.prefix') : 'laravel-logger',
];

Route::group(['prefix' => $routeParams['prefix']], function () use ($namespace) {
    Route::get('', $namespace . 'IndexController@index')->name('laravel-interactive-logger');
});