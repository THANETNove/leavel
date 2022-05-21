<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesIndex extends Model
{
    use HasFactory;
    protected $fillable = [
        'textH1NameBox2Service',
        'textPNameBox2Service',
        'backgroundImageService',

        
    ];
}

