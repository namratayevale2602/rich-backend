<?php

namespace App\Filament\Resources\ContactPhoneResource\Pages;

use App\Filament\Resources\ContactPhoneResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactPhone extends EditRecord
{
    protected static string $resource = ContactPhoneResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
