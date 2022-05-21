<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioIndex extends Model
{
    use HasFactory;
    protected $fillable = [
        'textH1NamePortfolio',
        'textPNamePortfolio',
        'statusImage',
        'statusImagePortfolio',
        'backgroundImagePortfolio',
    ];
}