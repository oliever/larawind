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

            $table->text('affected_areas')->nullable();
            $table->text('other_affected_area')->nullable();

            $table->decimal('loss',9,2)->nullable();
            $table->decimal('budget',9,2)->nullable();
            $table->decimal('hours',9,2)->nullable();
            $table->decimal('savings',9,2)->nullable();
            $table->dateTime('start', $precision = 0)->nullable();
            $table->dateTime('end', $precision = 0)->nullable();
            $table->text('status')->nullable();
            $table->decimal('completion',9,2)->default(0);

            $table->longText('metric')->nullable();
            $table->longText('deliverables')->nullable();
            $table->longText('scope')->nullable();
            $table->longText('risks')->nullable();
            $table->longText('comments')->nullable();

            $table->dateTime('approved_manager')->nullable();
            $table->dateTime('approved_sponsor')->nullable();
            $table->dateTime('approved_champion')->nullable();

            $table->decimal('hours_actual',9,2)->nullable();
            $table->text('hours_actual_validated')->nullable();
            $table->decimal('savings_actual',9,2)->nullable();
            $table->text('savings_actual_validated')->nullable();

            $table->dateTime('posted', $precision = 0)->nullable();
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
