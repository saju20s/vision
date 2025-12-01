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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();
            $table->foreignId('bed_id')->constrained()->cascadeOnDelete();
            $table->dateTime('admit_date');
            $table->dateTime('discharge_date')->nullable();
            $table->text('bill_id')->nullable();
            $table->text('ot_consent')->nullable();
            $table->string('prepared_by')->nullable();
            $table->string('admission_id')->unique()->after('id');
            $table->boolean('is_occupied')->default(0);
            $table->string('status')->default('admitted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
