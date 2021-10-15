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
            $table->foreignId('team_id')->index();

            $table->text('members')->nullable();
            $table->boolean('all_locations')->default(false);
            $table->dateTime('date_assigned', $precision = 0)->nullable();
            $table->integer('completed')->nullable();

            $table->boolean('rapid')->default(false);
            $table->longText('rapid_problem')->nullable();
            $table->boolean('just_do_it')->default(false);
            $table->boolean('handled_at_location')->default(false);
            $table->boolean('head_office_input')->default(false);
            $table->longText('head_office_comment')->nullable();
            $table->text('dollar_value')->nullable();//HO user only
            $table->text('savings')->nullable();//HO user only
            $table->text('hours_saved')->nullable();//HO user only

            $table->text('affected_areas')->nullable();
            $table->text('other_affected_area')->nullable();

            $table->longText('reason')->nullable();//Just do it
            $table->longText('problem')->nullable();//Just do it
            $table->longText('causes')->nullable();//Just do it
            $table->longText('solution')->nullable();//Just do it
            $table->longText('expected_result')->nullable();//Just do it

            $table->dateTime('posted', $precision = 0)->nullable();

            //Before and After report
            $table->boolean('before_after')->default(false);
            $table->longText('comments_before')->nullable();//Just do it
            $table->longText('comments_after')->nullable();//Just do it
            $table->foreignId('validating_user_id')->nullable()->index();
            $table->foreignId('approving_user_id')->nullable()->index();
            $table->longText('benefits')->nullable();

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
        Schema::table('kaizens', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('kaizens');
    }
}
