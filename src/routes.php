<?php
$namespace='JeffreyWxj\LaravelInteractiveLogger\Controllers\\';

// 获取路由配置参数
$routeParams = [
    'prefix' => config('interactive-logger.route.prefix') ? config('interactive-logger.route.prefix') : 'laravel-logger',
    'as' => config('interactive-logger.route.as') ? config('interactive-logger.route.as') : 'laravel-logger',
];

Route::group(['prefix' => $routeParams['prefix'], 'as' => $routeParams['as']], function () use ($namespace) {
    Route::get('', $namespace.'IndexController@index');
});