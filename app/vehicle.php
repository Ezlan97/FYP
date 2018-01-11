<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $fillable = [
        'title', 'plate', 'type', 'start', 'end', 'color'
    ];
}
