<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompniesDetail extends Model
{
    use SoftDeletes;
    protected $casts = [
        'payment_detail' => 'array',
        'pricing' => 'array',
    ];
    protected $fillable = [
        'user_id',
        'company_name',
        'email',
        'payment_detail',
        'description',
        'pricing',
        'per_square',
        'per_year',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getNameAttribute() {
        return "{$this->company_name}";
	}
}
