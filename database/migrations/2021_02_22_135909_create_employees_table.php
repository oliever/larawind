<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('location_id');
            $table->string('name');
            $table->string('level');//headoffice, location_manager, location_staff
            $table->string('status')->default('active');
            $table->integer('user_id')->nullable();//if employee is locked to a user
            $table->string('email')->unique()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('employees');
    }
}
