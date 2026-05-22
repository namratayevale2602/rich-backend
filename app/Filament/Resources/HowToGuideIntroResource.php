<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HowToGuideIntroResource\Pages;
use App\Models\HowToGuideIntro;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HowToGuideIntroResource extends Resource
{
    protected static ?string $model = HowToGuideIntro::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'How-To Guide';
    protected static ?string $navigationLabel = 'Introduction';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Page Introduction')
                ->schema([
                    Forms\Components\Textarea::make('introduction')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull(),

                    Forms\Components\Toggle::make('is_active')
                        ->default(true),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('introduction')->limit(80)->searchable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHowToGuideIntros::route('/'),
            'create' => Pages\CreateHowToGuideIntro::route('/create'),
            'edit'   => Pages\EditHowToGuideIntro::route('/{record}/edit'),
        ];
    }
}
