<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ClassSession;
use Carbon\Carbon;

class UpdateClassStatus extends Command
{
    protected $signature = 'classes:update-status';
    protected $description = 'Automatically update class status to Completed if past end_time';

    public function handle()
    {
        $now = Carbon::now();

        // Update all upcoming classes that have ended
        $updated = ClassSession::where('status', 'Upcoming')
            ->whereRaw("STR_TO_DATE(CONCAT(class_date, ' ', end_time), '%Y-%m-%d %H:%i:%s') <= ?", [$now])
            ->update(['status' => 'Completed']);

        $this->info("Updated {$updated} classes to Completed status.");
    }
}