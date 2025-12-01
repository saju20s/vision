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
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('years')->nullable();
            $table->string('course')->nullable();
            $table->string('students')->nullable();
            $table->string('peoples')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('messenger_page_id')->nullable();
            $table->string('logo')->nullable();
            $table->json('prepared_by')->nullable();
            $table->json('authorized_by')->nullable();
            $table->string('logotext')->nullable();
            $table->string('favicon')->nullable();
            $table->string('ftr_image')->nullable();
            $table->string('site_title')->nullable();
            $table->string('site_url')->nullable();
            $table->string('description')->nullable();
            $table->string('keyword')->nullable();
            $table->string('header_color')->nullable();
            $table->string('header_text_color', 50)->nullable();
            $table->string('important_link')->nullable();
            $table->string('menu_color')->nullable();
            $table->string('menu_text_color', 50)->nullable();
            $table->string('footer_color')->nullable();
            $table->string('copyright_text')->nullable();
            $table->string('copyright_color')->nullable();
            $table->string('footer_text')->nullable();
            $table->json('commision')->nullable();
            $table->string('report_signature')->nullable();
            $table->json('usg_signature')->nullable();
            $table->string('banner')->nullable();
            $table->string('lab_header_img')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('cphone')->nullable();
            $table->string('cemail')->nullable();
            $table->string('address')->nullable();
            $table->text('map')->nullable();
            $table->longText('affidavit_one')->nullable();
            $table->longText('affidavit_two')->nullable();
            $table->string('sr');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
