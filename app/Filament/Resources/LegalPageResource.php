<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LegalPageResource\Pages;
use App\Models\LegalPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LegalPageResource extends Resource
{
    protected static ?string $model = LegalPage::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-check';
    protected static ?string $navigationGroup = 'Legal';
    protected static ?string $navigationLabel = 'Pages';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make()->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\Select::make('type')
                        ->options(['terms' => 'Terms & Conditions', 'privacy' => 'Privacy Policy'])
                        ->required()
                        ->unique(ignoreRecord: true),

                    Forms\Components\TextInput::make('page_title')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('last_updated')
                        ->placeholder('e.g. March 1, 2024')
                        ->maxLength(100),

                    Forms\Components\Toggle::make('is_active')
                        ->default(true),
                ]),

                Forms\Components\Textarea::make('introduction')
                    ->rows(4)
                    ->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('type')
                    ->colors(['primary' => 'terms', 'success' => 'privacy']),
                Tables\Columns\TextColumn::make('page_title'),
                Tables\Columns\TextColumn::make('last_updated'),
                Tables\Columns\TextColumn::make('sections_count')->counts('sections')->label('Sections'),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getRelations(): array
    {
        return [
            LegalPageResource\RelationManagers\SectionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListLegalPages::route('/'),
            'create' => Pages\CreateLegalPage::route('/create'),
            'edit'   => Pages\EditLegalPage::route('/{record}/edit'),
        ];
    }
}
