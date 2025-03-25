<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'judul',
        'konten',
        'gambar',
    ];

    protected $guarded = []; // Izinkan semua kolom diisi

    public function bahasa()
    {
        return $this->belongsTo(Language::class, 'bahasa_id');
    }


}
