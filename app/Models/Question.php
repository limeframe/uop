<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator',
        'title',
        'level',
        'type',
        'corrects',
        'wrongs',
        'posanswers',
        'approval',
        'approbalModerator',
        'approbalDate',
    ];
}


