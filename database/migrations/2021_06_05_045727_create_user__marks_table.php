<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user__marks', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->Integer('course_id')->unsigned()->nullable();
            $table->foreign('course_id')->references('id')->on('courses');

            $table->string('obtain_marks')->nullable();
            $table->string('percentage')->nullable();
            $table->string('message')->nullable();
            $table->enum('status', ['inactive','active',]);
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
        Schema::dropIfExists('user__marks');
    }
}
