<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaizenEmployeePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaizen_employee', function (Blueprint $table) {
            $table->foreignId('employee_id')->references('id')->on('employees')->cascadeOnDelete();
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
        Schema::dropIfExists('kaizen_employee');
    }
}
