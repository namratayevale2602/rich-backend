<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutUsSectionResource\Pages;
use App\Models\AboutUsSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutUsSectionResource extends Resource
{
    protected static ?string $model = AboutUsSection::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'About Us';
    protected static ?string $navigationLabel = 'About Us Section';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\TextInput::make('label')
                            ->required()
                            ->maxLength(100)
                            ->default('About Us')
                            ->placeholder('e.g. About Us'),

                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->default('The Journey Of Rich System Solution')
                            ->placeholder('Enter section title'),

                        Forms\Components\Repeater::make('paragraphs')
                            ->label('Paragraphs')
                            ->schema([
                                Forms\Components\Textarea::make('text')
                                    ->label('Paragraph')
                                    ->required()
                                    ->rows(3),
                            ])
                            ->default([
                                ['text' => 'At Rich System Solution, we are Nashik\'s leading digital marketing agency, transforming businesses since 2009 with impactful strategies that drive growth.'],
                                ['text' => 'Having partnered with over 400 brands, we specialize in a full suite of services, including content creation, web design, social media management, Google Ads, programmatic marketing, and email marketing.'],
                                ['text' => 'Our unique blend of stability and flexibility allows us to cater to startups and established brands alike. With transparent reporting, direct access to our core team, and secure data handling, we\'re the trusted partner for businesses seeking measurable results and lasting success in the digital world.'],
                            ])
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => isset($state['text']) ? \Illuminate\Support\Str::limit($state['text'], 60) : null)
                            ->minItems(1)
                            ->reorderable(),
                    ]),

                Forms\Components\Section::make('Image')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('About Us Image')
                            ->required()
                            ->image()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1:1')
                            ->directory('about-us')
                            ->visibility('public')
                            ->helperText('Recommended: square image, 800x800px or larger'),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Only one about us section can be active at a time.'),
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

                Tables\Columns\TextColumn::make('label')
                    ->searchable()
                    ->limit(20),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(40),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

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
                    ->action(function (AboutUsSection $record) {
                        AboutUsSection::where('id', '!=', $record->id)->update(['is_active' => false]);
                        $record->update(['is_active' => true]);
                    })
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (AboutUsSection $record): bool => !$record->is_active),
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
            'index'  => Pages\ListAboutUsSections::route('/'),
            'create' => Pages\CreateAboutUsSection::route('/create'),
            'edit'   => Pages\EditAboutUsSection::route('/{record}/edit'),
        ];
    }
}
