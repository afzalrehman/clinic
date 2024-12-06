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
        Schema::create('doctor', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name')->unique();
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('cnic')->unique();
            $table->date('dob');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('education');
            $table->string('designation');
            $table->text('address');
            $table->string('city');
            $table->string('country');
            $table->string('state');
            $table->string('postal_code');
            $table->text('biography');
            $table->string('avatar')->nullable();
            $table->enum('status', ['Active', 'Inactive']);
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor');
    }
};
