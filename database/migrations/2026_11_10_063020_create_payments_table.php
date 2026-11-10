<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();
            $table->string('invoice_number')->unique();
            $table->unsignedInteger('base_amount');
            $table->unsignedSmallInteger('unique_code');
            $table->unsignedInteger('total_amount')->index(); // Di-index untuk mempercepat pencarian OCR
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');
            $table->string('receipt_image')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
