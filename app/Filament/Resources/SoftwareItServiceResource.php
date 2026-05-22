<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SoftwareItServiceResource\Pages;
use App\Filament\Resources\SoftwareItServiceResource\RelationManagers;
use App\Models\SoftwareItService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class SoftwareItServiceResource extends Resource
{
    protected static ?string $model = SoftwareItService::class;
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationGroup = 'Services Management';
    protected static ?string $navigationLabel = 'Software IT Services';
    protected static ?int $navigationSort = 3;

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
                ])
                ->description('Individual solutions are managed in the "Deliverables" tab below.'),

            Forms\Components\Section::make('Technologies — Section Header')
                ->collapsed()
                ->schema([
                    Forms\Components\TextInput::make('tech_title')
                        ->label('Section Title')
                        ->maxLength(255)
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('tech_description')
                        ->label('Section Description')
                        ->rows(3)
                        ->columnSpanFull(),
                ])
                ->description('Technology categories are managed in the "Technologies" tab below.'),

            Forms\Components\Section::make('Development Process — Section Header')
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
                Tables\Columns\TextColumn::make('deliverables_count')
                    ->label('Deliverables')
                    ->counts('deliverables'),
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
            RelationManagers\DeliverablesRelationManager::class,
            RelationManagers\TechCategoriesRelationManager::class,
            RelationManagers\ProcessStepsRelationManager::class,
            RelationManagers\BenefitsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSoftwareItServices::route('/'),
            'create' => Pages\CreateSoftwareItService::route('/create'),
            'edit'   => Pages\EditSoftwareItService::route('/{record}/edit'),
        ];
    }
}
