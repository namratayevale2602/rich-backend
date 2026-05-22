<?php

namespace App\Filament\Resources\FaqProductResource\Pages;

use App\Filament\Resources\FaqProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaqProducts extends ListRecords
{
    protected static string $resource = FaqProductResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
