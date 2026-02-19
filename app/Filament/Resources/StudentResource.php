<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Toggle;

use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ToggleColumn;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Students';
    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('student_id')
                        ->label('Student ID')
                        ->disabled()
                        ->dehydrated(false)
                        ->default(fn () => 'S' . str_pad(Student::count() + 1, 4, '0', STR_PAD_LEFT)),

                    TextInput::make('first_name')->required(),
                    TextInput::make('middle_name'),
                    TextInput::make('last_name')->required(),
                    TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
                    TextInput::make('phone'),
                    DatePicker::make('dob')->label('Date of Birth'),
                    Select::make('gender')
                        ->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                            'Other' => 'Other',
                        ]),
                    FileUpload::make('image')
                        ->label('Photo')
                        ->image()
                        ->disk('public')
                        ->directory(fn ($record) => 'students/' . ($record?->id ?? 'new') . '/photos')
                        ->nullable(),
                    FileUpload::make('document')
                        ->label('Document')
                        ->disk('public')
                        ->directory(fn ($record) => 'students/' . ($record?->id ?? 'new') . '/documents')
                        ->nullable(),
                    Toggle::make('status')->label('Enabled')->default(true),
                    Textarea::make('note')->label('Note')->rows(3),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student_id')->sortable()->searchable(),
                TextColumn::make('full_name')
                    ->label('Full Name')
                    ->getStateUsing(fn ($record) => trim("{$record->first_name} {$record->middle_name} {$record->last_name}"))
                    ->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('phone'),
                TextColumn::make('gender'),
                TextColumn::make('dob')->date(),
                ImageColumn::make('image')->label('Photo')->disk('public')->rounded()->height(50)->width(50),
                TextColumn::make('document')
                    ->label('Document')
                    ->formatStateUsing(fn ($state) => $state ? "<a href='" . asset('storage/' . $state) . "' target='_blank'>View</a>" : '-')
                    ->html(),
                BadgeColumn::make('status')
                    ->getStateUsing(fn ($record) => $record->status ? 'Enabled' : 'Disabled')
                    ->colors([
                        'success' => fn ($record) => $record->status,
                        'danger' => fn ($record) => !$record->status,
                    ])
                    ->sortable(),

                // Toggle for inline enable/disable
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
    public static function canViewAny(): bool
    {
        return false;
    }
}
