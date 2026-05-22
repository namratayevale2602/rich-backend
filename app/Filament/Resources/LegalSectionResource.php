<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LegalSectionResource\Pages;
use App\Models\LegalPage;
use App\Models\LegalSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LegalSectionResource extends Resource
{
    protected static ?string $model = LegalSection::class;
    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationGroup = 'Legal';
    protected static ?string $navigationLabel = 'Sections';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make()->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\Select::make('legal_page_id')
                        ->label('Legal Page')
                        ->options(LegalPage::pluck('page_title', 'id'))
                        ->required()
                        ->searchable(),

                    Forms\Components\TextInput::make('order')
                        ->numeric()
                        ->default(0),
                ]),

                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('content')
                    ->required()
                    ->rows(6)
                    ->columnSpanFull(),

                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\Toggle::make('show_contact_info')
                        ->label('Show Contact Info Block')
                        ->default(false),
                    Forms\Components\Toggle::make('is_active')->default(true),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('legalPage.page_title')->label('Page')->sortable(),
                Tables\Columns\TextColumn::make('order')->sortable()->width(60),
                Tables\Columns\TextColumn::make('title')->searchable()->limit(60),
                Tables\Columns\TextColumn::make('subsections_count')->counts('subsections')->label('Subsections'),
                Tables\Columns\IconColumn::make('show_contact_info')->boolean()->label('Contact Block'),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('order')
            ->filters([
                Tables\Filters\SelectFilter::make('legal_page_id')
                    ->label('Page')
                    ->options(LegalPage::pluck('page_title', 'id')),
            ])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getRelations(): array
    {
        return [
            LegalSectionResource\RelationManagers\SubsectionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListLegalSections::route('/'),
            'create' => Pages\CreateLegalSection::route('/create'),
            'edit'   => Pages\EditLegalSection::route('/{record}/edit'),
        ];
    }
}
