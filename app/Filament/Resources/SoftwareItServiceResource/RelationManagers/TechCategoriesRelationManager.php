<?php

namespace App\Filament\Resources\SoftwareItServiceResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class TechCategoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'techCategories';
    protected static ?string $title = 'Technologies';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('category')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('order')->numeric()->default(0),
            Forms\Components\Repeater::make('technologies')
                ->label('Technologies')
                ->schema([
                    Forms\Components\TextInput::make('item')->label('Technology')->required(),
                ])
                ->collapsible()
                ->itemLabel(fn (array $state): ?string => $state['item'] ?? null)
                ->columnSpanFull(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->columns([
                Tables\Columns\TextColumn::make('category')->searchable(),
                Tables\Columns\TextColumn::make('order')->sortable(),
            ])
            ->defaultSort('order')
            ->headerActions([Tables\Actions\CreateAction::make()])
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
}
