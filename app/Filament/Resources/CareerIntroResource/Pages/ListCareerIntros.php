<?php

namespace App\Filament\Resources\CareerIntroResource\Pages;

use App\Filament\Resources\CareerIntroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCareerIntros extends ListRecords
{
    protected static string $resource = CareerIntroResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
