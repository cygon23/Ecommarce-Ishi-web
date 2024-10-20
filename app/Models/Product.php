<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'title',
        'description',
        'price',
        'quantity',
        'category_id',
        'is_delete'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
