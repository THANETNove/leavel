<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactTextIndex extends Model
{
    use HasFactory;
    protected $fillable = [
        'textContact',
        'statusIndexTextContact',

    ];
}
