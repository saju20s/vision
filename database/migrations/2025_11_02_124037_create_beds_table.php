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
        Schema::create('beds', function (Blueprint $table) {
            $table->id();
            $table->enum('bed_category', ['OPD', 'Cabin', 'Ward'])->comment('Type of service: OPD, Cabin or Ward');
            $table->string('bed_type', 50)->comment('AC or Non AC');
            $table->string('floor_no', 50)->comment('Example: 3rd Floor');
            $table->string('room_no', 100)->comment('Example: Sister Room');
            $table->string('bed_no', 50)->comment('Example: 1');
            $table->decimal('charge', 10, 2)->default(0)->comment('Charge per day or session');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beds');
    }
};
