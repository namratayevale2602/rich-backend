<?php

namespace App\Filament\Resources\AboutKeyResource\Pages;

use App\Filament\Resources\AboutKeyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutKey extends EditRecord
{
    protected static string $resource = AboutKeyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
