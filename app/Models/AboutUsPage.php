<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'textH1NameAbout',
        'textPNameAbout',
        'icon1About',
        'textH3NameAbout1',
        'textP1NameAbout1',
        'icon2About',
        'textH3NameAbout2',
        'textP1NameAbout2',
        'icon3About',
        'textH3NameAbout3',
        'textP1NameAbout3',
        'backgroundImageVideo',
        'logo1',
        'logo2',
        'logo3',
        'logo4',
        'logo5',
        'logo6',
        'logo7',
        'logo8',
        'statusAboutUs',
    ];
}
