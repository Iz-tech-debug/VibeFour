<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TNC extends Model
{
    use HasFactory;

    protected $table = 'tnc';

    protected $fillable = [
        'nama',
        'isi',
        'bahasa_id',
    ];
}
