<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'price_id',
        'feature_id',
        'bahasa_id',
    ];

    public function features()
    {
        return $this->belongsTo(Feature::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class, 'price_id');
    }

}
