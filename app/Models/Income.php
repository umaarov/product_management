<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = ['amount', 'sale_id'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
