<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'brand_id',
        'model',
        'quantity',
        'price',
        'description'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }
}
