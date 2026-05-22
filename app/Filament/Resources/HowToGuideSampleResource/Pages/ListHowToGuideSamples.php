<?php

namespace App\Filament\Resources\HowToGuideSampleResource\Pages;

use App\Filament\Resources\HowToGuideSampleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHowToGuideSamples extends ListRecords
{
    protected static string $resource = HowToGuideSampleResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
