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
        Schema::create('investigations', function (Blueprint $table) {
            $table->id();
            $table->string('test_name');
            $table->string('department');
            $table->string('test_category_name')->nullable();
            $table->decimal('buy_price', 10, 2)->default(0);
            $table->decimal('sell_price', 10, 2)->default(0);
            $table->json('test_form')->nullable();
            $table->json('xray_form')->nullable();
            $table->json('usg_form')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investigations');
    }
};
