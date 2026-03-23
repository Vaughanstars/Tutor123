<?php

namespace App\Filament\Widgets;

use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use App\Models\ClassSession;

class ClassesTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Upcoming Classes';

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(
                ClassSession::query()
                    ->with('teacher')
                    ->withCount('students')
                    ->where('status', 'Upcoming')
                    ->latest('class_date')
            )
            ->columns([
                TextColumn::make('number')
                    ->label('#')
                    ->rowIndex() 
                    ->sortable(false),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('class_date')
                    ->label('Class Date')
                    ->date()
                    ->sortable(),

                TextColumn::make('start_time')
                    ->label('Start Time')
                    ->time('H:i'),

                TextColumn::make('end_time')
                    ->label('End Time')
                    ->time('H:i'),

                TextColumn::make('teacher.full_name')
                    ->label('Teacher')
                    ->searchable(['first_name', 'middle_name', 'last_name']),

                BadgeColumn::make('students_count')
                    ->label('Students')
                    ->formatStateUsing(fn ($state) => "{$state} Student(s)")
                    ->color('info')
                    ->url(fn ($record) => route('filament.class-sessions.students', $record->id))
                    ->openUrlInNewTab(),

            ])
            ->defaultSort('class_date', 'asc')
            ->paginated([10, 25, 50]);
    }
}