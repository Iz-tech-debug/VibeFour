<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'faq';

    protected $fillable = [
        'pertanyaan',
        'jawaban',
        'bahasa_id',
    ];
}
