<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('doctor_id');
            $table->string('treatment');
            $table->dateTime('appointment_date');
            $table->time('from_time');
            $table->time('to_time');
            $table->enum('status', ['Upcoming', 'Completed', 'Cancelled']);
            $table->text('notes')->nullable();
            $table->string('document')->nullable();
            $table->timestamps();

            // Define the foreign keys
            $table->foreign('patient_id')->references('id')->on('patient')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctor')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoinment');
    }
};
