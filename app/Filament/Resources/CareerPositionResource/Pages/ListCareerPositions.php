<?php

namespace App\Filament\Resources\CareerPositionResource\Pages;

use App\Filament\Resources\CareerPositionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCareerPositions extends ListRecords
{
    protected static string $resource = CareerPositionResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
