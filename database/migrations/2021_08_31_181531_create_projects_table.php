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
            $table->foreignId('team_id')->index();
            $table->foreignId('user_id')->index();
            $table->foreignId('employee_id')->nullable();

            $table->text('description');

            $table->integer('manager_id')->nullable();
            $table->integer('sponsor_id')->nullable();
            $table->integer('champion_id')->nullable();
            $table->text('primary_team')->nullable();
            $table->boolean('all_locations')->default(false);
            $table->dateTime('equicapita_support', $precision = 0)->nullable();
            $table->text('locations')->nullable();
            $table->boolean('capex')->default(false)->nullable();;

            $table->text('affected_areas')->nullable();
            $table->text('other_affected_area')->nullable();

            $table->text('loss')->nullable();
            $table->text('budget')->nullable();
            $table->text('hours')->nullable();
            $table->text('savings')->nullable();
            $table->dateTime('start', $precision = 0)->nullable();
            $table->dateTime('end', $precision = 0)->nullable();
            $table->text('status')->nullable();
            $table->decimal('completion',9,2)->default(0);

            $table->longText('metric')->nullable();
            $table->longText('deliverables')->nullable();
            $table->longText('scope')->nullable();
            $table->longText('risks')->nullable();
            $table->longText('comments')->nullable();

            $table->integer('approved_manager_id')->nullable();
            $table->integer('approved_sponsor_id')->nullable();
            $table->integer('approved_champion_id')->nullable();

            $table->text('hours_actual')->nullable();
            $table->integer('hours_actual_validated_id')->nullable();
            $table->text('savings_actual')->nullable();
            $table->integer('savings_actual_validated_id')->nullable();

            $table->text('custom_field_value_1')->nullable();
            $table->text('custom_field_label_1')->nullable();
            $table->text('custom_field_value_2')->nullable();
            $table->text('custom_field_label_2')->nullable();
            $table->text('custom_field_value_3')->nullable();
            $table->text('custom_field_label_3')->nullable();
            $table->text('custom_field_value_4')->nullable();
            $table->text('custom_field_label_4')->nullable();

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
