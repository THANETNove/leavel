<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_indices', function (Blueprint $table) {
            $table->id();
            $table->string('iconBox1Service');
            $table->string('textH1NameBox1Service');
            $table->string('textPNameBox1Service');
            $table->string('statusImageService');
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
        Schema::dropIfExists('services_indices');
    }
}
