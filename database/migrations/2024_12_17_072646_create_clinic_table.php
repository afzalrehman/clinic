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
        Schema::create('clinic', function (Blueprint $table) {
            $table->id();
            $table->string('clinic_code');
            $table->string('name');
            $table->string('address');
            $table->string('location_pin');
            $table->string('phone_no');
            $table->string('website')->nullable();
            $table->string('email');
            $table->string('contact_person');
            $table->boolean('flag')->default(true);
            $table->string('qr_code_path')->nullable();
            $table->string('kiosk_url')->nullable();
            $table->string('status')->nullable();
            $table->string('created_by')->nullable();
            $table->string('created_at')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinic');
    }
};
