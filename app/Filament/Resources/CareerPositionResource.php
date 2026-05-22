<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerPositionResource\Pages;
use App\Models\CareerPosition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CareerPositionResource extends Resource
{
    protected static ?string $model = CareerPosition::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Career Management';
    protected static ?string $navigationLabel = 'Job Positions';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Position Details')
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('position')
                            ->required()
                            ->maxLength(255)
                            ->label('Job Title'),

                        Forms\Components\TextInput::make('experience')
                            ->required()
                            ->maxLength(50)
                            ->placeholder('e.g. 2-4')
                            ->label('Experience (years)'),

                        Forms\Components\Select::make('type')
                            ->options([
                                'Full-time'  => 'Full-time',
                                'Part-time'  => 'Part-time',
                                'Contract'   => 'Contract',
                                'Internship' => 'Internship',
                                'Remote'     => 'Remote',
                            ])
                            ->default('Full-time')
                            ->required(),

                        Forms\Components\TextInput::make('location')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('e.g. Nashik'),

                        Forms\Components\TextInput::make('opening')
                            ->required()
                            ->maxLength(20)
                            ->placeholder('e.g. 3')
                            ->label('No. of Openings'),

                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0),

                        Forms\Components\Toggle::make('is_active')
                            ->default(true),
                    ]),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')->sortable()->width('60px'),
                Tables\Columns\TextColumn::make('position')->searchable(),
                Tables\Columns\TextColumn::make('experience')->label('Exp (yrs)'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('opening')->label('Openings'),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('order')
            ->filters([Tables\Filters\TernaryFilter::make('is_active')])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCareerPositions::route('/'),
            'create' => Pages\CreateCareerPosition::route('/create'),
            'edit'   => Pages\EditCareerPosition::route('/{record}/edit'),
        ];
    }
}
