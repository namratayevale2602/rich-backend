<?php
namespace App\Filament\Resources\OfferSectionResource\Pages;
use App\Filament\Resources\OfferSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListOfferSections extends ListRecords {
    protected static string $resource = OfferSectionResource::class;
    protected function getHeaderActions(): array { return [Actions\CreateAction::make()]; }
}
