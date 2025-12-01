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
        Schema::create('billhistories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bill_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->unsignedBigInteger('marketing_id')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->decimal('doctor_commision', 10, 2);
            $table->decimal('marketing_commision', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->default(0);
            $table->enum('discount_type', ['amount', 'percentage'])->default('percentage');
            $table->enum('doctor_commision_type', ['amount', 'percentage'])->default('percentage');
            $table->enum('marketing_commision_type', ['amount', 'percentage'])->default('percentage')->nullable();
            $table->decimal('paid_amount', 10, 2)->default(0);
            $table->decimal('due_amount', 10, 2)->default(0);
            $table->string('invoice_number');
            $table->string('entry_by');
            $table->json('payment')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billhistories');
    }
};
