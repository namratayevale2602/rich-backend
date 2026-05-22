<?php

namespace App\Filament\Resources\SeoKeywordGroupResource\Pages;

use App\Filament\Resources\SeoKeywordGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeoKeywordGroups extends ListRecords
{
    protected static string $resource = SeoKeywordGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
