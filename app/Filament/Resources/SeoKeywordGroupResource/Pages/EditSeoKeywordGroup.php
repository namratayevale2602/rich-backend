<?php

namespace App\Filament\Resources\SeoKeywordGroupResource\Pages;

use App\Filament\Resources\SeoKeywordGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeoKeywordGroup extends EditRecord
{
    protected static string $resource = SeoKeywordGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
