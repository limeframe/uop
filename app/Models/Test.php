<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'erotisi_1',
        'erotisi_2',
        'erotisi_3',
        'erotisi_4',
        'erotisi_5',
        'apantisi_1',
        'apantisi_2',
        'apantisi_3',
        'apantisi_4',
        'apantisi_5',
        'level',
    ];

}
