<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->string('first_name')->default(null)->nullable();
            $table->string('last_name')->default(null)->nullable();
            $table->string('mid_name');
            $table->date('dob')->default(null)->nullable();
            $table->integer('course_id')->default(null)->nullable()->unsigned();
            $table->string('section')->default(null)->nullable();
            $table->string('address')->default(null)->nullable();
            $table->boolean('active')->default(null)->nullable();
            $table->string('sex')->default(null)->nullable();
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
        Schema::dropIfExists('students');
        $table->foreign('course_id')->references('id')->on('courses');
    }
}
