<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'price', 'quantity', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class)->withPivot('quantity');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
