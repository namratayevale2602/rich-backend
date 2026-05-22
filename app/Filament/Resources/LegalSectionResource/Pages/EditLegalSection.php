<?php

namespace App\Filament\Resources\LegalSectionResource\Pages;

use App\Filament\Resources\LegalSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLegalSection extends EditRecord
{
    protected static string $resource = LegalSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
