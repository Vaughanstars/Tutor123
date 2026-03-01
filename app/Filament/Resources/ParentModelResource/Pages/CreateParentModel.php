<?php

namespace App\Filament\Resources\ParentModelResource\Pages;

use App\Filament\Resources\ParentModelResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateParentModel extends CreateRecord
{
    protected static string $resource = ParentModelResource::class;
}
