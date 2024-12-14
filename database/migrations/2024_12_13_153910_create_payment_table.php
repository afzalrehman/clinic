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
        Schema::create('payment', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string('payment_number')->unique(); // Unique payment number (e.g., PAY-00001)
            $table->string('payment_date'); // Payment date
            $table->string('patient_id'); // Patient ID (CNIC or other unique identifier)
            $table->string('doctor_id'); // Doctor ID (CNIC or unique identifier)
            $table->decimal('total_amount', 10, 2); // Total payment amount
            $table->decimal('discount', 10, 2)->nullable(); // Discount on payment
            $table->string('payment_method'); // Payment method
            $table->enum('payment_status', ['paid', 'partially_paid', 'unpaid'])->default('unpaid'); // Payment status
            $table->text('other_info')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
