<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Banner Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter banner title'),
                        
                        Forms\Components\TextInput::make('subtitle')
                            ->required()
                            ->maxLength(500)
                            ->placeholder('Enter banner subtitle'),
                        
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('cta_text')
                                    ->label('Primary CTA Button Text')
                                    ->placeholder('Get Started')
                                    ->default('Get Started'),
                                
                                Forms\Components\TextInput::make('cta_link')
                                    ->label('Primary CTA Link')
                                    ->placeholder('/contactus')
                                    ->default('/contactus'),
                                
                                Forms\Components\TextInput::make('cta_secondary_text')
                                    ->label('Secondary CTA Button Text')
                                    ->placeholder('Know Us')
                                    ->default('Know Us'),
                                
                                Forms\Components\TextInput::make('cta_secondary_link')
                                    ->label('Secondary CTA Link')
                                    ->placeholder('/about')
                                    ->default('/about'),
                            ]),
                    ]),
                
                Forms\Components\Section::make('Images')
                    ->schema([
                        Forms\Components\FileUpload::make('desktop_image')
                            ->label('Desktop Image')
                            ->required()
                            ->image()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->directory('banner')
                            ->visibility('public')
                            ->helperText('Recommended size: 1920x1080px or larger'),
                        
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\FileUpload::make('mobile_image')
                                    ->label('Mobile Image (Default)')
                                    ->image()
                                    ->directory('banner/mobile')
                                    ->visibility('public')
                                    ->helperText('Recommended size: 1080x1920px'),
                                
                                Forms\Components\FileUpload::make('mobile_image_400')
                                    ->label('Mobile Image 400w')
                                    ->image()
                                    ->directory('banner/mobile')
                                    ->visibility('public')
                                    ->helperText('Size: 400px width'),
                                
                                Forms\Components\FileUpload::make('mobile_image_760')
                                    ->label('Mobile Image 760w')
                                    ->image()
                                    ->directory('banner/mobile')
                                    ->visibility('public')
                                    ->helperText('Size: 760px width'),
                                
                                Forms\Components\FileUpload::make('mobile_image_1080')
                                    ->label('Mobile Image 1080w')
                                    ->image()
                                    ->directory('banner/mobile')
                                    ->visibility('public')
                                    ->helperText('Size: 1080px width'),
                            ]),
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
                Tables\Columns\ImageColumn::make('desktop_image')
                    ->label('Desktop Preview')
                    ->square()
                    ->size(60),
                
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('subtitle')
                    ->limit(40),
                
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
                    ->action(function (Banner $record) {
                        $prev = Banner::where('order', '<', $record->order)
                            ->orderBy('order', 'desc')
                            ->first();
                        if ($prev) {
                            $temp = $record->order;
                            $record->order = $prev->order;
                            $prev->order = $temp;
                            $record->save();
                            $prev->save();
                        }
                    })
                    ->icon('heroicon-o-arrow-up')
                    ->color('gray'),
                
                Tables\Actions\Action::make('moveDown')
                    ->action(function (Banner $record) {
                        $next = Banner::where('order', '>', $record->order)
                            ->orderBy('order', 'asc')
                            ->first();
                        if ($next) {
                            $temp = $record->order;
                            $record->order = $next->order;
                            $next->order = $temp;
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}