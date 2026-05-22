<?php

namespace App\Filament\Resources\ServiceResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class BenefitsRelationManager extends RelationManager
{
    protected static string $relationship = 'benefits';
    protected static ?string $title = 'Benefits';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')->required()->maxLength(255),
            Forms\Components\TextInput::make('subtitle')->maxLength(255),
            Forms\Components\Textarea::make('description')->required()->rows(4),
            Forms\Components\FileUpload::make('image')
                ->image()
                ->directory('services/benefits')
                ->visibility('public'),
            Forms\Components\Repeater::make('list')
                ->label('Benefit Points')
                ->schema([
                    Forms\Components\TextInput::make('item')->label('Point')->required(),
                ])
                ->collapsible()
                ->itemLabel(fn (array $state): ?string => $state['item'] ?? null)
                ->minItems(1),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->square()->size(40),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('subtitle')->limit(40),
                Tables\Columns\TextColumn::make('description')->limit(60),
            ])
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
