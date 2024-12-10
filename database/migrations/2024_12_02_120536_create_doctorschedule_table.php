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
        Schema::create('doctorschedule', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('doctor_id'); 
            $table->unsignedBigInteger('department_id'); 
            $table->string('available_days'); 
            $table->time('from');
            $table->time('to'); 
            $table->text('notes'); 
            $table->enum('status', ['Active', 'In Active'])->default('Active'); 
            $table->foreign('doctor_id')->references('id')->on('doctor')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');

            
            $table->string('created_at')->default('Null');
            $table->string('updated_at')->default('Null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctorschedule');
    }
};
