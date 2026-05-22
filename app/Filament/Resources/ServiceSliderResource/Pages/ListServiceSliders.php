<?php

namespace App\Filament\Resources\ServiceSliderResource\Pages;

use App\Filament\Resources\ServiceSliderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceSliders extends ListRecords
{
    protected static string $resource = ServiceSliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
