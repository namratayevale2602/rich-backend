<?php

namespace App\Filament\Resources\FaqProductResource\Pages;

use App\Filament\Resources\FaqProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFaqProduct extends EditRecord
{
    protected static string $resource = FaqProductResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
