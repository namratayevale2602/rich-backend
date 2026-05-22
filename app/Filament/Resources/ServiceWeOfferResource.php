<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceWeOfferResource\Pages;
use App\Models\ServiceWeOffer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceWeOfferResource extends Resource
{
    protected static ?string $model = ServiceWeOffer::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Services We Offer';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Service Details')->schema([
                Forms\Components\Grid::make(3)->schema([
                    Forms\Components\TextInput::make('number')
                        ->required()->maxLength(5)->placeholder('01'),
                    Forms\Components\TextInput::make('title')
                        ->required()->maxLength(255)->placeholder('SOFTWARE & IT SERVICES'),
                    Forms\Components\Select::make('icon')
                        ->options([
                            'Code'      => 'Code (Software)',
                            'Megaphone' => 'Megaphone (Social Media)',
                            'BarChart'  => 'Bar Chart (SEO)',
                            'PenTool'   => 'Pen Tool (Design)',
                            'Layers'    => 'Layers (Content)',
                            'Target'    => 'Target (Performance)',
                        ])->placeholder('Select icon'),
                ]),
                Forms\Components\TextInput::make('description')
                    ->required()->maxLength(255),
                Forms\Components\TextInput::make('gradient')
                    ->label('Gradient CSS Classes')
                    ->default('from-blue-600 to-purple-700')
                    ->helperText('Tailwind gradient classes, e.g. from-blue-600 to-purple-700'),
            ]),

            Forms\Components\Section::make('Image')->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('Main Image')->image()->directory('services-we-offer')->visibility('public'),
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\FileUpload::make('image_400')
                        ->label('Image 400w')->image()->directory('services-we-offer/responsive')->visibility('public'),
                    Forms\Components\FileUpload::make('image_700')
                        ->label('Image 700w')->image()->directory('services-we-offer/responsive')->visibility('public'),
                ]),
            ]),

            Forms\Components\Section::make('Service Features')
                ->description('List all features/sub-services for this category')
                ->schema([
                    Forms\Components\Repeater::make('features')
                        ->label('Features')
                        ->schema([
                            Forms\Components\TextInput::make('item')
                                ->required()->placeholder('e.g., Custom Software Development'),
                        ])
                        ->addActionLabel('Add Feature')
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['item'] ?? null)
                        ->minItems(1),
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
                Tables\Columns\TextColumn::make('number')->sortable(),
                Tables\Columns\TextColumn::make('title')->searchable()->limit(30),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('order')->sortable(),
            ])
            ->defaultSort('order', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListServicesWeOffer::route('/'),
            'create' => Pages\CreateServiceWeOffer::route('/create'),
            'edit'   => Pages\EditServiceWeOffer::route('/{record}/edit'),
        ];
    }
}
