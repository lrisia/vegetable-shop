<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function orderlists()
    {
        return $this->belongsToMany(OrderList::class);
    }

    public function scopeSearchProduct($query, $search)
    {
        return $query->where('ชื่อสินค้า', 'LIKE', "%{$search}%"); // % wildcard
    }
}
