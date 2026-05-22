<?php

namespace App\Filament\Resources\DigitalMarketingServiceResource\Pages;

use App\Filament\Resources\DigitalMarketingServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDigitalMarketingService extends EditRecord
{
    protected static string $resource = DigitalMarketingServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
