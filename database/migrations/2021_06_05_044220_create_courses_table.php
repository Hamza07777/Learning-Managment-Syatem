<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('slug')->unique();
            $table->string('course_duration')->nullable();
            $table->longText('description')->nullable();
            $table->string('no_of_student_allow')->nullable();
            $table->string('course_start_date')->nullable();
            $table->string('passing_percentage')->nullable();
            $table->string('course_retakes')->nullable();
            $table->string('price')->nullable(); 
            $table->string('file')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('total_marks')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->longText('meta_description')->nullable(); 
            $table->enum('course_type', ['Published','Featured','Trending','Popular','Free']);
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
        Schema::dropIfExists('courses');
    }
}
