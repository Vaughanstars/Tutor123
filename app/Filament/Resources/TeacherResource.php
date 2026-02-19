<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Models\Teacher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Toggle;

use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ToggleColumn;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Teachers';
    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('teacher_id')
                        ->label('Teacher ID')
                        ->disabled() // read-only
                        ->default(function () {
                            $lastTeacher = \App\Models\Teacher::latest('id')->first();
                            $number = $lastTeacher ? ((int) substr($lastTeacher->teacher_id, 1)) + 1 : 1;
                            return 'T' . str_pad($number, 4, '0', STR_PAD_LEFT);
                        })
                        ->dehydrated(false),

                    TextInput::make('first_name')
                        ->label('First Name')
                        ->required(),

                    TextInput::make('middle_name')
                        ->label('Middle Name'),

                    TextInput::make('last_name')
                        ->label('Last Name')
                        ->required(),

                    TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true),

                    TextInput::make('phone')->label('Phone'),

                    DatePicker::make('dob')->label('Date of Birth'),

                    Select::make('gender')
                        ->label('Gender')
                        ->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                            'Other' => 'Other',
                        ]),

                    FileUpload::make('image')
                        ->label('Photo')
                        ->image()
                        ->disk('public')
                        ->directory(fn ($record) => 'teachers/' . ($record?->id ?? 'new') . '/photos')
                        ->nullable(),

                    FileUpload::make('teacher_id_document')
                        ->label('Document')
                        ->disk('public')
                        ->directory(fn ($record) => 'teachers/' . ($record?->id ?? 'new') . '/documents')
                        ->nullable(),

                    Toggle::make('status')
                        ->label('Enabled')
                        ->inline(false)
                        ->default(true),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('teacher_id')->label('Teacher ID')->sortable()->searchable(),
                TextColumn::make('full_name')
                    ->label('Full Name')
                    ->getStateUsing(fn ($record) => trim("{$record->first_name} {$record->middle_name} {$record->last_name}"))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('phone'),
                TextColumn::make('gender'),
                TextColumn::make('dob')->date(),
                ImageColumn::make('image')->label('Photo')->disk('public')->rounded()->height(50)->width(50),
                TextColumn::make('teacher_id_document')
                    ->label('Document')
                    ->formatStateUsing(fn ($state) => $state ? "<a href='" . asset('storage/' . $state) . "' target='_blank'>View</a>" : '-')
                    ->html(),

                // Badge Column
                BadgeColumn::make('status')
                    ->label('Status')
                    ->getStateUsing(fn ($record) => $record->status ? 'Enabled' : 'Disabled')
                    ->colors([
                        'success' => fn ($record) => $record->status,
                        'danger' => fn ($record) => !$record->status,
                    ])
                    ->sortable(),

                ToggleColumn::make('status')
                    ->label('Enabled')
                    ->sortable()
                    ->onColor('success')
                    ->offColor('danger'),

                ImageColumn::make('image')
                    ->label('Photo')
                    ->disk('public')
                    ->rounded()
                    ->height(50)
                    ->width(50)
                    ->default(asset('images/user.jpg')), 

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }
}
