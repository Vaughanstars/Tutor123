<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\ParentModel;
use App\Models\ClassSession;

class DashboardStats extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Teachers', Teacher::count())
                ->description('All registered teachers')
                ->color('success'),

            Stat::make('Total Students', Student::count())
                ->description('All registered students')
                ->color('primary'),

            Stat::make('Total Parents', ParentModel::count())
                ->description('All registered Parents')
                ->color('success'),

            Stat::make('Completed Classes', ClassSession::where('status', 'completed')->count())
                ->description('Classes marked as completed')
                ->color('warning'),
        ];
    }
}