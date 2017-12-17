<?php

namespace JeffreyWxj\LaravelInteractiveLogger\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JeffreyWxj\LaravelInteractiveLogger\Models\InteractiveLog;
use Illuminate\Support\Facades\Route;

class KernelMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if ('laravel-interactive-logger' != Route::currentRouteName()) {
            //生成一条log记录
            $interactiveLog = new InteractiveLog();
            $interactiveLog->request_url = $request->fullUrl();
            $interactiveLog->request_method = $request->method();
            $interactiveLog->request_params = json_encode($request->all(),JSON_PRETTY_PRINT);
            $interactiveLog->request_content = $request->getContent();
            $interactiveLog->request_route_params = json_encode($request->route()->parameters,JSON_PRETTY_PRINT);
            $interactiveLog->response_data = $response->getContent();
            $interactiveLog->response_echo = ob_get_contents();
            $interactiveLog->response_status_code = $response->getStatusCode();
            $interactiveLog->save();
        }
        return $response;
    }
}