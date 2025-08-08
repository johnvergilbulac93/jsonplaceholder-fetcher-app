<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todos extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'completed',
    ];
}
