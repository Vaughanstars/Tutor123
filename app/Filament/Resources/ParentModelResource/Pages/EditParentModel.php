<?php

namespace App\Filament\Resources\ParentModelResource\Pages;

use App\Filament\Resources\ParentModelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParentModel extends EditRecord
{
    protected static string $resource = ParentModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
