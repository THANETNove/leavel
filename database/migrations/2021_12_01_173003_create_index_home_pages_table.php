<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndexHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index_home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('webName');
            $table->string('textH1Name');
            $table->string('textPName');
            $table->string('textH1NameOrange');
            $table->string('textPNameOrange');
            $table->string('iconBox1');
            $table->string('textH1NameBox1');
            $table->string('textPNameBox1');
            $table->string('iconBox2');
            $table->string('textH1NameBox2');
            $table->string('textPNameBox2');
            $table->string('iconBox3');
            $table->string('textH1NameBox3');
            $table->string('textPNameBox3');
            $table->string('backgroundImageTop');
            $table->string('statusHomIndex');
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
        Schema::dropIfExists('index_home_pages');
    }
}
