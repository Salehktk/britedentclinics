<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorServicesFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_services_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_services_id')->nullable();
            $table->foreign('doctor_services_id')->references('id')->on('doctor_services')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('fields_id')->nullable();
            $table->foreign('fields_id')->references('id')->on('fields')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('doctor_services_fields');
    }
}
