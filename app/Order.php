<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = [
        'item_selection' => 'array',
        'item_prices' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function agent()
    {
        return $this->belongsTo('App\User', 'agent_id', 'id');
    }

    public function inspector()
    {
        return $this->belongsTo('App\User', 'inspector_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo('App\CompniesDetail', 'company_id', 'id');
    }
}
