<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'address',
    ];

    protected $appends = ['text'];

    public function getTextAttribute()
    {
        return $this->attributes['first_name'].' - '.$this->attributes['last_name'];
    }
}
