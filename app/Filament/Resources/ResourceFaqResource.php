<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResourceFaqResource\Pages;
use App\Models\FaqProduct;
use App\Models\ResourceFaq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ResourceFaqResource extends Resource
{
    protected static ?string $model = ResourceFaq::class;
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationGroup = 'FAQ Management';
    protected static ?string $navigationLabel = 'FAQ Questions';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('FAQ Details')
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\Select::make('faq_product_id')
                            ->label('Category')
                            ->options(FaqProduct::active()->pluck('title', 'id'))
                            ->searchable()
                            ->required(),

                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0),

                        Forms\Components\Toggle::make('is_active')
                            ->default(true),
                    ]),

                    Forms\Components\TextInput::make('question')
                        ->required()
                        ->maxLength(500)
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('answer')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')->sortable()->width('60px'),
                Tables\Columns\TextColumn::make('product.title')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('question')->searchable()->limit(60),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('order')
            ->filters([
                Tables\Filters\SelectFilter::make('faq_product_id')
                    ->label('Category')
                    ->options(FaqProduct::active()->pluck('title', 'id')),
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListResourceFaqs::route('/'),
            'create' => Pages\CreateResourceFaq::route('/create'),
            'edit'   => Pages\EditResourceFaq::route('/{record}/edit'),
        ];
    }
}
