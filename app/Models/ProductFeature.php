<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    use HasFactory;

    protected $table = 'product_features';

    protected $fillable = [
        'judul',
        'deskripsi',
        'produk',
        'gambar',
        'bahasa_id',
    ];
}
