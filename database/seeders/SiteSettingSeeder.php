<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        // Prevent duplicate record
        if (SiteSetting::exists()) {
            return;
        }

        SiteSetting::create([
            'contact_email' => 'info@tutor123.ca',
            'phone_number' => '416-555-7823',
            'whatsapp_number' => '416-555-7823',
            'address' => 'Toronto, ON, Canada',

            'facebook_url' => null,
            'instagram_url' => null,
            'twitter_url' => null,
            'linkedin_url' => null,
            'youtube_url' => null,

            // Opening Hours (10:00 AM - 5:00 PM)
            'monday_start' => '10:00:00',
            'monday_end' => '17:00:00',

            'tuesday_start' => '10:00:00',
            'tuesday_end' => '17:00:00',

            'wednesday_start' => '10:00:00',
            'wednesday_end' => '17:00:00',

            'thursday_start' => '10:00:00',
            'thursday_end' => '17:00:00',

            'friday_start' => '10:00:00',
            'friday_end' => '17:00:00',

            'saturday_start' => '10:00:00',
            'saturday_end' => '17:00:00',

            'sunday_start' => '10:00:00',
            'sunday_end' => '17:00:00',
        ]);
    }
}