<?php

namespace App\Filament\Resources\ResourceFaqResource\Pages;

use App\Filament\Resources\ResourceFaqResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResourceFaq extends EditRecord
{
    protected static string $resource = ResourceFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
