<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioTextIndex extends Model
{
    use HasFactory;
    protected $fillable = [
        'textPortfolio',
        'statusIndexTextPortfolio',
    ];
}
