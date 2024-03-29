<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function delegate()
    {
        return $this->belongsTo(Delegate::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
