<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactIndex extends Model
{
    use HasFactory;
    protected $fillable = [
        'iconContact',
        'textH1NameContact',
        'textPNameContact',
        'statusIndexContact',

    ];
}
