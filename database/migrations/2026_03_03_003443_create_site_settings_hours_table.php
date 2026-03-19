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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();

            // Contact Info
            $table->string('contact_email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->text('address')->nullable();

            // Social Media
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();

            // Opening Hours (start & end for each day)
            $table->time('monday_start')->nullable();
            $table->time('monday_end')->nullable();

            $table->time('tuesday_start')->nullable();
            $table->time('tuesday_end')->nullable();

            $table->time('wednesday_start')->nullable();
            $table->time('wednesday_end')->nullable();

            $table->time('thursday_start')->nullable();
            $table->time('thursday_end')->nullable();

            $table->time('friday_start')->nullable();
            $table->time('friday_end')->nullable();

            $table->time('saturday_start')->nullable();
            $table->time('saturday_end')->nullable();

            $table->time('sunday_start')->nullable();
            $table->time('sunday_end')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};