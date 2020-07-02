<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = 'baskets';

    protected $fillable = ['total', 'date', 'paid', 'customer_id'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function commands(){
        return $this->hasMany(Command::class);
    }
}
