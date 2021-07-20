<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJdiCauseSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jdi_cause_solutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kaizen_id')->index();
            $table->string('cause');
            $table->string('solution');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jdi_cause_solutions');
    }
}
