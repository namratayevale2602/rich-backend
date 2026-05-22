<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndustryResource\Pages;
use App\Models\Industry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class IndustryResource extends Resource
{
    protected static ?string $model = Industry::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Industry Details')->schema([
                Forms\Components\TextInput::make('title')->required()->maxLength(255),
                Forms\Components\TextInput::make('path')->required()->placeholder('/software-it-services/custom-software-development'),
            ]),

            Forms\Components\Section::make('Image')->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('Main Image')->image()->directory('industries')->visibility('public'),
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\FileUpload::make('image_440')
                        ->label('Image 440w')->image()->directory('industries/responsive')->visibility('public'),
                    Forms\Components\FileUpload::make('image_700')
                        ->label('Image 700w')->image()->directory('industries/responsive')->visibility('public'),
                ]),
            ]),

            Forms\Components\Section::make('Styling')->schema([
                Forms\Components\TextInput::make('bg_color')
                    ->label('Background Color (Tailwind)')
                    ->default('bg-gradient-to-br from-blue-50 to-blue-100')
                    ->helperText('e.g., bg-gradient-to-br from-blue-50 to-blue-100'),
                Forms\Components\TextInput::make('accent_color')
                    ->label('Accent Color (Tailwind gradient)')
                    ->default('from-blue-500 to-blue-600')
                    ->helperText('e.g., from-blue-500 to-blue-600'),
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
                Tables\Columns\ImageColumn::make('image')->square()->size(50),
                Tables\Columns\TextColumn::make('title')->searchable()->limit(35),
                Tables\Columns\TextColumn::make('path')->limit(40),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('order')->sortable(),
            ])
            ->defaultSort('order', 'asc')
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListIndustries::route('/'),
            'create' => Pages\CreateIndustry::route('/create'),
            'edit'   => Pages\EditIndustry::route('/{record}/edit'),
        ];
    }
}
