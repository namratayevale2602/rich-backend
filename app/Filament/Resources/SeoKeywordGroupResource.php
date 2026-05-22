<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeoKeywordGroupResource\Pages;
use App\Filament\Resources\SeoKeywordGroupResource\RelationManagers;
use App\Models\SeoKeywordGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SeoKeywordGroupResource extends Resource
{
    protected static ?string $model = SeoKeywordGroup::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'SEO Management';
    protected static ?string $navigationLabel = 'Keyword Groups';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Group Details')
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('group_key')
                            ->label('Group Key')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(100)
                            ->helperText('Unique identifier used in code (e.g. nashikCore, softwareDev)'),
                        Forms\Components\TextInput::make('label')
                            ->label('Group Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')->default(true),
                    ]),
                    Forms\Components\Textarea::make('description')
                        ->label('Description')
                        ->rows(2)
                        ->nullable()
                        ->columnSpanFull()
                        ->helperText('Optional note about what these keywords are for'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')->sortable()->width('60px'),
                Tables\Columns\TextColumn::make('group_key')
                    ->label('Key')
                    ->searchable()
                    ->copyable()
                    ->fontFamily('mono'),
                Tables\Columns\TextColumn::make('label')
                    ->label('Group Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keywords_count')
                    ->label('Keywords')
                    ->counts('keywords'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(60)
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order')
            ->filters([Tables\Filters\TernaryFilter::make('is_active')])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\KeywordsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSeoKeywordGroups::route('/'),
            'create' => Pages\CreateSeoKeywordGroup::route('/create'),
            'edit'   => Pages\EditSeoKeywordGroup::route('/{record}/edit'),
        ];
    }
}
