<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndexHomePage extends Model
{
    use HasFactory;
    protected $fillable = [
        'webName',
        'textH1Name',
        'textPName',
        'textH1NameOrange',
        'textPNameOrange',
        'iconBox3',
        'textH1NameBox1',
        'textPNameBox1',
        'iconBox3',
        'textH1NameBox2',
        'textPNameBox2',
        'iconBox3',
        'textH1NameBox3',
        'textPNameBox3',
        'backgroundImageTop',
        'statusHomIndex',
    ];
}
