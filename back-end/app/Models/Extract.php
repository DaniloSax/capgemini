<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extract extends Model
{
    protected $fillable = [
        'from',
        'to',
        'operation',
        'type',
        'value',
        'description'
    ];
}
