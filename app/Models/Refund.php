<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $table = 'returns';
    protected $fillable = ['sale_id', 'reason'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
