<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Actions\Action;
use Filament\Forms\Form;
use App\Models\SiteSetting;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Notifications\Notification;

class SiteSettings extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $title = 'Site Settings';
    protected static string $view = 'filament.pages.site-settings';

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Settings';
    protected static ?string $navigationGroup = 'Site Settings';
    protected static ?int $navigationSort = 1000; // pushes to bottom

    // 🔥 Important for Filament state handling
    public ?array $data = [];

    /*
    |--------------------------------------------------------------------------
    | Load Settings
    |--------------------------------------------------------------------------
    */
    public function mount(): void
    {
        $settings = SiteSetting::first();
        $this->form->fill($settings?->toArray() ?? []);
    }

    /*
    |--------------------------------------------------------------------------
    | Form Schema
    |--------------------------------------------------------------------------
    */
    public function form(Form $form): Form
    {
        return $form
        ->schema([

                /*
                |--------------------------------------------------
                | Contact Information
                |--------------------------------------------------
                */
                Grid::make(2)->schema([
                    TextInput::make('contact_email')
                    ->label('Contact Email')
                    ->email()
                    ->required(),

                    TextInput::make('phone_number')
                    ->label('Phone Number')
                    ->required()->tel(),


                    TextInput::make('whatsapp_number')
                    ->label('WhatsApp Number')->tel(),

                    Textarea::make('address')
                    ->label('Address'),
                ]),

                /*
                |--------------------------------------------------
                | Social Media
                |--------------------------------------------------
                */
                Grid::make(2)->schema([
                    TextInput::make('facebook_url')->label('Facebook URL'),
                    TextInput::make('instagram_url')->label('Instagram URL'),
                    TextInput::make('twitter_url')->label('Twitter URL'),
                    TextInput::make('linkedin_url')->label('LinkedIn URL'),
                    TextInput::make('youtube_url')->label('YouTube URL'),
                ]),

                /*
                |--------------------------------------------------
                | Opening Hours Heading
                |--------------------------------------------------
                */
                Placeholder::make('opening_hours')
                ->columnSpanFull(),

                /*
                |--------------------------------------------------
                | Opening Hours Grid
                |--------------------------------------------------
                */
                Grid::make(2)->schema([

                    TimePicker::make('monday_start')->label('Monday Start')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),
                    TimePicker::make('monday_end')->label('Monday End')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),

                    TimePicker::make('tuesday_start')->label('Tuesday Start')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),
                    TimePicker::make('tuesday_end')->label('Tuesday End')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),

                    TimePicker::make('wednesday_start')->label('Wednesday Start')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),
                    TimePicker::make('wednesday_end')->label('Wednesday End')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),

                    TimePicker::make('thursday_start')->label('Thursday Start')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),
                    TimePicker::make('thursday_end')->label('Thursday End')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),

                    TimePicker::make('friday_start')->label('Friday Start')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),
                    TimePicker::make('friday_end')->label('Friday End')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),

                    TimePicker::make('saturday_start')->label('Saturday Start')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),
                    TimePicker::make('saturday_end')->label('Saturday End')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),

                    TimePicker::make('sunday_start')->label('Sunday Start')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),
                    TimePicker::make('sunday_end')->label('Sunday End')->withoutSeconds()
                    ->displayFormat('h:i A')->format('H:i:s'),
                ]),
            ])
            ->statePath('data'); // 🔥 VERY IMPORTANT
        }

    /*
    |--------------------------------------------------------------------------
    | Save Settings
    |--------------------------------------------------------------------------
    */
    // public function save(): void
    // {
    //     $settings = SiteSetting::first() ?? new SiteSetting();

    //     $settings->fill($this->data);
    //     $settings->save();

    //     //$this->notify('success', 'Settings saved successfully!');
    //     Notification::make()
    //     ->title('Settings saved successfully')
    //     ->success()
    //     ->send();
    // }

    public function save(): void
    {
        $data = $this->form->getState(); 

        $settings = SiteSetting::first() ?? new SiteSetting();
        $settings->fill($data);
        $settings->save();

        Notification::make()
        ->title('Settings saved successfully')
        ->success()
        ->send();
    }

    /*
    |--------------------------------------------------------------------------
    | Header Save Button
    |--------------------------------------------------------------------------
    */
    protected function getActions(): array
    {
        return [
            Action::make('save')
            ->label('Save Settings')
            ->button()
            ->action('save'),
        ];
    }
}