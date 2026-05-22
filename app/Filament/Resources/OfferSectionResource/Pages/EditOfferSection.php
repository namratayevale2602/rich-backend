<?php
namespace App\Filament\Resources\OfferSectionResource\Pages;
use App\Filament\Resources\OfferSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditOfferSection extends EditRecord {
    protected static string $resource = OfferSectionResource::class;
    protected function getHeaderActions(): array { return [Actions\DeleteAction::make()]; }
}
