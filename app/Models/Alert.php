<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'product_id',
        'alert_type',
        'message',
        'is_resolved'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
