<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected $filable = [
        'name',
        'email',
        'message',
        'status',
    ];
}
