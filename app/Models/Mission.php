<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $table = 'missions';
    
    protected $fillable = [
        'judul',
        'keterangan',
        'bahasa_id',
    ];
}
