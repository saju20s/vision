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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bill_id')->constrained()->onDelete('cascade');
            $table->foreignId('investigation_id')->constrained()->onDelete('cascade');
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->json('test_form')->nullable();
            $table->json('xray_form')->nullable();
            $table->json('usg_form')->nullable();
            $table->string('test_category_name')->nullable();
            $table->json('prepared_by')->nullable();
            $table->json('authorized_by')->nullable();
            $table->json('usg_signature')->nullable();
            $table->string('report_signature')->nullable();
            $table->string('status')->default('pending');
            $table->boolean('delivered')->default(false);
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
