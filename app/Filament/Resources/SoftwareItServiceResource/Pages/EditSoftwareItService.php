<?php

namespace App\Filament\Resources\SoftwareItServiceResource\Pages;

use App\Filament\Resources\SoftwareItServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSoftwareItService extends EditRecord
{
    protected static string $resource = SoftwareItServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
