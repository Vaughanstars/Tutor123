<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\ClassSession;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Teachers', Teacher::count())
                ->description('All registered teachers')
                ->color('success'),

            Stat::make('Total Students', Student::count())
                ->description('All registered students')
                ->color('primary'),

            Stat::make(
                'Completed Classes',
                ClassSession::where('status', 'completed')->count()
            )
                ->description('Classes marked as completed')
                ->color('warning'),
        ];
    }
}