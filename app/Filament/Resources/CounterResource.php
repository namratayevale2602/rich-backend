<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CounterResource\Pages;
use App\Models\Counter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CounterResource extends Resource
{
    protected static ?string $model = Counter::class;
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Counter Details')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('number')
                                    ->label('Counter Number')
                                    ->required()
                                    ->numeric()
                                    ->placeholder('e.g., 2000'),

                                Forms\Components\TextInput::make('title_suffix')
                                    ->label('Suffix After Number')
                                    ->placeholder('e.g., +, %, Years, Million +')
                                    ->helperText('Text shown right after the animated number'),
                            ]),

                        Forms\Components\TextInput::make('subtitle')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., Satisfied Clients'),
                    ]),

                Forms\Components\Section::make('Icon')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\FileUpload::make('icon')
                                    ->label('Icon Image')
                                    ->image()
                                    ->directory('counter')
                                    ->visibility('public')
                                    ->helperText('Recommended: 112×112px'),

                                Forms\Components\FileUpload::make('icon_2x')
                                    ->label('Icon Image 2x (HiDPI)')
                                    ->image()
                                    ->directory('counter')
                                    ->visibility('public')
                                    ->helperText('Recommended: 224×224px (optional)'),
                            ]),

                        Forms\Components\TextInput::make('icon_sizes')
                            ->label('Sizes Attribute')
                            ->default('64px')
                            ->placeholder('e.g., (max-width: 640px) 112px, 64px')
                            ->helperText('HTML sizes attribute for responsive icon rendering'),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),

                                Forms\Components\TextInput::make('order')
                                    ->label('Display Order')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('Lower numbers appear first'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('icon')
                    ->label('Icon')
                    ->square()
                    ->size(50),

                Tables\Columns\TextColumn::make('number')
                    ->sortable(),

                Tables\Columns\TextColumn::make('title_suffix')
                    ->label('Suffix'),

                Tables\Columns\TextColumn::make('subtitle')
                    ->searchable()
                    ->limit(35),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('order')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('moveUp')
                    ->action(function (Counter $record) {
                        $prev = Counter::where('order', '<', $record->order)
                            ->orderBy('order', 'desc')
                            ->first();
                        if ($prev) {
                            [$record->order, $prev->order] = [$prev->order, $record->order];
                            $record->save();
                            $prev->save();
                        }
                    })
                    ->icon('heroicon-o-arrow-up')
                    ->color('gray'),

                Tables\Actions\Action::make('moveDown')
                    ->action(function (Counter $record) {
                        $next = Counter::where('order', '>', $record->order)
                            ->orderBy('order', 'asc')
                            ->first();
                        if ($next) {
                            [$record->order, $next->order] = [$next->order, $record->order];
                            $record->save();
                            $next->save();
                        }
                    })
                    ->icon('heroicon-o-arrow-down')
                    ->color('gray'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCounters::route('/'),
            'create' => Pages\CreateCounter::route('/create'),
            'edit'   => Pages\EditCounter::route('/{record}/edit'),
        ];
    }
}
