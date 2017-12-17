<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaravelInteractiveLogTable extends Migration
{

    /*
    public function __construct()
    {
        parent::__construct();
        $this->custom_table_name = config('interactive-logger.table_name') ? config('interactive-logger.table_name') : 'laravel-interactive-log';
    }
     */

    /**
     * 运行数据库迁移
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laravel-interactive-log', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            // 请求参数
            $table->string('request_url');
            $table->string('request_method');
            $table->text('request_params_get');
            $table->text('request_params_post');
            $table->text('request_params_all');
            // 响应参数
            $table->string('response_type');
            $table->string('response_body');
            $table->string('response_status_code');
        });
    }

    /**
     * 回滚数据库迁移
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('laravel-interactive-log');
    }
}