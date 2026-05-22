<?php
namespace App\Filament\Resources\ServiceWeOfferResource\Pages;
use App\Filament\Resources\ServiceWeOfferResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListServicesWeOffer extends ListRecords {
    protected static string $resource = ServiceWeOfferResource::class;
    protected function getHeaderActions(): array { return [Actions\CreateAction::make()]; }
}
