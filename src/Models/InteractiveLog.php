<?php

namespace JeffreyWxj\LaravelInteractiveLogger\Models;


use Illuminate\Database\Eloquent\Model;

class InteractiveLog extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('interactive-logger.table_name') ? config('interactive-logger.table_name') : 'laravel_interactive_log';
    }
}