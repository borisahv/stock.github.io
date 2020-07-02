<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'parent_id'];

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function parent(){
        return $this->parent_id ? Category::whereId($this->parent_id)->first() : null;
    }
}
