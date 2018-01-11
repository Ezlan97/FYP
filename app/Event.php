<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * [$table description]
     * @var string
     */
    protected $table = 'vehicles';

    /**
     * [$fillable description]
     * @var [type]
     */
    protected $fillable = [
        'title', 'plate', 'type', 'start', 'end', 'color'
    ];
}
