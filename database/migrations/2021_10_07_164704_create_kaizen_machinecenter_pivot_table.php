<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaizenMachineCenterPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaizen_machinecenter', function (Blueprint $table) {
            $table->foreignId('machine_center_id')->references('id')->on('machine_centers')->cascadeOnDelete();
            $table->foreignId('kaizen_id')->references('id')->on('kaizens')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kaizen_machinecenter');
    }
}
