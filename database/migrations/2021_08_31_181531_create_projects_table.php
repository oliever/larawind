<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->foreignId('team_id')->index();

            $table->text('description');

            $table->integer('leader_id')->nullable();
            $table->integer('sponsor_id')->nullable();
            $table->integer('champion_id')->nullable();
            $table->text('primary_team')->nullable();
            $table->dateTime('equicapita_support', $precision = 0)->nullable();
            $table->foreignId('location_id')->nullable();
            $table->boolean('capex')->default(false);

            $table->decimal('loss',9,4)->nullable();
            $table->decimal('budget',9,4)->nullable();
            $table->decimal('hours',2,2)->nullable();
            $table->decimal('savings',9,4)->nullable();
            $table->dateTime('start', $precision = 0)->nullable();
            $table->dateTime('end', $precision = 0)->nullable();
            $table->text('status')->nullable();
            $table->decimal('completion',2,2)->default(0);

            $table->longText('metric')->nullable();
            $table->longText('deliverables')->nullable();
            $table->longText('scope')->nullable();
            $table->longText('risks')->nullable();
            $table->longText('comments')->nullable();

            $table->boolean('approved_manager')->default(false);
            $table->boolean('approved_sponsor')->default(false);
            $table->boolean('approved_champion')->default(false);

            $table->decimal('hours_actual',2,2)->nullable();
            $table->decimal('savings_actual',9,4)->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('projects');
    }
}
