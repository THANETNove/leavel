<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactTop extends Model
{
    use HasFactory;
    protected $fillable = [
        'iconTop1',
        'textTop1',
        'iconTop2',
        'textTop2',
    ];
}
