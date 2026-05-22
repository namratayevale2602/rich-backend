<?php

namespace App\Filament\Resources\HowToGuideIntroResource\Pages;

use App\Filament\Resources\HowToGuideIntroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHowToGuideIntros extends ListRecords
{
    protected static string $resource = HowToGuideIntroResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
