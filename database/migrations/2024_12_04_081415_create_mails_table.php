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
        Schema::create('mails', function (Blueprint $table) {
            $table->id(); 
            $table->json('to')->nullable();
            $table->string('cc')->nullable(); 
            $table->string('subject')->nullable(); 
            $table->text('message')->nullable(); 
            $table->string('attachment')->nullable(); 
            $table->string('created_at')->default('Null');
            $table->string('updated_at')->default('Null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
