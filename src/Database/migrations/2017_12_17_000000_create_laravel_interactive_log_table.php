<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaravelInteractiveLogTable extends Migration
{

    public function __construct()
    {
        $this->custom_table_name = config('interactive-logger.table_name') ? config('interactive-logger.table_name') : 'laravel_interactive_log';
    }

    /**
     * 运行数据库迁移
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->custom_table_name, function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            // 请求参数
            $table->string('request_url')->nullable();
            $table->string('request_method')->nullable();
            $table->text('request_params')->nullable();
            $table->text('request_route_params')->nullable();
            $table->text('request_content')->nullable();
            // 响应参数
            $table->string('response_data')->nullable();
            $table->string('response_echo')->nullable();
            $table->string('response_status_code')->nullable();
        });
    }

    /**
     * 回滚数据库迁移
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->custom_table_name);
    }
}