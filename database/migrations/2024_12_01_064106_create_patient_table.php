<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('cnic_id');
            $table->date('date_of_birth');
            $table->string('blood_group');
            $table->enum('gender', ['Male', 'Female']);
            $table->text('address');
            $table->string('city');
            $table->string('department');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_number');
            $table->text('known_allergies')->nullable();
            $table->text('chronic_illnesses')->nullable();
            $table->enum('marital_status', ['Single', 'Married', 'Divorced', 'Widowed']);
            $table->enum('status', ['Active', 'Inactive']);
            $table->string('profile_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient');
    }
};
