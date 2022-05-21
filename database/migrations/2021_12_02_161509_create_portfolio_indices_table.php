<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_indices', function (Blueprint $table) {
            $table->id();
            $table->string('textH1NamePortfolio');
            $table->string('textPNamePortfolio');
            $table->string('statusImage');
            $table->string('statusImagePortfolio');
            $table->string('backgroundImagePortfolio');
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
        Schema::dropIfExists('portfolio_indices');
    }
}
