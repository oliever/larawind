<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaizenAffectedAreaPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaizen_affected_area', function (Blueprint $table) {
            $table->foreignId('affected_area_id')->references('id')->on('affected_areas')->cascadeOnDelete();
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
        Schema::dropIfExists('kaizen_affected_area');
    }
}
