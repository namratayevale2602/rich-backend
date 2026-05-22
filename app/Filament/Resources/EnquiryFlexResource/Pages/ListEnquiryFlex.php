<?php

namespace App\Filament\Resources\EnquiryFlexResource\Pages;

use App\Filament\Resources\EnquiryFlexResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEnquiryFlex extends ListRecords
{
    protected static string $resource = EnquiryFlexResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
