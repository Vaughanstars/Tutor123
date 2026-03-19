<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParentModelResource\Pages;
use App\Filament\Resources\ParentModelResource\RelationManagers;
use App\Models\ParentModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class ParentModelResource extends Resource
{
    protected static ?string $model = ParentModel::class;



    protected static ?string $navigationLabel = 'Parents';
    protected static ?string $navigationGroup = 'Management';
    protected static ?string $navigationIcon = 'heroicon-o-users';
   // protected static ?string $navigationGroup = 'User Management';

    protected static ?string $modelLabel = 'Parent';
    protected static ?string $pluralModelLabel = 'Parents';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('first_name')
            ->required()
            ->maxLength(255),

            TextInput::make('middle_name')
            ->maxLength(255),

            TextInput::make('last_name')
            ->required()
            ->maxLength(255),

            TextInput::make('email')
            ->email()
            ->required()
            ->unique(ignoreRecord: true),

            TextInput::make('phone')
            ->tel(),

            // Select::make('student_id')
            // ->relationship('student', 'first_name')
            // ->searchable()
            // ->required(),

            // Select::make('student_id')
            // ->label('Student')
            // ->relationship(
            //     name: 'Student',
            //     titleAttribute: 'full_name'
            // )
            // ->getOptionLabelFromRecordUsing(
            //     fn ($record) => $record->student_id . ' - ' . $record->full_name
            // )
            //     ->searchable(['student_id', 'first_name', 'last_name']) // search by ID + name
            //     ->preload()
            //     ->required(),


            Select::make('student_id')
            ->label('Student')
            ->relationship(
                'student',
                'full_name',
                fn ($query, $livewire) => $query->whereDoesntHave('parents', function ($q) use ($livewire) {
            // Exclude all students with parents EXCEPT the currently selected student
                    if ($livewire->getRecord()) {
                        $q->where('id', '!=', $livewire->getRecord()->student_id);
                    }
                })
            )
            ->getOptionLabelFromRecordUsing(fn ($record) => $record->student_id . ' - ' . $record->full_name)
            ->searchable(['student_id', 'first_name', 'last_name'])
            ->preload()
            ->required(),

            TextInput::make('relation')
            ->required()
            ->placeholder('Father / Mother / Guardian'),

            Textarea::make('note')
            ->rows(3),

            TextInput::make('password')
            ->password()
            ->required(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
            ->dehydrated(fn ($state) => filled($state)),


            FileUpload::make('photo')
            ->label('Image')
            ->image()
            ->disk('public')
            ->directory(fn ($record) => 'parents/' . ($record?->id ?? 'new') . '/photos')
            ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('first_name')->searchable(),
            TextColumn::make('last_name')->searchable(),
            TextColumn::make('email')->searchable(),
            TextColumn::make('phone'),
            TextColumn::make('student.full_name')->label('Student'),
            TextColumn::make('relation'),

            ImageColumn::make('photo')
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
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParentModels::route('/'),
            'create' => Pages\CreateParentModel::route('/create'),
            'edit' => Pages\EditParentModel::route('/{record}/edit'),
        ];
    }
}
