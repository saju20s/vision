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
        Schema::create('otconsents', function (Blueprint $table) {
            $table->id();
            $table->string('admission_id')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('religion')->nullable();
            $table->string('patient_relation')->nullable();
            $table->string('marrital_status')->nullable();
            $table->string('guardian_name')->nullable();
            $table->text('guardian_address')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('bed_no')->nullable();
            $table->string('bed_category')->nullable();
            $table->string('room_no')->nullable();
            $table->string('floor_no')->nullable();
            $table->string('bed_type')->nullable();
            $table->date('ot_date')->nullable();
            $table->string('operation_name')->nullable();
            $table->decimal('charge', 10, 2)->nullable();
            $table->string('reference_by')->nullable();
            $table->string('admitted_under_doctor')->nullable();
            $table->text('operation_diagnosis')->nullable();
            $table->string('operation_category')->nullable();
            $table->text('indication')->nullable();
            $table->text('findings')->nullable();
            $table->string('surgeon')->nullable();
            $table->string('assistant')->nullable();
            $table->string('assistant_two')->nullable();
            $table->string('assistant_three')->nullable();
            $table->string('anesthesiologist')->nullable();
            $table->string('anesthesia_type')->nullable();
            $table->string('blood_transfusion')->nullable();
            $table->text('other_notes')->nullable();
            $table->string('baby_gender')->nullable();
            $table->string('baby_weight')->nullable();
            $table->date('delivery_date_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otconsents');
    }
};
