<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaizenAffectedAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaizen_affected_areas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kaizen_id')->index();
            $table->integer('ref_affected_area_id');
            $table->string('ref_affected_area_name');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kaizen_affected_areas');
    }
}
