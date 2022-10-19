<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('disease_id');
            $table->foreignId('doctor_category_id');
            $table->string('name');
            $table->string('reg_no');
            $table->string('image');
            $table->string('current_job_location');
            $table->string('phone');
            $table->string('email');
            $table->string('status');
            $table->foreign('doctor_category_id')->references('id')->on('doctor_categories');
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
        Schema::dropIfExists('doctors');
    }
};
