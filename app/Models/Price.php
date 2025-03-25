<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $table = 'prices';

    protected $fillable = [
        'nama',
        'harga',
        'durasi',
        'satuan_waktu',
    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'packages', 'price_id', 'feature_id')
            ->withPivot('bahasa_id'); // Supaya bisa ambil bahasa_id dari pivot
    }

}
