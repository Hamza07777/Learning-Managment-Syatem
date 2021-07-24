<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCourseAssignmentMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user__course__assignment__marks', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->Integer('course_id')->unsigned()->nullable();
            $table->foreign('course_id')->references('id')->on('courses');

            $table->Integer('assignment_id')->unsigned()->nullable();
            $table->foreign('assignment_id')->references('id')->on('assignments');

            $table->string('obtain_marks')->nullable();
            $table->string('file')->nullable();
            $table->string('text_description')->nullable();
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
        Schema::dropIfExists('user__course__assignment__marks');
    }
}
