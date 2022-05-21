<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreMobile extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameStore',
        'phone',
        'explain',
    ];
    
}
