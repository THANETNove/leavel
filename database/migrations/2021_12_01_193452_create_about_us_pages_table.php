<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_pages', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('textH1NameAbout');
            $table->string('textPNameAbout');
            $table->string('icon1About');
            $table->string('textH3NameAbout1');
            $table->string('textP1NameAbout1');
            $table->string('icon2About');
            $table->string('textH3NameAbout2');
            $table->string('textP1NameAbout2');
            $table->string('icon3About');
            $table->string('textH3NameAbout3');
            $table->string('textP1NameAbout3');
            $table->string('backgroundImageVideo');
            $table->string('logo1');
            $table->string('logo2');
            $table->string('logo3');
            $table->string('logo4');
            $table->string('logo5');
            $table->string('logo6');
            $table->string('logo7');
            $table->string('logo8');
            $table->string('statusAboutUs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us_pages');
    }
}
