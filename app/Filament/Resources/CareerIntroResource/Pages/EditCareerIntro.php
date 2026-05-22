<?php

namespace App\Filament\Resources\CareerIntroResource\Pages;

use App\Filament\Resources\CareerIntroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCareerIntro extends EditRecord
{
    protected static string $resource = CareerIntroResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
