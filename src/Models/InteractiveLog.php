<?php

namespace JeffreyWxj\LaravelInteractiveLogger\src\Models;


use Illuminate\Database\Eloquent\Model;

class InteractiveLog extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('interactive-logger.table_name') ? config('interactive-logger.table_name') : 'laravel-interactive-log';
    }
}