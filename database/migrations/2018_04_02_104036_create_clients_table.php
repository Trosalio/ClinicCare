<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            //refer to User
            $table->unsignedInteger('user_id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('id_no', 13)->nullable();
            $table->string('tel_no', 10)->nullable();
            $table->enum('gender', ['m','f'])->nullable();
            $table->unsignedInteger('weight')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->enum('blood_type', ['A+','A-','B+','B-','O+','O-','AB+','AB-'])->nullable();
            $table->text('intolerances')->nullable();
            $table->text('health_conditions')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
