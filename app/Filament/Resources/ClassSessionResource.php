<?php

namespace App\Filament\Resources;

use App\Models\ClassSession;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Textarea;

use App\Filament\Resources\ClassSessionResource\Pages;
use Illuminate\Support\Facades\DB;

use Filament\Forms\Components\MultiSelect;
use App\Models\Student;
class ClassSessionResource extends Resource
{
    protected static ?string $model = ClassSession::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Management';
    protected static ?string $navigationLabel = 'Classes';

    public static function form(Form $form): Form
    {
        return $form->schema([

            TextInput::make('title')
            ->label('Title')
            ->required(),

            DatePicker::make('class_date')
            ->required(),

            TimePicker::make('start_time')
            ->required(),

            TimePicker::make('end_time')
            ->required(),

            Select::make('teacher_id')
            ->label('Teacher')
            ->options(fn () => \App\Models\Teacher::all()->pluck('full_name', 'id'))
            ->searchable()
            ->preload()
            ->required(),

            MultiSelect::make('students')
    ->label('Students')
    ->relationship('students', 'id') // pivot sync
    ->searchable()
    ->preload()
    ->getSearchResultsUsing(function (string $search): array {
        return Student::query()
            ->whereRaw("CONCAT_WS(' ', first_name, middle_name, last_name) LIKE ?", ["%{$search}%"])
            ->limit(50)
            ->get()
            ->mapWithKeys(fn($student) => [
                $student->id => $student->full_name
            ])
            ->toArray();
    })
    ->getOptionLabelUsing(function ($value): string {
        // $value is always the ID for preloaded selections
        $student = Student::find($value);
        return $student ? $student->full_name : (string) $value;
    })
    ->options(function () {
        // preload all students as id => name for default selected values
        return Student::all()->mapWithKeys(fn($student) => [
            $student->id => $student->full_name
        ])->toArray();
    })
    ->required(),

            // MultiSelect::make('students')
            // ->label('Students')
            // ->relationship('students', 'id') // handles pivot sync
            // ->searchable()
            // ->getSearchResultsUsing(function (string $search): array {
            //     return Student::query()
            //         ->whereRaw("CONCAT_WS(' ', first_name, middle_name, last_name) LIKE ?", ["%{$search}%"])
            //         ->limit(50)
            //         ->get()
            //         ->mapWithKeys(fn($student) => [
            //             $student->id => trim($student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name)
            //         ])
            //         ->toArray();
            // })
            // ->getOptionLabelUsing(fn(Student $student) => trim($student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name))
            // ->required(),

            // MultiSelect::make('students')
            // ->label('Students')
            // ->relationship('students', 'id') // pivot sync
            // ->searchable()
            // ->preload() // optional, loads all students initially
            // ->getSearchResultsUsing(fn (string $search): array => Student::query()
            //     ->whereRaw("CONCAT_WS(' ', first_name, middle_name, last_name) LIKE ?", ["%{$search}%"])
            //     ->limit(50)
            //     ->pluck('id', 'id') // temporary keys for search
            //     ->all())
            // ->getOptionLabelUsing(fn(Student $student) => trim($student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name))
            // ->required(),

           


            // Select::make('students')
            // ->label('Students')
            // ->multiple()
            // ->options(fn () => \App\Models\Student::all()->pluck('full_name', 'id'))
            // ->searchable()
            // ->preload()
            // ->required(),

            Select::make('status')
            ->options([
                'Upcoming' => 'Upcoming',
                'Completed' => 'Completed',
                'Cancelled' => 'Cancelled',
            ])
            ->default('Upcoming')
            ->required(),

            TextInput::make('class_link')
            ->label('Class Link')
            ->url()
            ->nullable(),

             Textarea::make('description')
            ->label('Description')
            ->rows(3)
            ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('title')
            ->label('Title')
            ->searchable()
            ->sortable(),

            // TextColumn::make('description')
            // ->label('Description')
            //         ->limit(50) // show first 50 characters
            //         ->wrap(),

                    TextColumn::make('class_date')->date()->sortable(),

                    TextColumn::make('start_time'),
                    TextColumn::make('end_time'),

                    TextColumn::make('teacher.full_name')
                    ->label('Teacher')
                    ->searchable(),
                    TextColumn::make('students_count')
                    ->label('Students')
                    ->getStateUsing(fn($record) => $record->students->pluck('full_name')->join(', ')),

                    BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'Upcoming',
                        'success' => 'Completed',
                        'danger' => 'Cancelled',
                    ])
                    ->sortable(),

                    TextColumn::make('class_link')
                    ->label('Link')
                    ->url(fn ($record) => $record->class_link)
                    ->openUrlInNewTab(),
                ])
        ->filters([
            SelectFilter::make('status')
            ->options([
                'Upcoming' => 'Upcoming',
                'Completed' => 'Completed',
                'Cancelled' => 'Cancelled',
            ]),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClassSessions::route('/'),
            'create' => Pages\CreateClassSession::route('/create'),
            'edit' => Pages\EditClassSession::route('/{record}/edit'),
        ];
    }
    public static function canViewAny(): bool
    {
        return false;
    }
}
