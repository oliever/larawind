<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaizenDepartmentPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaizen_department', function (Blueprint $table) {
            $table->foreignId('department_id')->references('id')->on('departments')->cascadeOnDelete();
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
        Schema::dropIfExists('kaizen_department');
    }
}
