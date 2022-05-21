<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spares', function (Blueprint $table) {
            $table->id();
            $table->string('modelId');
            $table->string('groupItem');
            $table->string('nameItem');
            $table->string('price');
            $table->string('gradeId');
            $table->string('storeId');
            $table->string('modelExplain');
            $table->string('guaranteeDate');
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
        Schema::dropIfExists('spares');
    }
}
