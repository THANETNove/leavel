<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_systems', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('version')->nullable();
            $table->string('imei')->nullable();
            $table->string('screenUnlock')->nullable();
            $table->string('riskid')->nullable();
            $table->string('notifiedWaste')->nullable();
            $table->string('riskCalculator')->nullable();
            $table->string('another')->nullable();
            $table->string('calculatedSystem')->nullable();
            $table->string('calculatedTechnician')->nullable();
            $table->string('color')->nullable();
            $table->string('device')->nullable();
            $table->string('priceJob')->nullable();
            $table->string('pickUpDate')->nullable();
            $table->string('checkbox1')->nullable();
            $table->string('checkbox2')->nullable();
            $table->string('checkbox3')->nullable();
            $table->string('checkbox4')->nullable();
            $table->string('checkbox5')->nullable();
            $table->string('checkbox6')->nullable();
            $table->string('checkbox7')->nullable();
            $table->string('checkbox8')->nullable();
            $table->string('another2')->nullable();
            $table->string('statusJob')->nullable();
            $table->string('accessoryBrand')->nullable();
            $table->string('accessoryDeviceModel')->nullable();
            $table->string('accessoryModel')->nullable();
            $table->string('priceModel')->nullable();
            $table->string('priceSum')->nullable();
            $table->string('receiptCode')->nullable();
            $table->string('insurance')->nullable();
            $table->string('commentBranch')->nullable();
            $table->string('commentMend')->nullable();
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
        Schema::dropIfExists('job_systems');
    }
}
