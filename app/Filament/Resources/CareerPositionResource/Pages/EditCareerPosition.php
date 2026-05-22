<?php

namespace App\Filament\Resources\CareerPositionResource\Pages;

use App\Filament\Resources\CareerPositionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCareerPosition extends EditRecord
{
    protected static string $resource = CareerPositionResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
