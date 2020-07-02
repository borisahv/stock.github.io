<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $table = 'commands';

    protected $fillable = ['customer_id', 'item_id', 'sale_id', 'quantity'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
