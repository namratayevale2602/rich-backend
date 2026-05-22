<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DigitalMarketingServiceResource\Pages;
use App\Filament\Resources\DigitalMarketingServiceResource\RelationManagers;
use App\Models\DigitalMarketingService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class DigitalMarketingServiceResource extends Resource
{
    protected static ?string $model = DigitalMarketingService::class;
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationGroup = 'Services Management';
    protected static ?string $navigationLabel = 'Digital Marketing Services';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Basic Details')
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('label')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) =>
                                $set('slug', Str::slug($state))
                            ),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')->default(true),
                    ]),
                ]),

            Forms\Components\Section::make('Hero Section')
                ->schema([
                    Forms\Components\TextInput::make('hero_title')
                        ->label('Hero Title')
                        ->required()
                        ->maxLength(500)
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('hero_description')
                        ->label('Hero Description')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull(),
                ])
                ->description('Hero features are managed in the "Hero Features" tab below after saving.'),

            Forms\Components\Section::make('What We Deliver — Section Header')
                ->collapsed()
                ->schema([
                    Forms\Components\TextInput::make('deliver_title')
                        ->label('Section Title')
                        ->maxLength(255)
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('deliver_description')
                        ->label('Section Description')
                        ->rows(3)
                        ->columnSpanFull(),
                    Forms\Components\Repeater::make('deliver_approach')
                        ->label('Approach List')
                        ->schema([
                            Forms\Components\TextInput::make('item')->label('Approach Item')->required(),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['item'] ?? null)
                        ->columnSpanFull(),
                ])
                ->description('Deliver metrics are managed in the "Deliver Metrics" tab below.'),

            Forms\Components\Section::make('Process — Section Header')
                ->collapsed()
                ->schema([
                    Forms\Components\TextInput::make('process_title')
                        ->label('Section Title')
                        ->maxLength(255)
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('process_description')
                        ->label('Section Description')
                        ->rows(3)
                        ->columnSpanFull(),
                ])
                ->description('Process steps are managed in the "Process Steps" tab below.'),

            Forms\Components\Section::make('Strategies — Section Header')
                ->collapsed()
                ->schema([
                    Forms\Components\TextInput::make('strategies_title')
                        ->label('Section Title')
                        ->maxLength(255)
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('strategies_description')
                        ->label('Section Description')
                        ->rows(3)
                        ->columnSpanFull(),
                ])
                ->description('Strategy items are managed in the "Strategies" tab below.'),

            Forms\Components\Section::make('Benefits — Section Header')
                ->collapsed()
                ->schema([
                    Forms\Components\TextInput::make('benefits_title')
                        ->label('Section Title')
                        ->maxLength(255)
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('benefits_description')
                        ->label('Section Description')
                        ->rows(3)
                        ->columnSpanFull(),
                ])
                ->description('Benefit points are managed in the "Benefits" tab below.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')->sortable()->width('60px'),
                Tables\Columns\TextColumn::make('slug')->searchable()->copyable(),
                Tables\Columns\TextColumn::make('label')->searchable(),
                Tables\Columns\TextColumn::make('features_count')
                    ->label('Features')
                    ->counts('features'),
                Tables\Columns\TextColumn::make('solutions_count')
                    ->label('Solutions')
                    ->counts('solutions'),
                Tables\Columns\TextColumn::make('benefits_count')
                    ->label('Benefits')
                    ->counts('benefits'),
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
            RelationManagers\FeaturesRelationManager::class,
            RelationManagers\DeliverMetricsRelationManager::class,
            RelationManagers\SolutionsRelationManager::class,
            RelationManagers\StrategiesRelationManager::class,
            RelationManagers\ProcessStepsRelationManager::class,
            RelationManagers\BenefitsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListDigitalMarketingServices::route('/'),
            'create' => Pages\CreateDigitalMarketingService::route('/create'),
            'edit'   => Pages\EditDigitalMarketingService::route('/{record}/edit'),
        ];
    }
}
