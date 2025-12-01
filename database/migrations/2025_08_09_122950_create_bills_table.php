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
        Schema::disableForeignKeyConstraints();
        Schema::create('bills', function (Blueprint $table) {
            $table->id();

            // Explicitly unsignedBigInteger for FK
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('marketing_id')->nullable();

            // Other fields
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

            // Foreign key constraints
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('marketing_id')->references('id')->on('marketings')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('bills');
        Schema::enableForeignKeyConstraints();
    }
};
