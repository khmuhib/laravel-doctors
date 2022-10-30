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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_bn');
            $table->string('gender')->nullable();
            $table->string('gender_bn')->nullable();
            $table->string('address')->nullable();
            $table->string('address_bn')->nullable();
            $table->string('phone');
            $table->string('phone_bn');
            $table->string('email');
            $table->string('blood_group')->nullable();
            $table->date('dob')->nullable();
            $table->string('nid')->nullable();
            $table->string('nid_bn')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('patients');
    }
};
