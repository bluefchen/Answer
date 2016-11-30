<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('totalnumber')->default(5);
            $table->integer('testtype')->default(0);
            $table->integer('point')->default(-1);
            $table->integer('user_id');
            $table->json('questionids');
            $table->json('useranswer');

        });

        Schema::create('question_test', function (Blueprint $table) {
            $table->integer('question_id')->unsigned()->index();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->integer('test_id')->unsigned()->index();
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
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
        Schema::drop('tests');
        Schema::drop('question_test');
    }
}
