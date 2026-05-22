<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutHeroResource\Pages;
use App\Models\AboutHero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutHeroResource extends Resource
{
    protected static ?string $model = AboutHero::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'About Us';
    protected static ?string $navigationLabel = 'About Hero';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('About Hero Content')
                    ->schema([
                        Forms\Components\TextInput::make('heading')
                            ->required()
                            ->maxLength(255)
                            ->default('One-on-one engagement, for everyone')
                            ->placeholder('Enter main heading'),

                        Forms\Components\TextInput::make('subtitle')
                            ->required()
                            ->maxLength(500)
                            ->default('Revolutionizing commerce, marketing, and support with conversational messaging worldwide')
                            ->placeholder('Enter subtitle'),

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(5)
                            ->default('Rich System Solutions Pvt Ltd, established in 2009, is a leading digital marketing company in Nashik. We help brands achieve their business goals through comprehensive services like web design, development, social media marketing, paid marketing, and more. Our experienced team works closely with you, understanding your needs and delivering results that drive growth and success')
                            ->placeholder('Enter description paragraph'),
                    ]),

                Forms\Components\Section::make('Background Image')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Hero Background Image (Optional)')
                            ->image()
                            ->imageResizeMode('cover')
                            ->directory('about-hero')
                            ->visibility('public')
                            ->helperText('Optional background image for the about hero section'),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Only one about hero section can be active at a time.'),
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

                Tables\Columns\TextColumn::make('heading')
                    ->searchable()
                    ->limit(40),

                Tables\Columns\TextColumn::make('subtitle')
                    ->limit(50),

                Tables\Columns\TextColumn::make('description')
                    ->limit(60)
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
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
                Tables\Actions\Action::make('activate')
                    ->action(function (AboutHero $record) {
                        AboutHero::where('id', '!=', $record->id)->update(['is_active' => false]);
                        $record->update(['is_active' => true]);
                    })
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (AboutHero $record): bool => !$record->is_active),
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
            'index'  => Pages\ListAboutHeroes::route('/'),
            'create' => Pages\CreateAboutHero::route('/create'),
            'edit'   => Pages\EditAboutHero::route('/{record}/edit'),
        ];
    }
}
