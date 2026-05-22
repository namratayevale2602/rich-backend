<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 9;
    protected static ?string $navigationLabel = 'FAQs';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('FAQ Content')->schema([
                Forms\Components\Textarea::make('question')->required()->rows(2)->maxLength(500),
                Forms\Components\Textarea::make('answer')->required()->rows(5)->maxLength(2000),
            ]),

            Forms\Components\Section::make('Categorisation')->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\Select::make('product_name')
                        ->label('Category')
                        ->options([
                            'software-it'          => 'Software & IT Services',
                            'social-media'         => 'Social Media Marketing',
                            'seo'                  => 'SEO Services',
                            'design-dev'           => 'Design & Development',
                            'content-marketing'    => 'Content Marketing',
                            'performance-marketing'=> 'Performance Marketing',
                            'general'              => 'General',
                        ])
                        ->required()
                        ->default('general'),

                    Forms\Components\Toggle::make('is_visible_home')
                        ->label('Visible on Home Page')
                        ->default(false),
                ]),
            ]),

            Forms\Components\Section::make('Settings')->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\Toggle::make('is_active')->default(true),
                    Forms\Components\TextInput::make('order')->numeric()->default(0),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')->searchable()->limit(50),
                Tables\Columns\TextColumn::make('product_name')->badge()->label('Category'),
                Tables\Columns\IconColumn::make('is_visible_home')->boolean()->label('Home'),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('order')->sortable(),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('product_name')
                    ->label('Category')
                    ->options([
                        'software-it'          => 'Software & IT',
                        'social-media'         => 'Social Media',
                        'seo'                  => 'SEO',
                        'design-dev'           => 'Design & Dev',
                        'content-marketing'    => 'Content Marketing',
                        'performance-marketing'=> 'Performance Marketing',
                        'general'              => 'General',
                    ]),
                Tables\Filters\SelectFilter::make('is_visible_home')
                    ->label('Visible on Home')
                    ->options(['1' => 'Yes', '0' => 'No']),
            ])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit'   => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
