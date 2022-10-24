<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorSpecializationServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_specialization_services', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('doctor_specialization_id')->nullable();
            $table->foreign('doctor_specialization_id')->references('id')->on('doctor_specializations')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');

            $table->string('fees')->nullable();
            $table->string('time_slots')->nullable();

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
        Schema::dropIfExists('doctor_specialization_services');
    }
}
