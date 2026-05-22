<?php

namespace App\Filament\Resources\HowToGuideMagazineResource\Pages;

use App\Filament\Resources\HowToGuideMagazineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHowToGuideMagazines extends ListRecords
{
    protected static string $resource = HowToGuideMagazineResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
