<?php

namespace App\Filament\Resources\HowToGuideIntroResource\Pages;

use App\Filament\Resources\HowToGuideIntroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHowToGuideIntro extends EditRecord
{
    protected static string $resource = HowToGuideIntroResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
