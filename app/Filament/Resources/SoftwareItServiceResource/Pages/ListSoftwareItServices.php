<?php

namespace App\Filament\Resources\SoftwareItServiceResource\Pages;

use App\Filament\Resources\SoftwareItServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSoftwareItServices extends ListRecords
{
    protected static string $resource = SoftwareItServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
