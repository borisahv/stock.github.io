<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = ['name', 'description', 'image', 'currency',
        'purchase_price', 'wholesale_price', 'retail_price', 'quantity',
        'threshold', 'category_id', 'supplier_id', 'big_quantity', 'remaining_quantity',
        'entries', 'total', 'sales', 'losses', 'finals'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
