<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaizens', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->foreignId('user_id')->index();

            $table->foreignId('location_id');
            $table->longText('reason')->nullable();
            $table->longText('problem')->nullable();
            $table->longText('location_comments')->nullable();
            $table->integer('completed')->nullable();

            $table->boolean('rapid')->default(false);
            $table->boolean('just_do_it')->default(false);
            $table->boolean('handled_at_location')->default(false);
            $table->boolean('head_office_input')->default(false);
            $table->text('affected_areas')->nullable();

            $table->dateTime('to_project', $precision = 0)->nullable();

            $table->string('rapid_method')->nullable();
            $table->boolean('rapid_action_sustained')->default(false);
            $table->boolean('rapid_follow_up')->default(false);
            $table->string('responsible')->nullable();
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
        Schema::dropIfExists('kaizens');
    }
}
