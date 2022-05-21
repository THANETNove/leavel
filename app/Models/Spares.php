<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spares extends Model
{
    use HasFactory;
    protected $fillable = [
        'modelId',
        'groupItem',
        'nameItem',
        'price',
        'gradeId',
        'storeId',
        'modelExplain',
        'guaranteeDate',
    ];
}
