<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapidVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapid_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kaizen_id')->index();
            $table->string('what');
            $table->string('how');
            $table->string('findings');
            $table->boolean('real_cause');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapid_verifications');
    }
}
