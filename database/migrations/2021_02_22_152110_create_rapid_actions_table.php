<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapidActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapid_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kaizen_id')->index();
            $table->string('item');
            $table->string('who');
            $table->dateTime('when', $precision = 0);
            $table->boolean('done');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapid_actions');
    }
}
