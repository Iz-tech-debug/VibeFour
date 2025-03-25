<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $table = 'features';

    protected $fillable = [
        'fitur',
    ];

    public function prices()
    {
        return $this->belongsToMany(Price::class, 'packages', 'feature_id', 'price_id')
            ->withPivot('bahasa_id');
    }

}
