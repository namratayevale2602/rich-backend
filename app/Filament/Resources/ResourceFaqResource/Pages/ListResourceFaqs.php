<?php

namespace App\Filament\Resources\ResourceFaqResource\Pages;

use App\Filament\Resources\ResourceFaqResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResourceFaqs extends ListRecords
{
    protected static string $resource = ResourceFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
