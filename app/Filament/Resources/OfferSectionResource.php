<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfferSectionResource\Pages;
use App\Models\OfferSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OfferSectionResource extends Resource
{
    protected static ?string $model = OfferSection::class;
    protected static ?string $navigationIcon = 'heroicon-o-gift';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationLabel = 'Offer Section';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Content')->schema([
                Forms\Components\TextInput::make('title')->required()->maxLength(255),
                Forms\Components\TextInput::make('subtitle')->required()->maxLength(255),
                Forms\Components\Textarea::make('description')->required()->rows(5),
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('button_text')->default('Contact us now'),
                    Forms\Components\TextInput::make('button_link')->default('/schedule-a-demo'),
                ]),
            ]),

            Forms\Components\Section::make('Video')->schema([
                Forms\Components\FileUpload::make('video')
                    ->label('Integration Video')
                    ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/*'])
                    ->directory('offer')
                    ->visibility('public')
                    ->helperText('MP4 format recommended'),
            ]),

            Forms\Components\Section::make('Settings')->schema([
                Forms\Components\Toggle::make('is_active')
                    ->default(true)
                    ->helperText('Only one offer section should be active at a time'),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->limit(40),
                Tables\Columns\TextColumn::make('subtitle')->limit(40),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->defaultSort('updated_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('activate')
                    ->action(function (OfferSection $record) {
                        OfferSection::where('id', '!=', $record->id)->update(['is_active' => false]);
                        $record->update(['is_active' => true]);
                    })
                    ->icon('heroicon-o-check-circle')->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (OfferSection $r): bool => !$r->is_active),
            ])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListOfferSections::route('/'),
            'create' => Pages\CreateOfferSection::route('/create'),
            'edit'   => Pages\EditOfferSection::route('/{record}/edit'),
        ];
    }
}
