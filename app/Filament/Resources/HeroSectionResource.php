<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSectionResource\Pages;
use App\Models\HeroSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Hero Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->default('Transform Your Digital Vision Into Reality')
                            ->placeholder('Enter hero title'),
                        
                        Forms\Components\Textarea::make('subtitle')
                            ->required()
                            ->maxLength(500)
                            ->rows(3)
                            ->default('We provide comprehensive digital solutions that blend cutting-edge technology with strategic insight to drive measurable business growth.')
                            ->placeholder('Enter hero subtitle'),
                        
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('cta_text')
                                    ->label('Primary CTA Button Text')
                                    ->placeholder('Book Consultation')
                                    ->default('Book Consultation'),
                                
                                Forms\Components\TextInput::make('cta_link')
                                    ->label('Primary CTA Link')
                                    ->placeholder('/contactus')
                                    ->default('/contactus'),
                                
                                Forms\Components\TextInput::make('cta_secondary_text')
                                    ->label('Secondary CTA Button Text')
                                    ->placeholder('About Us')
                                    ->default('About Us'),
                                
                                Forms\Components\TextInput::make('cta_secondary_link')
                                    ->label('Secondary CTA Link')
                                    ->placeholder('/about')
                                    ->default('/about'),
                            ]),
                    ]),
                
                Forms\Components\Section::make('Hero Image')
                    ->schema([
                        Forms\Components\FileUpload::make('hero_image')
                            ->label('Main Hero Image')
                            ->required()
                            ->image()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('3:4')
                            ->directory('hero')
                            ->visibility('public')
                            ->helperText('Recommended size: 800x1067px or larger'),
                        
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\FileUpload::make('hero_image_400')
                                    ->label('Image 400w')
                                    ->image()
                                    ->directory('hero/responsive')
                                    ->visibility('public')
                                    ->helperText('Size: 400px width'),
                                
                                Forms\Components\FileUpload::make('hero_image_500')
                                    ->label('Image 500w')
                                    ->image()
                                    ->directory('hero/responsive')
                                    ->visibility('public')
                                    ->helperText('Size: 500px width'),
                                
                                Forms\Components\FileUpload::make('hero_image_600')
                                    ->label('Image 600w')
                                    ->image()
                                    ->directory('hero/responsive')
                                    ->visibility('public')
                                    ->helperText('Size: 600px width'),
                                
                                Forms\Components\FileUpload::make('hero_image_700')
                                    ->label('Image 700w')
                                    ->image()
                                    ->directory('hero/responsive')
                                    ->visibility('public')
                                    ->helperText('Size: 700px width'),
                                
                                Forms\Components\FileUpload::make('hero_image_800')
                                    ->label('Image 800w')
                                    ->image()
                                    ->directory('hero/responsive')
                                    ->visibility('public')
                                    ->helperText('Size: 800px width'),
                                
                                Forms\Components\FileUpload::make('hero_image_1000')
                                    ->label('Image 1000w')
                                    ->image()
                                    ->directory('hero/responsive')
                                    ->visibility('public')
                                    ->helperText('Size: 1000px width'),
                                
                                Forms\Components\FileUpload::make('hero_image_1500')
                                    ->label('Image 1500w')
                                    ->image()
                                    ->directory('hero/responsive')
                                    ->visibility('public')
                                    ->helperText('Size: 1500px width'),
                            ]),
                    ]),
                
                Forms\Components\Section::make('Statistics')
                    ->schema([
                        Forms\Components\Repeater::make('stats')
                            ->label('Statistics')
                            ->schema([
                                Forms\Components\TextInput::make('value')
                                    ->label('Stat Value')
                                    ->required()
                                    ->placeholder('e.g., 3000+'),
                                Forms\Components\TextInput::make('label')
                                    ->label('Stat Label')
                                    ->required()
                                    ->placeholder('e.g., Happy Clients'),
                                Forms\Components\Select::make('icon')
                                    ->label('Icon')
                                    ->options([
                                        'Users' => 'Users',
                                        'Target' => 'Target',
                                        'Star' => 'Star',
                                        'Shield' => 'Shield',
                                        'TrendingUp' => 'Trending Up',
                                        'Zap' => 'Zap',
                                    ])
                                    ->default('Users')
                                    ->required(),
                            ])
                            ->default([
                                ['value' => '3000+', 'label' => 'Happy Clients', 'icon' => 'Users'],
                                ['value' => '1000+', 'label' => 'Projects', 'icon' => 'Target'],
                                ['value' => '98%', 'label' => 'Satisfaction', 'icon' => 'Star'],
                                ['value' => '24/7', 'label' => 'Support', 'icon' => 'Shield'],
                            ])
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                            ->maxItems(6)
                            ->minItems(1),
                    ]),
                
                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Only one hero section can be active at a time. Activating this will deactivate others.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('hero_image')
                    ->label('Hero Image')
                    ->square()
                    ->size(60),
                
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(40),
                
                Tables\Columns\TextColumn::make('subtitle')
                    ->limit(50),
                
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
                    ->action(function (HeroSection $record) {
                        // Deactivate all other hero sections
                        HeroSection::where('id', '!=', $record->id)->update(['is_active' => false]);
                        $record->update(['is_active' => true]);
                    })
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (HeroSection $record): bool => !$record->is_active),
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
            'index' => Pages\ListHeroSections::route('/'),
            'create' => Pages\CreateHeroSection::route('/create'),
            'edit' => Pages\EditHeroSection::route('/{record}/edit'),
        ];
    }
}