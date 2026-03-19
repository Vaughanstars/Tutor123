<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [

        // Contact Info
        'contact_email',
        'phone_number',
        'whatsapp_number',
        'address',

        // Social Media
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',
        'youtube_url',

        // Opening Hours
        'monday_start',
        'monday_end',
        'tuesday_start',
        'tuesday_end',
        'wednesday_start',
        'wednesday_end',
        'thursday_start',
        'thursday_end',
        'friday_start',
        'friday_end',
        'saturday_start',
        'saturday_end',
        'sunday_start',
        'sunday_end',
    ];

    protected $casts = [
        'monday_start' => 'datetime:H:i',
        'monday_end' => 'datetime:H:i',
        'tuesday_start' => 'datetime:H:i',
        'tuesday_end' => 'datetime:H:i',
        'wednesday_start' => 'datetime:H:i',
        'wednesday_end' => 'datetime:H:i',
        'thursday_start' => 'datetime:H:i',
        'thursday_end' => 'datetime:H:i',
        'friday_start' => 'datetime:H:i',
        'friday_end' => 'datetime:H:i',
        'saturday_start' => 'datetime:H:i',
        'saturday_end' => 'datetime:H:i',
        'sunday_start' => 'datetime:H:i',
        'sunday_end' => 'datetime:H:i',
    ];
}