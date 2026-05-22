<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageSeoResource\Pages;
use App\Models\PageSeo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageSeoResource extends Resource
{
    protected static ?string $model = PageSeo::class;
    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';
    protected static ?string $navigationGroup = 'SEO Management';
    protected static ?string $navigationLabel = 'Page SEO';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Page Identity')
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('page_key')
                            ->label('Page Key')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(100)
                            ->helperText('Unique identifier used in code (e.g. home, about, bulkSMS)'),
                        Forms\Components\TextInput::make('label')
                            ->label('Page Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('group')
                            ->label('Group')
                            ->required()
                            ->options([
                                'page'                       => 'Page',
                                'product'                    => 'Product',
                                'software_service'           => 'Software Service',
                                'digital_marketing_service'  => 'Digital Marketing Service',
                            ]),
                        Forms\Components\TextInput::make('group_label')
                            ->label('Group Label')
                            ->required()
                            ->maxLength(100)
                            ->helperText('e.g. Pages, Products, Software Services'),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')->default(true),
                    ]),
                ]),

            Forms\Components\Section::make('SEO Meta Tags')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Meta Title')
                        ->required()
                        ->maxLength(500)
                        ->columnSpanFull()
                        ->helperText('Recommended: 50–60 characters'),
                    Forms\Components\Textarea::make('description')
                        ->label('Meta Description')
                        ->required()
                        ->rows(3)
                        ->columnSpanFull()
                        ->helperText('Recommended: 150–160 characters'),
                    Forms\Components\Textarea::make('keywords')
                        ->label('Keywords')
                        ->rows(3)
                        ->columnSpanFull()
                        ->helperText('Comma-separated keywords'),
                ]),

            Forms\Components\Section::make('Page Content & URLs')
                ->schema([
                    Forms\Components\TextInput::make('h1')
                        ->label('H1 Heading')
                        ->maxLength(500)
                        ->columnSpanFull(),
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('canonical')
                            ->label('Canonical URL')
                            ->maxLength(255)
                            ->placeholder('/about')
                            ->helperText('URL path (starting with /)'),
                        Forms\Components\TextInput::make('og_image')
                            ->label('OG Image Path')
                            ->maxLength(255)
                            ->placeholder('/og-about.jpg')
                            ->helperText('Image path for social sharing'),
                        Forms\Components\TextInput::make('breadcrumb')
                            ->label('Breadcrumb Label')
                            ->maxLength(255)
                            ->nullable()
                            ->helperText('Breadcrumb text (for product/service pages)'),
                    ]),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->sortable()
                    ->width('50px'),
                Tables\Columns\TextColumn::make('group_label')
                    ->label('Group')
                    ->badge()
                    ->color(fn ($record) => match ($record->group) {
                        'page'                      => 'info',
                        'product'                   => 'warning',
                        'software_service'          => 'success',
                        'digital_marketing_service' => 'danger',
                        default                     => 'gray',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('page_key')
                    ->label('Key')
                    ->searchable()
                    ->copyable()
                    ->fontFamily('mono'),
                Tables\Columns\TextColumn::make('label')
                    ->label('Page Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Meta Title')
                    ->limit(60)
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('group', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->options([
                        'page'                       => 'Page',
                        'product'                    => 'Product',
                        'software_service'           => 'Software Service',
                        'digital_marketing_service'  => 'Digital Marketing Service',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPageSeos::route('/'),
            'create' => Pages\CreatePageSeo::route('/create'),
            'edit'   => Pages\EditPageSeo::route('/{record}/edit'),
        ];
    }
}
