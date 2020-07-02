<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $fillable = ['customer_id', 'total', 'paid'];

    protected $dates = ['created_at'];

    public function commands(){
        return $this->hasMany(Command::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }


}
