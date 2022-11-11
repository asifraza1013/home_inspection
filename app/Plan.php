<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;
    protected $casts = [
        'features' => 'array',
    ];
    protected $fillable = [
        'name',
        'description',
        'stripe_plan',
        'can_order',
        'features',
        'image',
        'price',
        'status',
    ];
}
