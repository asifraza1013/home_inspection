<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteOption extends Model
{
    protected $casts = [
        'detail' => 'array',
    ];
    protected $fillable = [
        'user_id', 'detail', 'status'
    ];
}
