<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * [$table description]
     * @var string
     */
    protected $table = 'events';

    /**
     * [$fillable description]
     * @var [type]
     */
    protected $fillable = [
        'model', 'plate', 'type', 'start', 'end', 'color'
    ];
}
