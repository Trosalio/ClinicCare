<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            //refer to User
            $table->unsignedInteger('user_id');
            $table->string('medical_license_no', 10)->default('0123456789');
            $table->boolean('work_day')->default(false);
            $table->text('weekday')->nullable();
            $table->unsignedInteger('start_hour')->default(9);
            $table->unsignedInteger('end_hour')->default(17);
            $table->timestamps();

            // enforce foreign key
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('diagnoses');
        Schema::dropIfExists('doctors');
    }
}
