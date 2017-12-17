<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaravelInteractiveLogger</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
    <style>
        #content-box {
            margin-bottom: 50px;
        }

        #foot-box {
            width: 100%;
            background: #eeeeee;
        }

        .scrollable {
            max-height: 200px;
            overflow: auto;
        }
    </style>
</head>
<body>
<div id="body-box">
    <div id="nav-box">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Laravel交互日志系统</a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">请求列表</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                选项 <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">清除所有数据</a></li>
                                <li class="divider"></li>
                                <li><a href="#">分离的链接</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="content-box">
        <div class="container">
            <div class="row">
                {{--URL显示区域--}}
                <div class="col-xs-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            请求记录
                        </div>
                        <ul class="panel-body list-group">
                            @foreach($list as $item)
                                <li class="list-group-item" style="overflow: hidden;">
                                    <div style="float: left;">
                                        <span class="label label-info">{{$item->created_at}}</span>
                                        <span class="label label-primary">{{$item->request_method}}</span>
                                        <span @if($item->response_status_code=='200')
                                              class="label label-success"
                                              @else
                                              class="label label-warning"
                                              @endif >{{$item->response_status_code}}</span>
                                        <span>{{$item->request_url}}</span>
                                    </div>
                                    <div style="float: right;">
                                        <span><a href="?page={{request('page')}}&id={{$item->id}}"
                                                 class="btn btn-success btn-xs">查看</a></span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        {{$list->appends(['id'=>request('id')])->links()}}
                    </div>
                </div>
                {{--参数显示区域--}}
                <div class="col-xs-4">
                    @if($current)
                        @if(json_decode($current->request_params,1))
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    请求参数
                                </div>
                                <div class="panel-body">
                                    <pre>{{$current->request_params}}</pre>
                                </div>
                            </div>
                        @endif
                        @if($current->request_route_params)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    路由参数
                                </div>
                                <div class="panel-body">
                                    <pre>{{$current->request_route_params}}</pre>
                                </div>
                            </div>
                        @endif
                        @if($current->request_content)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    请求主体
                                </div>
                                <div class="panel-body">
                                    <pre>{{$current->request_content}}</pre>
                                </div>
                            </div>
                        @endif
                        @if($current->response_echo)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    响应输出
                                </div>
                                <div class="panel-body scrollable">
                                    <pre>{{$current->response_echo}}</pre>
                                </div>
                            </div>
                        @endif
                        @if($current->response_data)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    响应返回
                                </div>
                                <div class="panel-body scrollable">
                                    {{$current->response_data}}
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div id="foot-box">
        <div class="container-fluid text-center">
            <h1>Jeffrey Wxj</h1>
        </div>
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>