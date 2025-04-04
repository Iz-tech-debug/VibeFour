<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory;

    protected $table = 'advantages';

    protected $fillable = [
        'ikon',
        'nama',
        'isi',
        'bahasa_id',
    ];
}
