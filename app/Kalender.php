<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kalender extends Model
{
    use SoftDeletes;
    protected $table = 'kalender';

    protected $fillable = [
        'title', 'start_date', 'end_date'
    ];

    protected $dates = ['deleted_at'];
}
