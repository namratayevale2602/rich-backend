<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutKeyResource\Pages;
use App\Models\AboutKey;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutKeyResource extends Resource
{
    protected static ?string $model = AboutKey::class;
    protected static ?string $navigationIcon = 'heroicon-o-key';
    protected static ?string $navigationGroup = 'About Us';
    protected static ?string $navigationLabel = 'About Key Sections';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('type')
                                    ->required()
                                    ->options([
                                        'About'   => 'Who We Are (About)',
                                        'Vision'  => 'Our Vision',
                                        'Mission' => 'Our Mission',
                                        'Offer'   => 'What We Do (Offer)',
                                    ])
                                    ->placeholder('Select section type'),

                                Forms\Components\TextInput::make('order')
                                    ->label('Display Order')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('Lower numbers appear first'),
                            ]),

                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g. Who We Are'),

                        Forms\Components\TextInput::make('subtitle')
                            ->maxLength(255)
                            ->placeholder('e.g. Our Story (optional)'),

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(5)
                            ->placeholder('Enter section description'),
                    ]),

                Forms\Components\Section::make('Image')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Section Image')
                            ->required()
                            ->image()
                            ->directory('about-key')
                            ->visibility('public')
                            ->helperText('Recommended: 600x400px'),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->square()
                    ->size(60),

                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'About'   => 'info',
                        'Vision'  => 'success',
                        'Mission' => 'warning',
                        'Offer'   => 'danger',
                        default   => 'gray',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('subtitle')
                    ->limit(30),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ]),
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'About'   => 'Who We Are',
                        'Vision'  => 'Our Vision',
                        'Mission' => 'Our Mission',
                        'Offer'   => 'What We Do',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('moveUp')
                    ->action(function (AboutKey $record) {
                        $prev = AboutKey::where('order', '<', $record->order)
                            ->orderBy('order', 'desc')->first();
                        if ($prev) {
                            [$record->order, $prev->order] = [$prev->order, $record->order];
                            $record->save();
                            $prev->save();
                        }
                    })
                    ->icon('heroicon-o-arrow-up')
                    ->color('gray'),

                Tables\Actions\Action::make('moveDown')
                    ->action(function (AboutKey $record) {
                        $next = AboutKey::where('order', '>', $record->order)
                            ->orderBy('order', 'asc')->first();
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

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAboutKeys::route('/'),
            'create' => Pages\CreateAboutKey::route('/create'),
            'edit'   => Pages\EditAboutKey::route('/{record}/edit'),
        ];
    }
}
